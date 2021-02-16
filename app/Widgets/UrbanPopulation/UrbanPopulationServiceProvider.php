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
 * @author Levi Costello <leviwcostello@gmail.com>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */
namespace App\Widgets\UrbanPopulation;

use Illuminate\Support\ServiceProvider;

class UrbanPopulationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $ds = DIRECTORY_SEPARATOR;
        $this->loadMigrationsFrom(__DIR__ . $ds . 'Migrations');
        $this->loadViewsFrom(__DIR__ . $ds . 'Views', 'urban-population');
        $this->loadTranslationsFrom(__DIR__ . $ds . 'Translations', 'urban-population');
        $this->publishes([
            __DIR__  . $ds . 'Config.php' => config_path('widgets' . $ds . 'urban_population.php'),
        ]);
        $this->callAfterResolving(Schedule::class, function (Schedule $schedule) {
            $schedule->command('import:urbanpopulation:data')->weekly();
        });
        if ($this->app->runningInConsole()) {
            // Add commands for artisan here
            $this->commands([Commands\ImportUrbanPopulationData::class]);
        }
    }
}
