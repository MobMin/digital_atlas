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
namespace App\Widgets\YouTubePopularVideos\Commands;

use App\Widgets\YouTubePopularVideos\Models\YouTubeVideo;
use Google\Client;
use Google\Service\YouTube;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Imports the top 10 most popular videos from YouTube
 */
class ImportPopularVideos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     * @access protected
     */
    protected $signature = 'import:youtube-popular-videos';

    /**
     * The console command description.
     *
     * @var string
     * @access protected
     */
    protected $description = 'Import the popular YouTube videos for a country.';

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
        $appName = config('widgets.you_tube_popular_videos.application_name');
        $apiKey = config('widgets.you_tube_popular_videos.api_key');
        $maxResults = config('widgets.you_tube_popular_videos.total_videos');
        if (empty($apiKey)) {
            $this->error('Your API key is missing in the configuration file.');
            return 0;
        }
        if (empty($appName)) {
            $this->error('Your application name is missing in the configuration file.');
            return 0;
        }
        if (empty($maxResults)) {
            $maxResults = 10;
        }
        $client = new Client();
        $client->setApplicationName($appName);
        $client->setDeveloperKey($apiKey);
        $service = new YouTube($client);
        $options = [
            'chart'         =>  'mostPopular',
            'maxResults'    =>  $maxResults,
            'regionCode'    =>  '',

        ];
        $countries = DB::table('countries')->select('id', 'alpha_two_code')->get();
        $videos = [];
        foreach ($countries as $country) {
            $options['regionCode'] = $country->alpha_two_code;
            try {
                $results = $service->videos->listVideos('snippet', $options);
            } catch (\Throwable $th) {
                continue;
            }
            foreach ($results as $result) {
                $videos[] = [
                    'country_id'        =>  $country->id,
                    'you_tube_id'       =>  $result['id'],
                    'channel_id'        =>  $result['snippet']['channelId'],
                    'channel_title'     =>  $result['snippet']['channelTitle'],
                    'thumbnail_url'     =>  $result['snippet']['thumbnails']['medium']['url'],
                    'thumbnail_height'  =>  $result['snippet']['thumbnails']['medium']['height'],
                    'thumbnail_width'   =>  $result['snippet']['thumbnails']['medium']['width'],
                    'title'             =>  $result['snippet']['localized']['title'],
                ];
            }
        }
        if (isset($videos) && !empty($videos)) {
            // Deleting old data
            YouTubeVideo::truncate();
            //Adding new data
            YouTubeVideo::insert($videos);
            $this->info('Import is complete.');
        } else {
            $this->error('Errors');
        }

        return 0;
    }
}
