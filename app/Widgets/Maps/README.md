# Maps for Digital Atlas

This Maps widget was designed for the Digital Atlas.  It displays a map of the current country.  It uses the [Leaflet](https://leafletjs.com/) Javascript library and [Open Street Maps](https://www.openstreetmap.org/).  Special thanks to the community that developed [World Countries data](https://github.com/mledoze/countries) used in the maps.

## Dependencies

It uses the following PHP libraries:

- [arrilot/laravel-widgets](https://github.com/arrilot/laravel-widgets)

## Install

This package only works with the Digital Atlas.  To install:

1. Drop this package into the *App/Widgets/* directory.
2. Register the service provider, by adding the following to the providers array of *config/app.php* file:
```
App\Widgets\Maps\MapsServiceProvider::class
```
3. In terminal, migrate the database with `php artisan migrate`
4. Open the view page:
    a. Add the widget to the view file using `@asyncWidget('App\Widgets\Maps\MapsWidget', [], $country)`.
    b. Add the following to the **extra-css**: `<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>`
    c. Add the following to the **extra-js** `<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>`
5. Copy the map's JSON data to the public directory using this command `php artisan vendor:publish --tag=public --force`.

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

Then select **Provider: App\Widgets\Maps\MapsServiceProvider** from the list.  The configuration file contains the coordinates for each country and map settings.
