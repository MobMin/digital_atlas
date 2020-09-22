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
 * Generates a model specifically for your widget.  If you use artisan make:model
 * it get's created in the Model directory.  This will create it in your widget's
 * directory.
 */
class WidgetModelGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:make:widget:model
        {name : Name for your widget.}
        {modelName : The name of the model.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a model for your widget.';

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
        $model = $this->argument('modelName');
        $ds = DIRECTORY_SEPARATOR;
        $studlyWidget = Str::studly($widget);
        $studlyModel = Str::studly($model);
        $snakeModel = Str::snake($model);
        $kebabModel = Str::kebab($model);
        $titlizedModel = Str::titlizeSnake($snakeModel);
        $modelFile = $studlyWidget . $ds . 'Models' . $ds . $studlyModel . '.php';
        if (Storage::disk('widgets')->missing($studlyWidget)) {
            $this->error('That widget does not exist!');
            return 0;
        }
        if (Storage::disk('widgets')->exists($modelFile)) {
            $this->error('That model already exists!');
            return 0;
        }

        $template = Storage::disk('stubs')->get('WidgetModel.stub');
        $content = str_replace(
            [
                '{{titlizedModel}}',
                '{{studlyModel}}',
                '{{snakeModel}}',
                '{{kebabModel}}',
                '{{studlyWidget}}'
            ],
            [$titlizedModel, $studlyModel, $snakeModel, $kebabModel, $studlyWidget],
            $template
        );
        Storage::disk('widgets')->put($modelFile, $content);
        $this->info('The widget\'s model has been created.');
        $this->info('Happy Coding!');
        return 0;
    }
}
