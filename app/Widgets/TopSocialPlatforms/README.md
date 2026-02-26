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
./vendor/bin/sail artisan migrate
```

_Manual Installation_
```
php artisan migrate
```

4. Added the widget to the view file using `@asyncWidget('App\Widgets\TopSocialPlatforms\TopSocialPlatformsWidget', [], $country)`.

## Import Data

It is best to run this on your computer, and then grab the SQL and update the live server. The endpoints seems to block the server. The script takes a significant amount of time to update.

_Docker_
```
./vendor/bin/sail artisan import:top-social-stats
```

_Manual Installation_
```
php artisan import:top-social-stats
```

Once it finishes, you can create a backup of the social media tables with this command:

_Docker_
```
./vendor/bin/sail exec mysql mysqldump -u root -p digital_atlas social_platforms platform_stats > top-social-media-bak.sql
```

_Manual Installation_
```
mysqldump -u sail -p digital_atlas social_platforms platform_stats > top-social-media-bak.sql
```

Now move the file to your server, and update the database:

```
mysqldump -u USER -p DATABASE < top-social-media-bak.sql
```
