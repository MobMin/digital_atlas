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
namespace App\Widgets\Twitter\Models;

use Illuminate\Database\Eloquent\Model;

class Twitter extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trending_on_twitter';

    /**
     * @var array
     */
    protected $fillable = [
        'tweet_name',
        'tweet_count',
        'country_id',
    ];
}
