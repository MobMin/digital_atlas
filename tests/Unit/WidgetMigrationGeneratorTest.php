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

/**
 * Generator uses the wrong test case
 * @link https://github.com/laravel/framework/issues/34209
 */
use Tests\TestCase;

class WidgetMigrationGeneratorTest extends TestCase
{
    /**
     * You are not allowed to generate a migration if widget does not exist.
     *
     * @return void
     */
    public function testRequiresWidget()
    {
        $this->artisan('project:make:widget:migration FakeWidget AddFrogTable')
            ->expectsOutput('That widget does not exist!')
            ->assertExitCode(0);
    }
}
