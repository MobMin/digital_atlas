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
namespace App\Widgets\InternetUsage;

use App\Widgets\InternetUsage\Models\InternetUsage;
use Arrilot\Widgets\AbstractWidget;

/**
 * A widget displaying Internet Usage data
 */
class InternetUsageWidget extends AbstractWidget
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
        $current = InternetUsage::current($country['id']);
        $stats = InternetUsage::select('year_reported', 'percentage')
            ->where('country_id', $country['id'])
            ->orderBy('year_reported', 'ASC')
            ->get();
        $statLabels = [];
        $statData = [];
        foreach ($stats as $stat) {
            $statLabels[] = strval($stat->year_reported);
            $statData[] = $stat->percentage;
        }
        $lineColor = config('widgets.internet_usage.graph.line_color');
        if ($lineColor == null) {
            $lineColor = '#000000';
        }
        return view('internet-usage::internet_usage_widget', [
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
        return [
            'element'       => 'div',
            'attributes'    => 'class="widget widget-internet-usage" data-widget-name="Internet Usage"',
        ];
    }

    /**
     * Text displayed when your widget is loading async.
     *
     * @return string
     */
    public function placeholder()
    {
        return trans('internet-usage::widget.loading');
    }
}
