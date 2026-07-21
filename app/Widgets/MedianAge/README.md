# Median Age for Digital Atlas

This Median Age was designed for the Digital Atlas.  It displays the median age for each country with a graph of the ages over time.

## Dependencies

It uses the following PHP libraries:

- [arrilot/laravel-widgets](https://github.com/arrilot/laravel-widgets)

## Install

This package only works with the Digital Atlas.  To install:

1. Drop this package into the *App/Widgets/* directory.
2. Register the service provider, by adding the following to the providers array of *config/app.php* file:
```
App\Widgets\MedianAge\MedianAgeServiceProvider::class
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

4. Added the widget to the view file using `@asyncWidget('App\Widgets\MedianAge\MedianAgeWidget', [], $country)`.

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

Then select **Provider: App\Widgets\MedianAge\MedianAgeServiceProvider** from the list.

## Import Data

To import the data:

1. Visit the [United Nations Data Portal](https://population.un.org/dataportal/home).
2. Select Median age of population and all locations. Keep the selected date range.
3. Click "Get Started and Search"
4. In the left sidebar, click "Export" and "CSV".
2. Rename the file to **widget-median-age.csv** or the name specified in the *config/widgets/median_age.php* file.
3. On the terminal, run the following command:

_Docker_
```
./vendor/bin/sail artisan import:median-age:data
```

_Manual Installation_
```
php artisan import:median-age:data
```

