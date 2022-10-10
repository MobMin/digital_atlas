# YouTube Popular Videos for Digital Atlas

This YouTube Popular Videos widget was designed for the Digital Atlas.  It lists the most popular videos for a specific country.  It uses the [YouTube API](https://developers.google.com/youtube/v3) to get content.

## Dependencies

It uses the following PHP libraries:

- [arrilot/laravel-widgets](https://github.com/arrilot/laravel-widgets)
- [google/apiclient](https://github.com/googleapis/google-api-php-client)

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

4. Add the widget to the view file using `@asyncWidget('App\Widgets\YouTubePopularVideos\YouTubePopularVideosWidget', [], $country)`.

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

## Retrieve an API Key

In order to use this widget, you must retrieve an API key for the [YouTube API](https://developers.google.com/youtube/v3).  You can follow the instructions on [this page](https://developers.google.com/youtube/v3/getting-started) to get your key.  Once you add your key to the configuration file, you can run the command to get the most popular videos.

_Docker_
```
docker-compose run --rm da_artisan vendor:publish
```

_Manual Installation_
```
php artisan vendor:publish
```
