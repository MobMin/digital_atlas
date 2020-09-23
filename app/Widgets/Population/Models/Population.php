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
namespace App\Widgets\Population\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'population';

    /**
     * A scope to get the current population
     *
     * @param  object   $query      The query object
     * @param  integer  $countryId  The country id
     * @return object               The current population
     */
    public function scopeCurrent($query, $countryId)
    {
        return $query
            ->where('country_id', $countryId)
            ->orderBy('year_reported', 'DESC')
            ->first();
    }

    /**
     * PROPERTY: Get a readable format of the total of men. (readable_men)
     *
     * @return string   The readable format
     */
    public function getReadableMenAttribute()
    {
        return $this->readableFormat($this->men);
    }

    /**
     * PROPERTY: Get a readable format of the total women. (readable_women)
     *
     * @return string   The readable format
     */
    public function getReadableWomenAttribute()
    {
        return $this->readableFormat($this->women);
    }

    /**
     * PROPERTY: Get a readable format of the total. (readable_total)
     *
     * @return string   The readable format
     */
    public function getReadableTotalAttribute()
    {
        return $this->readableFormat($this->total);
    }

    /**
     * Create a readable format of the given number (1,000,000,000 = 1B+)
     *
     * @param  integer  $number     The number to format
     * @return string               The formatted string
     * @access private
     */
    private function readableFormat($number)
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
