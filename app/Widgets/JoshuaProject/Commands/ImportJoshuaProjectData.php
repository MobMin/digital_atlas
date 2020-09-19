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
namespace App\Widgets\JoshuaProject\Commands;

use App\Widgets\JoshuaProject\Models\JPData;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

/**
 * Imports Joshua Project data using their API.  This is set up as a cron, so only run
 * if needed.
 */
class ImportJoshuaProjectData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     * @access protected
     */
    protected $signature = 'import:joshuaproject:data';

    /**
     * The console command description.
     *
     * @var string
     * @access protected
     */
    protected $description = 'Imports Joshua Project data from the API.';

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
        $this->info('Importing Joshua Project data.');
        $apiKey = config('widgets.joshua_project.api.key');
        if ($apiKey == null) {
            $this->error('Your API key is missing in the configuration file.');
            return 0;
        }
        $countriesUrl = config('widgets.joshua_project.api.countries_url');
        if ($countriesUrl == null) {
            $this->error('Your countries URL is missing in the configuration file.');
            return 0;
        }
        $total = config('widgets.joshua_project.api.total_countries');
        if ($total == null) {
            $total = 400;
        }
        $countriesUrl .= '?api_key=' . $apiKey . '&limit=' . $total;
        $response = Http::get($countriesUrl);
        if ($response->failed()) {
            $this->error('The server responded with an error.');
            return 0;
        }
        // This creates an array with key alpha_three_code and value of id
        $countries = DB::table('countries')->pluck('id', 'alpha_three_code')->toArray();
        $data = [];
        foreach ($response->json() as $country) {
            $iso = strtoupper($country['ISO3']);
            if (array_key_exists($iso, $countries)) {
                $data[] = [
                    'primary_religion'          =>  $country['ReligionPrimary'],
                    'total_people_groups'       =>  intval($country['CntPeoples']),
                    'total_unreached'           =>  intval($country['CntPeoplesLR']),
                    'jp_scale'                  =>  intval($country['JPScaleCtry']),
                    'in_1040'                   =>  ($country['Window1040'] == 'Y'),
                    'percent_buddhist'          =>  $this->prepareFloat($country['PercentBuddhism']),
                    'percent_christian'         =>  $this->prepareFloat($country['PercentChristianity']),
                    'percent_evangelical'       =>  $this->prepareFloat($country['PercentEvangelical']),
                    'percent_hindu'             =>  $this->prepareFloat($country['PercentHinduism']),
                    'percent_islam'             =>  $this->prepareFloat($country['PercentIslam']),
                    'percent_ethnic_religion'   =>  $this->prepareFloat($country['PercentEthnicReligions']),
                    'percent_other_religion'    =>  $this->prepareFloat($country['PercentOtherSmall']),
                    'percent_non_religious'     =>  $this->prepareFloat($country['PercentNonReligious']),
                    'country_id'                => $countries[$iso],
                ];
            }
        }
        JPData::truncate();
        JPData::insert($data);
        $this->info('Import is complete.');
        return 0;
    }

    private function prepareFloat($number)
    {
        return round(floatval($number), 3);
    }
}
