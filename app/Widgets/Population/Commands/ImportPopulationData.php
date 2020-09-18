<?php
/**
 * This file is part of Digital Atlas.
 *
 * Digital Atlas is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Year of Prayer API is distributed in the hope that it will be useful,
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
 * Imports the UN population data from a CSV in the data directory in the root folder.
 * The CSV can be retrieved at:
 * @link https://population.un.org/wpp/Download/Standard/Population/
 */
class ImportPopulationData extends Command
{
    /**
     * A multiplier provided by the UN that all stats should be mulltiplied by
     *
     * @var integer
     */
    protected $populationMultiplier = 1000;
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
        /**
         * We get last year because this year is an estimate.
         */
        $thisYear = date('Y') - 1;
        $earliestYear = $thisYear-4;
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
        $countries = DB::table('countries')->pluck('id', 'numeric_code')->toArray();
        $handle = fopen($file, 'r');
        $headerPassed = false;
        $data = [];
        while (($raw = fgets($handle)) != false) {
            if (!$headerPassed) {
                $headerPassed = true;
                continue;
            }

            $row = str_getcsv($raw);
            $year = intval($row[4]);
            if (($year < $earliestYear) || ($year > $thisYear)) {
                continue;
            }

            $numericCode = intval($row[0]);
            if (array_key_exists($numericCode, $countries)) {
                $popMen = round(floatval($row[6]) * $this->populationMultiplier);
                $popWomen = round(floatval($row[7]) * $this->populationMultiplier);
                $popTotal = round(floatval($row[8]) * $this->populationMultiplier);
                $data[] = [
                    'men' => intval($popMen),
                    'women' => intval($popWomen),
                    'total' => intval($popTotal),
                    'density' => intval(round(floatval($row[9]))),
                    'year_reported' => $year,
                    'country_id' => $countries[$numericCode],
                ];
            }
        }
        if (empty($data)) {
            $this->error('The file has no data to import.');
            return 0;
        }
        Population::truncate();
        Population::insert($data);
        $this->info('Import is complete.');
        return 0;
    }
}
