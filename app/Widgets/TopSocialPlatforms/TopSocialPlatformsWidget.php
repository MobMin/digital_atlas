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
namespace App\Widgets\TopSocialPlatforms;

use App\Widgets\TopSocialPlatforms\Models\SocialPlatform;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Lang;

/**
 * A widget displaying Top Social Platforms data
 */
class TopSocialPlatformsWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     * @access protected
     */
    protected $config = [];

    /**
     * Translation keys for the months.  We leave first blank so 1 = Jan.
     *
     * @var array
     * @access protected
     */
    protected $monthKeys = [
        '',
        'month_jan',
        'month_feb',
        'month_mar',
        'month_apr',
        'month_may',
        'month_jun',
        'month_jul',
        'month_aug',
        'month_sep',
        'month_oct',
        'month_nov',
        'month_dec'
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $country = func_get_arg(0);
        $labels = [];
        $platforms = SocialPlatform::where('country_id', $country['id'])->get();
        $data = [];
        foreach ($platforms as $key => $platform) {
            $platformData = [
                'platform'  =>  $platform->name,
                'average'   =>  round($platform->stats->avg('percentage'), 3),
                'stats'     =>  []
            ];
            $stats = $platform->stats()
                                ->orderBy('year_reported', 'asc')
                                ->orderBy('month_reported', 'asc')
                                ->get();
            foreach ($stats as $stat) {
                $platformData['stats'][] = $stat->percentage;
                if ($key === 0) {
                    $month = Lang::get(
                        'top-social-platforms::widget.' . $this->monthKeys[$stat->month_reported]
                    );
                    $labels[] = $month . ' ' . $stat->year_reported;
                }
            }
            $data[] = $platformData;
        }
        // Sort the table data
        $average = array_column($data, 'average');
        array_multisort($average, \SORT_DESC, $data);
        return view('top-social-platforms::top_social_platforms_widget', [
            'config'    =>  $this->config,
            'labels'    =>  $labels,
            'data'      =>  $data
        ]);
    }

    /**
     * Async and reloadable widgets are wrapped in container.
     * You can customize it by overriding this method.
     *
     * @return array
     */
    public function container()
    {
        $title = ucwords(trans('top-social-platforms::widget.title'));
        return [
            'element'       => 'div',
            'attributes'    => 'class="widget widget-top-social-platforms" data-widget-name="' . $title . '"',
        ];
    }

    /**
     * Text displayed when your widget is loading async.
     *
     * @return string
     */
    public function placeholder()
    {
        return trans('top-social-platforms::widget.loading');
    }
}
