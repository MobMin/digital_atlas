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
 * @author Levi Costello <Leviwcosello@gmail.com>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */
namespace App\Widgets\UrbanPopulation\Commands;

use App\Widgets\UrbanPopulation\Models\UrbanPopulation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Command for widget.
 */
class ImportUrbanPopulationData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     * @access protected
     */
    protected $signature = 'import:urban-population:data';

    /**
     * The console command description.
     *
     * @var string
     * @access protected
     */
    protected $description = 'Imports the UrbanPopulation CSV file.' .
    ' (drop widget-urban-population.csv in data directory in the root)';

    /**
     * What is the row number for the header row (We skip all rows before it)
     *
     * @var integer
     */
    protected $headerRow = 5;

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
        $report = config('widgets.urban_population.report_filename');
        if ($report == null) {
            $report = 'widget-urban-population.csv';
        }
        $this->info('Importing UrbanPopulation data.');
        $file = base_path('data' . DIRECTORY_SEPARATOR . $report);
        if (!file_exists($file)) {
            $this->error('Missing file: ' . $file);
            return 0;
        }
        // This creates an array with key alpha_three_code and value of id
        $countries = DB::table('countries')->pluck('id', 'alpha_three_code')->toArray();
        $handle = fopen($file, 'r');
        $count = 1;
        $headers = [];
        $data = [];
        while (($raw = fgets($handle)) != false) {
            $row = str_getcsv($raw);
            if ($count < $this->headerRow) {
                $count++;
                continue;
            } elseif ($count == $this->headerRow) {
                $headers = $row;
                $count++;
                continue;
            }

            $countryCode = $row[1];
            if (!array_key_exists($countryCode, $countries)) {
                continue;
            }
            $combined = array_filter(array_combine($headers, $row));
            // Remove the first items becomes they are not date columns
            $combined = array_slice($combined, 4, null, true);
            if (empty($combined)) {
                continue;
            }
            $total = (count($combined) < 5) ? count($combined) : 5;
            $years = array_slice($combined, -$total, null, true);
            foreach ($years as $year => $val) {
                $data[] = [
                    'country_id'    =>  $countries[$countryCode],
                    'total'         =>  floatval($val),
                    'year_reported' =>  intval($year),
                ];
            }
            $count++;
        }
        if (empty($data)) {
            $this->error('The file has no data to import.');
            return 0;
        }
        UrbanPopulation::truncate();
        UrbanPopulation::insert($data);
        $this->info('Import is complete.');
        return 0;
    }
}
