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

To import the data, you will first need to get the data file. To get the file:

1. Visit the [WorldBank](https://databank.worldbank.org/source/population-estimates-and-projections#).
2. Under database, in the left column, select "Population estimates and projections"
3. Under country, in the left column, filter the list Countries, and select all.
4. Under series, in the left column, select these three series: 1. Population, female, 2. Population, male, and 3. Population, total
5. Under time, in the left column, selects the last 5 years except this year.
6. Tap Apply.
7. In the top right, tap "Download Options", and download the CSV.

Now to import the file:

1. Drop the CSV file into the root data folder.
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
