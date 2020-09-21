<?php
/**
 * This file is part of Digital Atlas.
 *
 * Digital Atlas is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Year of Prayer API is distributed in the hope that it will be useful,
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
namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

/**
 * Our Country controller
 */
class CountryController extends Controller
{
    /**
     * Show all countries
     *
     * @return Response
     */
    public function index()
    {
        $photos = config('home_photos');
        $random = array_rand($photos);
        return view('countries/index', ['photo' => $photos[$random]]);
    }

    /**
     * Show a specific country
     *
     * @param  string $slug The country slug
     * @return Response
     */
    public function show($slug)
    {
        $country = Country::where('slug', $slug)->first();
        if ($country == null) {
            abort(404);
        }
        return view('countries/show', ['country' => $country]);
    }

    /**
     * Fetch all the countries for a specific query
     *
     * @param  Request $request The request object
     * @return Response         The JSON response
     */
    public function fetch(Request $request)
    {
        $query = $request->get('query');
        if ($query) {
            $countries = Country::where('name', 'LIKE', "%{$query}%")->get();
        } else {
            $countries = Country::get();
        }
        return response()->json($countries);
    }
}
