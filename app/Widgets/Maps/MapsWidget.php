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
namespace App\Widgets\Maps;

use Arrilot\Widgets\AbstractWidget;

/**
 * A widget displaying Maps data
 */
class MapsWidget extends AbstractWidget
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
        $config = config('widgets.map_coords');
        if ($config == null) {
            $config = include('Config.php');
        }
        $coords = null;
        if (array_key_exists($country['alpha_three_code'], $config['coords'])) {
            $coords = [
                $config['coords'][$country['alpha_three_code']]['lat'],
                $config['coords'][$country['alpha_three_code']]['long'],
            ];
        }
        return view('maps::maps_widget', [
            'config'    =>  $this->config,
            'country'   =>  $country,
            'coords'    =>  $coords,
            'settings'  =>  $config['map'],
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
            'attributes'    => 'class="widget widget-maps" data-widget-name="Maps"',
        ];
    }

    /**
     * Text displayed when your widget is loading async.
     *
     * @return string
     */
    public function placeholder()
    {
        return trans('maps::widget.loading');
    }
}
