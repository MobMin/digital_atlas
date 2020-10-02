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

use App\Providers\Library\ReadableFormat;
/**
 * Generator uses the wrong test case
 * @link https://github.com/laravel/framework/issues/34209
 */
use Tests\TestCase;

class ReadableFormatTest extends TestCase
{
    /**
     * Handles small numbers
     *
     * @return void
     */
    public function testReturnsSmaller()
    {
        $this->assertEquals(ReadableFormat::fromInt(675), '675');
    }

    /**
     * Handles thousands.
     *
     * @return void
     */
    public function testReturnsThousands()
    {
        $this->assertEquals(ReadableFormat::fromInt(3598), '3K+');
    }

    /**
     * Handles millions.
     *
     * @return void
     */
    public function testReturnsMillions()
    {
        $this->assertEquals(
            ReadableFormat::fromInt(345000000),
            '345M+'
        );
    }

    /**
     * Handles billions.
     *
     * @return void
     */
    public function testReturnsBillions()
    {
        $this->assertEquals(
            ReadableFormat::fromInt(49000000000),
            '49B+'
        );
    }

    /**
     * Handles trillions.
     *
     * @return void
     */
    public function testReturnsTrillions()
    {
        $this->assertEquals(
            ReadableFormat::fromInt(3000000000000),
            '3T+'
        );
    }
}
