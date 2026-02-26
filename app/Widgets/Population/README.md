# Population Widget for Digital Atlas

This population widget was designed for the Digital Atlas.  It displays the latest [United Nations](https://www.un.org/) population data for the specified country.

## Dependencies

It uses the following PHP libraries:

- [arrilot/laravel-widgets](https://github.com/arrilot/laravel-widgets)

## Install

This package only works with the Digital Atlas.  To install:

1. Drop this package into the *App/Widgets/* directory.
2. Register the service provider, by adding the following to the providers array of *config/app.php* file:
```
App\Widgets\Population\PopulationServiceProvider::class
```
3. In terminal, migrate the database.

_Docker_
```
./vendor/bin/sail artisan migrate
```

_Manual Installation_
```
php artisan migrate
```

4. Added the widget to the view file using `@asyncWidget('App\Widgets\Population\PopulationWidget', [], $country)`.

## Configuration

To publish the configuration file, simply run the following command:

_Docker_
```
./vendor/bin/sail artisan vendor:publish
```

_Manual Installation_
```
php artisan vendor:publish
```

Then select **Provider: App\Widgets\Population\PopulationServiceProvider** from the list.

## Import Data

To import the data:

1. Drop the CSV file from the [UN Website](https://population.un.org/wpp/Download/Standard/CSV/) into the root data folder. _You may need to open the file and delete columns to match the current file in the data directory._
2. Rename the file to **widget-population.csv** or the name specified in the *config/widgets/population.php* file.
3. On the terminal, run the following command:

_Docker_
```
./vendor/bin/sail artisan import:population:data
```

_Manual Installation_
```
php artisan import:population:data
```
