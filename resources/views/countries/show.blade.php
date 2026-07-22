@extends('layouts.main', ['title' =>   __('main_layout.website_name') . " | $country->name"])

@section('extra-css')
@stop

@section('content')
    <h1 class="country-title text-center">{{ $country->name }}</h1>
    <div class="text-end">
        <div class="dropdown pe-3 mb-2" id="filter-options-dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="filter-options" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-filter"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="filter-options">
          </div>
        </div>
    </div>
    <div class="card-columns">
        @asyncWidget('App\Widgets\YouTubePopularVideos\YouTubePopularVideosWidget', [], $country)
        @asyncWidget('App\Widgets\BroadbandSubscriptions\BroadbandSubscriptionsWidget', [], $country)
        @asyncWidget('App\Widgets\InternetUsage\InternetUsageWidget', [], $country)
        @asyncWidget('App\Widgets\Literacy\LiteracyWidget', [], $country)
        @asyncWidget('App\Widgets\Maps\MapsWidget', [], $country)
        @asyncWidget('App\Widgets\MobileSubscriptions\MobileSubscriptionsWidget', [], $country)
        @asyncWidget('App\Widgets\Population\PopulationWidget', [], $country)
        @asyncWidget('App\Widgets\JoshuaProject\JoshuaProjectWidget', [], $country)
        @asyncWidget('App\Widgets\TopSocialPlatforms\TopSocialPlatformsWidget', [], $country)
        @asyncWidget('App\Widgets\UrbanPopulation\UrbanPopulationWidget', [], $country)
        @asyncWidget('App\Widgets\MedianAge\MedianAgeWidget', [], $country)
    </div>
@stop

@section('extra-js')
    @vite('resources/js/filter-widgets.js')
@stop
