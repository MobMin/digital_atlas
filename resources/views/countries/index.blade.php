@extends('layouts.main', ['title' =>  __('main_layout.website_name')])

@section('content')
    <div id="welcome" class="row">
        <div class="mx-auto col-8 col-lg-4">
            <h1 id="welcome-text">@lang('main_layout.website_welcome')</h1>
            <form id="search-form" class="input-group pt-4" autocomplete="off">
                <input autocomplete="false" name="hidden" type="text" class="d-none">
                <div class="input-group-prepend">
                    <div class="input-group-text">@lang('main_layout.country')</div>
                </div>
                <input class="form-control" id="search-countries" type="text" placeholder="@lang('main_layout.search')" aria-label="@lang('main_layout.search')">
                <div class="dropdown-menu">
                    <i class="no-results d-none">@lang('main_layout.search_no_results')</i>
                    <div class="list-autocomplete"></div>
                </div>
            </form>
        </div>
    </div>
    <div id="welcome-promo" class="row pt-5">
        <div class="mx-auto col-10 col-lg-6 rounded p-2">
            @lang('main_layout.website_welcome_promo')
        </div>
    </div>
@stop
@section('extra-footer')
| Photo by <a href="{{ $photo['link'] }}" rel="nofollow" target="_blank">{{ $photo['credit'] }}</a>
@stop
@section('extra-js')
    <script type="text/javascript" src="{{ asset('js/jquery.backstretch.min.js') }}"></script>
    <script type="text/javascript">
    $(function() {
        $.backstretch("{{ asset('files/' . $photo['file_name']) }}");
    });
    </script>
@stop
