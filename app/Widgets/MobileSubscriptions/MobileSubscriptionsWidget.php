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
namespace App\Widgets\MobileSubscriptions;

use Arrilot\Widgets\AbstractWidget;
use App\Widgets\MobileSubscriptions\Models\MobileSubscription;

/**
 * A widget displaying Mobile Subscriptions data
 */
class MobileSubscriptionsWidget extends AbstractWidget
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
        $current = MobileSubscription::current($country['id']);
        $stats = MobileSubscription::select('year_reported', 'total')
            ->where('country_id', $country['id'])
            ->orderBy('year_reported', 'ASC')
            ->get();
        $statLabels = [];
        $statData = [];
        foreach ($stats as $stat) {
            $statLabels[] = strval($stat->year_reported);
            $statData[] = $stat->total;
        }
        $lineColor = config('widgets.mobile_subscriptions.graph.line_color');
        if ($lineColor == null) {
            $lineColor = '#000000';
        }
        return view('mobile-subscriptions::mobile_subscriptions_widget', [
            'config'    =>  $this->config,
            'current'   =>  $current,
            'statLabels'    => $statLabels,
            'statData'      => $statData,
            'lineColor'     => $lineColor,
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
        $attrs = 'class="widget col-6 col-md-3 widget-mobile-subscriptions"' .
            'data-widget-name="Mobile Subscriptions"';
        return [
            'element'       => 'div',
            'attributes'    => $attrs,
        ];
    }

    /**
     * Text displayed when your widget is loading async.
     *
     * @return string
     */
    public function placeholder()
    {
        return 'Loading...';
    }
}
