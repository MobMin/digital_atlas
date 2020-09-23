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
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Generates a migration specifically for your widget.  If you use artisan make:migration
 * it get's created in the migrations directory.  This will create it in your widget's
 * directory.  It is a wrapper of artisan make:migration because they provide a path option.
 */
class WidgetMigrationGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:make:widget:migration
        {name : Name for your widget.}
        {migrationName : The name of the migration.}
        {--create= : The table to be created}
        {--table= : The table to migrate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a migration for your widget. (wrapper for make:migration)';

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
        $widget = $this->argument('name');
        $migrationName = $this->argument('migrationName');
        $ds = DIRECTORY_SEPARATOR;
        $studlyWidget = Str::studly($widget);
        if (Storage::disk('widgets')->missing($studlyWidget)) {
            $this->error('That widget does not exist!');
            return 0;
        }
        $path = 'app' . $ds . 'Widgets' . $ds . $studlyWidget . $ds . 'Migrations' . $ds;
        $options = [
            'name'      =>  $migrationName,
            '--path'    =>  $path,
        ];
        foreach ($this->options() as $key => $val) {
            if($val) {
                $options['--' . $key] = $val;
            }
        }
        $this->call('make:migration', $options);
        return 0;
    }
}
