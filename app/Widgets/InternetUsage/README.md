# Internet Usage for Digital Atlas

This Internet Usage was designed for the Digital Atlas.  It displays minternet usage data retrieved from [World Bank](https://data.worldbank.org/indicator/IT.NET.USER.ZS).

## Dependencies

It uses the following PHP libraries:

- [arrilot/laravel-widgets](https://github.com/arrilot/laravel-widgets)

## Install

This package only works with the Digital Atlas.  To install:

1. Drop this package into the *App/Widgets/* directory.
2. Register the service provider, by adding the following to the providers array of *config/app.php* file:
```
App\Widgets\InternetUsage\InternetUsageServiceProvider::class
```
3. In terminal, migrate the database.

_Docker_
```
docker-compose run --rm da_artisan migrate
```

_Manual Installation_
```
php artisan migrate
```

4. Added the widget to the view file using `@asyncWidget('App\Widgets\InternetUsage\InternetUsageWidget', [], $country)`.

## Configuration

To publish the configuration file, simply run the following command:

_Docker_
```
docker-compose run --rm da_artisan vendor:publish
```

_Manual Installation_
```
php artisan vendor:publish
```

Then select **Provider: App\Widgets\InternetUsage\InternetUsageServiceProvider** from the list.

## Import Data

To import the data:

1. Drop the CSV file from the [World Bank](https://data.worldbank.org/indicator/IT.NET.USER.ZS) into the root data folder.
2. Rename the file to **widget-internet-usage.csv** or the name specified in the *config/widgets/internet_usage.php* file.
3. On the terminal, run the following command:

_Docker_
```
docker-compose run --rm da_artisan import:internet-usage:data
```

_Manual Installation_
```
php artisan import:internet-usage:data
```
