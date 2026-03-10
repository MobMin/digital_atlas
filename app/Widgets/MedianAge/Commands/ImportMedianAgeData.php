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
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

namespace App\Widgets\MedianAge\Commands;

use App\Widgets\MedianAge\Models\MedianAge;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Command for widget.
 */
class ImportMedianAgeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     * @access protected
     */
    protected $signature = 'import:median-age:data';

    /**
     * The console command description.
     *
     * @var string
     * @access protected
     */
    protected $description = 'Import the MedianAge CSV File after running convert_csv command.';

    protected $headerRow = 1;
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
        $report = config('widgets.medianage.report_filename');
        if ($report == null) {
            $report = 'widget-median-age.csv';
        }
        $this->info('Importing MedianAge data');
        $file = base_path('data' . DIRECTORY_SEPARATOR . $report);
        if (!\file_exists($file)) {
            $this->error("Missing file: $file");
            return 0;
        }
        $countries = DB::table('countries')->pluck('id', 'numeric_code')->toArray();
        if (empty($countries)) {
            $this->error('No countries found in the database. Please import country data first.');
            return 0;
        }
        $handle = \fopen($file, 'r');
        $count = 1;
        $data = [];
        while (($raw = \fgets($handle)) != false) {
            $row = \str_getcsv($raw);
            if ($count <= $this->headerRow) {
                $count++;
                continue;
            }
            $countryCode = $row[6];
            if (!\array_key_exists($countryCode, $countries)) {
                continue;
            }
            $medianAge = \floatval($row[26]);
            $year = \intval($row[11]);
            if ($medianAge <= 0 || $year <= 0) {
                continue;
            }
            // if year is less than 10 years old, then skip it
            $currentYear = \intval(date('Y'));
            if ($year < ($currentYear - 20)) {
                continue;
            }
            $data[] = [
                'country_id'    =>  $countries[$countryCode],
                'total'         =>  $medianAge,
                'year_reported' =>  $year,
            ];
            $count++;
        }
        if (empty($data)) {
            $this->error('The file has no data to import.');
            return 0;
        }
        MedianAge::truncate();
        MedianAge::insert($data);
        $this->info('Import is complete.');
        return 0;
    }
}
