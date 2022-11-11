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
 * @author Johnathan <johnathan@missionaldigerati.org>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */
namespace App\Widgets\TopSocialPlatforms\Commands;

use App\Widgets\TopSocialPlatforms\Models\PlatformStat;
use App\Widgets\TopSocialPlatforms\Models\SocialPlatform;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Command for widget.
 */
class ImportTopSocialStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     * @access protected
     */
    protected $signature = 'import:top-social-stats';

    /**
     * The console command description.
     *
     * @var string
     * @access protected
     */
    protected $description = 'Import the top social media platforms for a specific country.' .
    ' (Warning: time consuming)';

    /**
     * The url where to retrieve the data. The following parameters will be replaced:
     * {{REGION}} will be replaced with the country code.
     * {{START_MTH}} will be replaced with the starting month (zero leading)
     * {{START_YR}} will be replaced with the starting year
     * {{END_YR}} will be replaced with the ending year
     * {{END_MTH}} will be replaced with the end month (zero leading)
     *
     * @var string
     * @access protected
     */
    protected $url = 'https://gs.statcounter.com/social-media-stats/all/chart.php?device=' .
    'Desktop%20%26%20Mobile%20%26%20Tablet%20%26%20Console&device_hidden=desktop%2Bmobile' .
    '%2Btablet%2Bconsole&multi-device=true&statType_hidden=social_media&region_hidden={{REGION}}' .
    '&granularity=monthly&statType=Social%20Media&fromInt={{START_YR}}{{START_MTH}}&' .
    'toInt={{END_YR}}{{END_MTH}}&fromMonthYear={{START_YR}}-{{START_MTH}}&toMonthYear={{END_YR}}' .
    '-{{END_MTH}}&csv=1';

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
        // This creates an array with key alpha_two_code and value of id
        $countries = DB::table('countries')->pluck('id', 'alpha_two_code')->toArray();
        $countryData = [];
        foreach ($countries as $code => $id) {
            $this->info('Importing ' . $code . ' stats.');
            $statUrl = $this->getUrl($code);
            try {
                $fileData = fopen($statUrl, 'r');
            } catch (Exception $e) {
                $this->error('Unable to retrieve file for ' . $code . '.');
                continue;
            }
            $count = 0;
            $data = [];
            while (($line = fgetcsv($fileData)) !== false) {
                if ($count === 0) {
                    // We are working with the headings
                    foreach ($line as $key => $value) {
                        if ($key === 0) {
                            continue;
                        }
                        $data[$key] = [
                            'country_id'    =>  $id,
                            'platform'      =>  $value,
                            'stats'         =>  []
                        ];
                    }
                } else {
                    $date = explode('-', $line[0]);
                    foreach ($line as $key => $value) {
                        if ($key === 0) {
                            continue;
                        }
                        $data[$key]['stats'][] = [
                            'month_reported'    => intval($date[1]),
                            'year_reported'     =>  intval($date[0]),
                            'percentage'        =>  floatval($value)
                        ];
                    }
                }
                $count++;
            }
            $countryData[] = $data;
            $this->info('Import complete for ' . $code . '. Sleeping before next request.');
            sleep(5);
        }
        // Save to database
        Schema::disableForeignKeyConstraints();
        SocialPlatform::truncate();
        Schema::enableForeignKeyConstraints();
        foreach ($countryData as $data) {
            foreach ($data as $platformData) {
                $platform = SocialPlatform::firstOrCreate([
                    'country_id'    =>  $platformData['country_id'],
                    'name'          =>  trim($platformData['platform'])
                ]);
                $platform->stats()->createMany($platformData['stats']);
            }
        }
        $this->info('Import is complete.');
        return 0;
    }

    /**
     * Get the URL for the given code.
     *
     * @param  string $code The two letter ISO code
     * @return string       The URL
     * @access private
     */
    private function getUrl($code)
    {
        $startMonth = date('m', strtotime('-13 month'));
        $startYear = date('Y', strtotime('-13 month'));
        $endMonth = date('m', strtotime('-1 month'));
        $endYear = date('Y', strtotime('-1 month'));
        $url = str_replace('{{REGION}}', $code, $this->url);
        $url = str_replace('{{START_MTH}}', $startMonth, $url);
        $url = str_replace('{{START_YR}}', $startYear, $url);
        $url = str_replace('{{END_YR}}', $endYear, $url);
        $url = str_replace('{{END_MTH}}', $endMonth, $url);
        return $url;
    }
}
