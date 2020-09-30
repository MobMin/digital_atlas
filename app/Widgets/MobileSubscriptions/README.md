# Mobile Subscriptions for Digital Atlas

This Mobile Subscriptions was designed for the Digital Atlas.  It displays mobile subscription data retrieved from [World Bank](https://data.worldbank.org/indicator/IT.CEL.SETS).

## Dependencies

It uses the following PHP libraries:

- [arrilot/laravel-widgets](https://github.com/arrilot/laravel-widgets)

## Install

This package only works with the Digital Atlas.  To install:

1. Drop this package into the *App/Widgets/* directory.
2. Register the service provider, by adding the following to the providers array of *config/app.php* file:
```
App\Widgets\MobileSubscriptions\MobileSubscriptionsServiceProvider::class
```
3. In terminal, migrate the database.

_Docker_
```
docker-compose run --rm da_artisan artisan migrate
```

_Manual Installation_
```
php artisan artisan migrate
```

4. Added the widget to the view file using `@asyncWidget('App\Widgets\MobileSubscriptions\MobileSubscriptionsWidget', [], $country)`.

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

Then select **Provider: App\Widgets\MobileSubscriptions\MobileSubscriptionsServiceProvider** from the list.

## Import Data

To import the data:

1. Drop the CSV file from the [World Bank](https://data.worldbank.org/indicator/IT.CEL.SETS) into the root data folder.
2. Rename the file to **widget-mobile-subscriptions.csv** or the name specified in the *config/widgets/mobile_subscriptions.php* file.
3. On the terminal, run the following command:

_Docker_
```
docker-compose run --rm da_artisan import:mobile-subscriptions:data
```

_Manual Installation_
```
php artisan import:mobile-subscriptions:data
```
