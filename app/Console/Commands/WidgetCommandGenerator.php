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
 * Generates a command specifically for your widget.  If you use artisan make:command
 * it get's created in the Commands directory.  This will create it in your widget's
 * directory.
 */
class WidgetCommandGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:make:widget:command
        {name : Name for your widget.}
        {commandName : The name of the command.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a command for your widget.';

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
        $command = $this->argument('commandName');
        $ds = DIRECTORY_SEPARATOR;
        $studlyWidget = Str::studly($widget);
        $studlyCommand = Str::studly($command);
        $snakeCommand = Str::snake($command);
        $kebabCommand = Str::kebab($command);
        $titlizedCommand = Str::titlizeSnake($snakeCommand);
        $commandFile = $studlyWidget . $ds . 'Commands' . $ds . $studlyCommand . '.php';
        if (Storage::disk('widgets')->missing($studlyWidget)) {
            $this->error('That widget does not exist!');
            return 0;
        }
        if (Storage::disk('widgets')->exists($commandFile)) {
            $this->error('That command already exists!');
            return 0;
        }

        $template = Storage::disk('stubs')->get('WidgetCommand.stub');
        $content = str_replace(
            [
                '{{titlizedCommand}}',
                '{{studlyCommand}}',
                '{{snakeCommand}}',
                '{{kebabCommand}}',
                '{{studlyWidget}}'
            ],
            [$titlizedCommand, $studlyCommand, $snakeCommand, $kebabCommand, $studlyWidget],
            $template
        );
        Storage::disk('widgets')->put($commandFile, $content);
        $this->info('The widget\'s command has been created.');
        $this->info('Happy Coding!');
        return 0;
    }
}
