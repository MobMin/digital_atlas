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
namespace App\Providers\Library;

/**
 * Creates a readable format for specific values.
 */
class ReadableFormat
{
    /**
     * Create a readable format of the given number (1,000,000,000 = 1B+)
     *
     * @param  integer  $number     The number to format
     * @return string               The formatted string
     * @access private
     */
    public static function fromInt(int $number)
    {
        if ($number >= 0 && $number < 1000) {
            // 1 - 999
            $numberFormat = floor($number);
            $suffix = '';
        } elseif ($number >= 1000 && $number < 1000000) {
            // 1k-999k
            $numberFormat = floor($number / 1000);
            $suffix = 'K+';
        } elseif ($number >= 1000000 && $number < 1000000000) {
            // 1m-999m
            $numberFormat = floor($number / 1000000);
            $suffix = 'M+';
        } elseif ($number >= 1000000000 && $number < 1000000000000) {
            // 1b-999b
            $numberFormat = floor($number / 1000000000);
            $suffix = 'B+';
        } elseif ($number >= 1000000000000) {
            // 1t+
            $numberFormat = floor($number / 1000000000000);
            $suffix = 'T+';
        }

        return !empty($numberFormat . $suffix) ? $numberFormat . $suffix : 0;
    }
}
