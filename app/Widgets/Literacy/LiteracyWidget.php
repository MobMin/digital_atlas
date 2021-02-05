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
 * @author Levi Costello <leviwcostello@gmail.com>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */
namespace App\Widgets\Literacy;

use App\Widgets\Literacy\Models\Literacy;
use Arrilot\Widgets\AbstractWidget;

/**
 * A widget displaying Literacy data
 */
class LiteracyWidget extends AbstractWidget
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
        $current = Literacy::current($country['id']);
        $stats = Literacy::select('year_reported', 'total')
            ->where('country_id', $country['id'])
            ->orderBy('year_reported', 'ASC')
            ->get();
        $statLabels = [];
        $statData = [];
        foreach ($stats as $stat) {
            $statLabels[] = strval($stat->year_reported);
            $statData[] = $stat->total;
        }
        $lineColor = config('widgets.literacy.graph.line_color');
        if ($lineColor==null) {
            $lineColor = '#000000';
        }
        return view('literacy::literacy_widget', [
            'config'      =>  $this->config,
            'current'     =>  $current,
            'statLabels'  =>  $statLabels,
            'statData'    =>  $statData,
            'lineColor'   =>  $lineColor,
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
            'attributes'    => 'class="widget widget-literacy" data-widget-name="Literacy"',
        ];
    }

    /**
     * Text displayed when your widget is loading async.
     *
     * @return string
     */
    public function placeholder()
    {
        return trans('literacy::widget.loading');
    }
}
