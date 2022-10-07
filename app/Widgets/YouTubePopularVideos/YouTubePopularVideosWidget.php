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
namespace App\Widgets\YouTubePopularVideos;

use App\Widgets\YouTubePopularVideos\Models\YouTubeVideo;
use Arrilot\Widgets\AbstractWidget;

/**
 * A widget displaying You Tube Popular Videos data
 */
class YouTubePopularVideosWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $country = func_get_arg(0);
        $videos = YouTubeVideo::where('country_id', $country['id'])->get();
        if (count($videos) > 0) {
            return view('you-tube-popular-videos::you_tube_popular_videos_widget', [
                'config'    =>  $this->config,
                'videos'    =>  $videos,
            ]);
        } else {
            return '';
        }
    }

    /**
     * Async and reloadable widgets are wrapped in container.
     * You can customize it by overriding this method.
     *
     * @return array
     */
    public function container()
    {
        $title = ucwords(trans('you-tube-popular-videos::widget.title'));
        return [
            'element'       => 'div',
            'attributes'    => 'class="widget widget-you-tube-popular-videos" data-widget-name="' . $title . '"',
        ];
    }

    /**
     * Text displayed when your widget is loading async.
     *
     * @return string
     */
    public function placeholder()
    {
        return trans('you-tube-popular-videos::widget.loading');
    }
}
