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
 * @author Johnathan Pulos <johnathan@missionaldigerati.org>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */
namespace App\Widgets\JoshuaProject;

use App\Widgets\JoshuaProject\Models\JPData;
use Arrilot\Widgets\AbstractWidget;

/**
 * A widget displaying Joshua Project data
 */
class JoshuaProjectWidget extends AbstractWidget
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
        $colors = config('widgets.joshua_project.graph_colors');
        if ($colors == null) {
            $colors = [
                'buddhism'      => '#003f5c',
                'christian'     => '#374c80',
                'hinduism'      => '#7a5195',
                'islam'         => '#bc5090',
                'ethnic'        => '#ef5675',
                'other'         => '#ff764a',
                'non-religious' => '#ffa600',
            ];
        }
        $data = JPData::where('country_id', $country['id'])->first();
        return view('widget-joshua-project::joshua_project_widget', [
            'config'        =>  $this->config,
            'data'          =>  $data,
            'colors'        =>  $colors,
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
            'attributes'    => 'class="widget widget-joshua-project" data-widget-name="Joshua Project"',
        ];
    }

    /**
     * Text displayed when your widget is loading async.
     *
     * @return string
     */
    public function placeholder()
    {
        return trans('widget-joshua-project::widget.loading');
    }
}
