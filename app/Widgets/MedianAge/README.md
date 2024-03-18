# Median Age for Digital Atlas

This Median Age was designed for the Digital Atlas.  It ...

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
docker-compose run --rm da_artisan migrate
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
docker-compose run --rm da_artisan vendor:publish
```

_Manual Installation_
```
php artisan vendor:publish
```

Then select **Provider: App\Widgets\MedianAge\MedianAgeServiceProvider** from the list.
