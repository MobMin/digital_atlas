# Top Social Platforms for Digital Atlas

This Top Social Platforms was designed for the Digital Atlas.  It displays the top 10 social platforms over the last year in a specific country.  It also displays an average for each platform.

## Dependencies

It uses the following PHP libraries:

- [arrilot/laravel-widgets](https://github.com/arrilot/laravel-widgets)

## Install

This package only works with the Digital Atlas.  To install:

1. Drop this package into the *App/Widgets/* directory.
2. Register the service provider, by adding the following to the providers array of *config/app.php* file:
```
App\Widgets\TopSocialPlatforms\TopSocialPlatformsServiceProvider::class
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

4. Added the widget to the view file using `@asyncWidget('App\Widgets\TopSocialPlatforms\TopSocialPlatformsWidget', [], $country)`.
