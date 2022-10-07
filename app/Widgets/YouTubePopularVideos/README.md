# YouTube Popular Videos for Digital Atlas

This YouTube Popular Videos was designed for the Digital Atlas.  It lists the 10 most popular videos for a country.

## Dependencies

It uses the following PHP libraries:

- [arrilot/laravel-widgets](https://github.com/arrilot/laravel-widgets)

## Install

This package only works with the Digital Atlas.  To install:

1. Drop this package into the *App/Widgets/* directory.
2. Register the service provider, by adding the following to the providers array of *config/app.php* file:
```
App\Widgets\YouTubePopularVideos\YouTubePopularVideosServiceProvider::class
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

4. Added the widget to the view file using `@asyncWidget('App\Widgets\YouTubePopularVideos\YouTubePopularVideosWidget', [], $country)`.

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

Then select **Provider: App\Widgets\YouTubePopularVideos\YouTubePopularVideosServiceProvider** from the list.
