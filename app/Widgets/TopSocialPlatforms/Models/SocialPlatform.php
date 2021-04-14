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
namespace App\Widgets\TopSocialPlatforms\Models;

use Illuminate\Database\Eloquent\Model;

class SocialPlatform extends Model
{
    /**
     * Allows us to find and save the correct social platform
     *
     * @var array
     */
    protected $fillable = ['country_id', 'name'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'social_platforms';

    /**
     * Define our relationship to platform stats
     */
    public function stats()
    {
        return $this->hasMany(PlatformStat::class);
    }
}
