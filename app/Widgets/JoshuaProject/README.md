# Joshua Project Widget for Digital Atlas

This [Joshua Project](https://joshuaproject.net/) widget was designed for the Digital Atlas.  It displays the latest people group data for the specified country.

## Dependencies

It uses the following PHP libraries:

- [arrilot/laravel-widgets](https://github.com/arrilot/laravel-widgets)
- [guzzlehttp/guzzle](http://docs.guzzlephp.org/en/stable/)

## Install

This package only works with the Digital Atlas.  To install:

1. Drop this package into the *App/Widgets/* directory.
2. Register the service provider, by adding the following to the providers array of *config/app.php* file:
```
App\Widgets\JoshuaProject\JoshuaProjectServiceProvider::class
```
3. In terminal, migrate the database with `php artisan migrate`
4. Add the widget to the view file using `@asyncWidget('App\Widgets\JoshuaProject\JoshuaProjectWidget', [], $country)`.
5. Create the configuration file as described below.
6. Make sure to get an API key, and set it in the configuration file.

## Configuration

To publish the configuration file, simply run `php artisan vendor:publish` and select **Provider: App\Widgets\JoshuaProject\JoshuaProjectServiceProvider** from the list.

## Import Data
