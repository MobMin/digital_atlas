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
namespace App\Widgets\Twitter\Commands;

use App\Widgets\Twitter\Models\Twitter;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use TwitterAPIExchange;

/**
 * Command for widget.
 */
class TwitterContent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     * @access protected
     */
    protected $signature = 'import:twitter:data';

    /**
     * The console command description.
     *
     * @var string
     * @access protected
     */
    protected $description = 'Imports Twitter data from the API.';

    /**
     * An instance of the Twitter Exchange API class
     * @var string|TwitterAPIExchange
     */
    protected $twitter_api = '';

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
        $apiKey = config('widgets.twitter.api');
        if ($apiKey == null) {
            $this->error('Your API key is missing in the configuration file.');
            return 0;
        }

        $this->twitter_api = new TwitterAPIExchange($apiKey);

        $countries = DB::table('countries')->pluck('id', 'alpha_two_code')->toArray();

        $requestMethod = 'GET';
        $url = 'https://api.twitter.com/1.1/trends/available.json';
        $getfield = '';

        $json_country = $this->twitter_api->setGetfield($getfield)
            ->buildOauth($url, $requestMethod)
            ->performRequest();
        $country_arr = json_decode($json_country);
        $data = [];
        foreach ($country_arr as $value) {
            if (($value->parentid == 1) && !empty($value->countryCode)) {
                $tweet_country = $this->getTrendsPlace($value->woeid);
                if ($tweet_country) {
                    foreach ($tweet_country as $val) {
                        $data[] = [
                            'tweet_name' => $val->name,
                            'tweet_count' => intval($val->tweet_volume),
                            'country_id' => $countries[$value->countryCode],
                        ];
                    }
                }
            }
        }

        if (isset($data) && !empty($data)) {
            // Deleting old data
            Twitter::truncate();
            //Adding new data
            Twitter::insert($data);
            $this->info('Import is complete.');
        } else {
            $this->error('Errors');
        }

        return 0;
    }

    /**
     * Get popular tweets by country number
     * @param $id_country
     * @return false
     * @throws \Exception
     */
    protected function getTrendsPlace($id_country)
    {
        $url = 'https://api.twitter.com/1.1/trends/place.json';
        $getfield = '?id=' . $id_country;
        $requestMethod = 'GET';
        $json = $this->twitter_api->setGetfield($getfield)
            ->buildOauth($url, $requestMethod)
            ->performRequest();

        $result = json_decode($json);
        if (is_array($result) && isset($result[0]->trends)) {
            return $result[0]->trends;
        } elseif (isset($result->errors)) {
            $this->error('Errors: ' . $result->errors[0]->message);
            return false;
        }
    }
}
