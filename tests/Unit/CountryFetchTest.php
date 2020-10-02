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
namespace Tests\Unit;

use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Generator uses the wrong test case
 * @link https://github.com/laravel/framework/issues/34209
 */
use Tests\TestCase;

class CountryFetchTest extends TestCase
{
    /**
     * Migrate the database
     */
    use DatabaseMigrations;

    /**
     * Refresh the database
     */
    use RefreshDatabase;

    /**
     * Test the fetch response works
     *
     * @return void
     */
    public function testFetchResponse()
    {
        $countries = Country::factory()->count(3)->create();
        $expected = $countries->toArray();
        $response = $this->get('/countries/fetch');
        $response->assertStatus(200);
        $actual = json_decode($response->getContent(), true);
        $this->assertEquals(3, count($actual));
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test the fetch response works with a query string
     *
     * @return void
     */
    public function testFetchWithQuery()
    {
        $countries = Country::factory()->count(2)->create();
        $country = Country::factory()->create(['name'   =>  '12345Desired Find Country']);
        $expected = $country->toArray();
        $response = $this->get('/countries/fetch?query=345desir');
        $response->assertStatus(200);
        $actual = json_decode($response->getContent(), true);
        $this->assertEquals(1, count($actual));
        $this->assertEquals($expected, $actual[0]);
    }
}
