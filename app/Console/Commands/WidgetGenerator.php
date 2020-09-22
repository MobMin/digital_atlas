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
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Makes the widget stub
 */
class WidgetGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:make:widget
        {name : Name for your widget. (Must be unique and snake_case.)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a widget for this project.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Comes in as snake_case
        $widget = $this->argument('name');
        if ($this->exists($widget)) {
            $this->error('That widget name already exists!');
            return 0;
        }
        $this->generate($widget);
        return 0;
    }

    /**
     * Generate the widget code from the stubs directory.
     *
     * @param  string $widget The requested widget name
     * @return void
     *
     * @access private
     */
    private function generate(string $widget)
    {
        $ds = DIRECTORY_SEPARATOR;
        $studly = Str::studly($widget);
        $snake = Str::snake($widget);
        $widgetPath = app_path('Widgets' . $ds . $studly);
        Storage::disk('widgets')->makeDirectory($studly);
        Storage::disk('widgets')->makeDirectory($studly . $ds . 'Commands');
        Storage::disk('widgets')->makeDirectory($studly . $ds . 'Migrations');
        Storage::disk('widgets')->makeDirectory($studly . $ds . 'Models');
        Storage::disk('widgets')->makeDirectory($studly . $ds . 'Translations');
        Storage::disk('widgets')->makeDirectory($studly . $ds . 'Translations' . $ds . 'en');
        Storage::disk('widgets')->makeDirectory($studly . $ds . 'Views');
        Storage::disk('widgets')->put($studly . $ds . 'Views' . $ds . $snake . '.blade.php', '');
        File::copy(base_path('COPYING'), $widgetPath . $ds . 'COPYING');
    }

    /**
     * Check whether the widget name is taken
     *
     * @param  string $widget The requested widget name
     * @return boolean        Does it exist?
     *
     * @access private
     */
    private function exists(string $widget)
    {
        $exists = false;
        $name = Str::studly($widget);
        $directories = Storage::disk('widgets')->directories();
        foreach ($directories as $directory) {
            if (basename($directory) == $name) {
                $exists = true;
                break;
            }
        }
        return $exists;
    }
}
