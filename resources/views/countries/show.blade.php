@extends('layouts.main')

@section('content')
    <h1 class="country-title text-center">{{ $country->name }}</h1>
    <div class="row d-block">
        <div class="col-12 col-md-6 col-xl-3 float-left">
            @asyncWidget('App\Widgets\JoshuaProject\JoshuaProjectWidget', [], $country)
        </div>
        <div class="col-12 col-md-6 col-xl-3 float-left">
            @asyncWidget('App\Widgets\Population\PopulationWidget', [], $country)
        </div>
        <div class="col-12 col-md-6 col-xl-3 float-left">
            @asyncWidget('App\Widgets\MobileSubscriptions\MobileSubscriptionsWidget', [], $country)
        </div>
        <div class="clearfix"></div>
    </div>
@stop
