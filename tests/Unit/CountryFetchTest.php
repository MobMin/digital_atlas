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

/**
 * Generator uses the wrong test case
 * @link https://github.com/laravel/framework/issues/34209
 */
use Tests\TestCase;

class CountryFetchTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Algeria data
     *
     * @var array
     */
    public $algeria = [
        'name'              => 'Algeria',
        'slug'              => 'algeria',
        'alpha_two_code'    => 'DZ',
        'alpha_three_code'  => 'DZA',
        'numeric_code'      => 12,
    ];

    /**
     * Afghanistan data
     *
     * @var array
     */
    public $afghanistan = [
        'name'              => 'Afghanistan',
        'slug'              => 'afghanistan',
        'alpha_two_code'    => 'AF',
        'alpha_three_code'  => 'AFG',
        'numeric_code'      => 4,
    ];

    /**
     * Albania data
     *
     * @var array
     */
    public $albania = [
        'name'              => 'Albania',
        'slug'              => 'albania',
        'alpha_two_code'    => 'AL',
        'alpha_three_code'  => 'ALB',
        'numeric_code'      => 8,
    ];

    /**
     * Test the fetch response works
     *
     * @return void
     */
    public function testFetchResponse()
    {
        $algeriaSaved = Country::factory()->create($this->algeria);
        $afghanistanSaved = Country::factory()->create($this->afghanistan);
        $albaniaSaved = Country::factory()->create($this->albania);
        $expected = [
            $algeriaSaved->toArray(),
            $afghanistanSaved->toArray(),
            $albaniaSaved->toArray()
        ];
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
        Country::factory()->create($this->algeria);
        Country::factory()->create($this->albania);
        $saved = Country::factory()->create($this->afghanistan);
        $expected = $saved->toArray();
        $response = $this->get('/countries/fetch?query=afghan');
        $response->assertStatus(200);
        $actual = json_decode($response->getContent(), true);
        $this->assertEquals(1, count($actual));
        $this->assertEquals($expected, $actual[0]);
    }
}