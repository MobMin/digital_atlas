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
3. In terminal, migrate the database with `php artisan migrate`

## Configuration

To publish the configuration file, simply run `php artisan vendor:publish` and select **Provider: App\Widgets\Population\PopulationServiceProvider** from the list.

## Import Data

To import the data:

1. Drop the CSV file from the [UN Website](https://population.un.org/wpp/Download/Standard/CSV/) into the root data folder.
2. Rename the file to **widget-population.csv** or the name specified in the *config/widgets/population.php* file.
3. On the terminal, run the following command: `php artisan import:population:data`
