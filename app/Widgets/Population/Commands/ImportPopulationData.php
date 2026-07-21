<?php

/**
 * This file is part of Digital Atlas.
 *
 * Digital Atlas is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Digital Atlas is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Johnathan Pulos <johnathan@missionaldigerati.org>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

namespace App\Widgets\Population\Commands;

use App\Widgets\Population\Models\Population;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Imports the World Bank population data from a CSV in the data directory in the root folder.
 */
class ImportPopulationData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     * @access protected
     */
    protected $signature = 'import:population:data';

    /**
     * The console command description.
     *
     * @var string
     * @access protected
     */
    protected $description = 'Imports the UN population CSV file.' .
        ' (drop widget-population.csv in data directory in the root)';

    /**
     * The key references for the various series codes
     *
     * @var array
     */
    private $seriesCodes = [
        'SP.POP.TOTL' => 'total',
        'SP.POP.TOTL.MA.IN' => 'men',
        'SP.POP.TOTL.FE.IN' => 'women',
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     * @access public
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     * @access public
     */
    public function handle()
    {
        $this->info('Importing population data.');
        $report = config('widgets.population.report_filename');
        if ($report == null) {
            $report = 'widget-population.csv';
        }
        $file = base_path('data' . DIRECTORY_SEPARATOR . $report);
        if (!file_exists($file)) {
            $this->error('Missing file: ' . $file);
            return 0;
        }
        // This creates an array with key numeric_code and value of id
        $countries = DB::table('countries')->pluck('id', 'alpha_three_code')->toArray();
        if (empty($countries)) {
            $this->error('No countries found in the database. Please import country data first.');
            return 0;
        }
        $handle = fopen($file, 'r');
        $headerPassed = false;
        $data = [];
        $years = [];
        while (($raw = fgets($handle)) != false) {
            $row = str_getcsv($raw);
            if (!$headerPassed) {
                // This gives the list of years from the CSV header starting from the 5th column. But we need to extract
                // the years from those headers which look like this: 2021 [YR2021]
                $years = \array_map(function ($header) {
                    \preg_match('/(\d{4})/', $header, $matches);
                    return $matches[1] ?? null;
                }, \array_slice($row, 4));
                $headerPassed = true;
                continue;
            }

            $countryCode = \strval($row[1]);
            $seriesCode = \strval($row[3]);
            $populationValues = \array_slice($row, 4);
            if (\array_key_exists($countryCode, $countries)) {
                // We are working with country specific data
                if (!\array_key_exists($countryCode, $data)) {
                    $data[$countryCode] = [];
                }
                $key = $this->seriesCodes[$seriesCode] ?? null;
                if ($key === null) {
                    continue;
                }
                $data[$countryCode][$key] = $populationValues;
            }
        }
        if (empty($data)) {
            $this->error('The file has no data to import.');
            return 0;
        }
        // Create the array of data for the database
        $dbData = [];
        foreach ($data as $countryCode => $populationData) {
            foreach ($years as $index => $year) {
                $dbData[] = [
                    'country_id' => $countries[$countryCode],
                    'year_reported' => $year,
                    'total' => \intval($populationData['total'][$index]) ?? 0,
                    'men' => \intval($populationData['men'][$index]) ?? 0,
                    'women' => \intval($populationData['women'][$index]) ?? 0,
                ];
            }
        }
        Population::truncate();
        Population::insert($dbData);
        $this->info('Import is complete.');
        return 0;
    }
}
