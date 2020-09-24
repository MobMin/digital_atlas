@extends('layouts.main')

@section('content')
    <h1 class="country-title text-center">{{ $country->name }}</h1>
    <div class="row">
        <div class="col-12 col-md-6 col-xl-3">
            @asyncWidget('App\Widgets\JoshuaProject\JoshuaProjectWidget', [], $country)
        </div>
        <div class="col-12 col-md-6 col-xl-9">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-4">
                    @asyncWidget('App\Widgets\Population\PopulationWidget', [], $country)
                </div>
                <div class="col-12 col-lg-6 col-xl-4">
                    @asyncWidget('App\Widgets\InternetUsage\InternetUsageWidget', [], $country)
                </div>
                <div class="col-12 col-lg-6 col-xl-4">
                    @asyncWidget('App\Widgets\MobileSubscriptions\MobileSubscriptionsWidget', [], $country)
                </div>
                <div class="col-12 col-lg-6 col-xl-4">
                    @asyncWidget('App\Widgets\BroadbandSubscriptions\BroadbandSubscriptionsWidget', [], $country)
                </div>
            </div>
        </div>
    </div>
@stop
