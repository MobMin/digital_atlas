@extends('layouts.main')

@section('content')
    <h1 class="country-title text-center">{{ $country->name }}</h1>
    <div class="row">
        @asyncWidget('App\Widgets\Population\PopulationWidget', [], $country)
    </div>
@stop
