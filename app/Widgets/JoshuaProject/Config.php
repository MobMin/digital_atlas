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
/**
 * Configuration for the JoshuaProject widget
 *
 * @var array
 */
return [
    'api' => [
        /**
         * Retrieve an API key from Joshua Project.
         */
        'key'               =>  '',
        /**
         * The URL for retrieving all countries data without query parameters.
         */
        'countries_url'     =>  'https://api.joshuaproject.net/v1/countries.json',
        /**
         * Set this to a number higher than the total number of countries in Joshua Project's
         * database.  If it is lower, you will miss some country data.
         */
        'total_countries'   =>  300,
    ],
    /**
     * Colors for the pie graph
     */
    'graph_colors' => [
        'buddhism'      => '#003f5c',
        'christian'     => '#374c80',
        'hinduism'      => '#7a5195',
        'islam'         => '#bc5090',
        'ethnic'        => '#ef5675',
        'other'         => '#ff764a',
        'non-religious' => '#ffa600',
    ],
];
