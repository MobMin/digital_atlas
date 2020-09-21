@extends('layouts.main')

@section('content')
    <div id="welcome" class="row">
        <div class="mx-auto col-8 col-lg-4">
            <h1>Welcome to the Digital Atlas</h1>
            <form id="search-form" class="input-group pt-5" autocomplete="off">
                <input autocomplete="false" name="hidden" type="text" class="d-none">
                <div class="input-group-prepend">
                    <div class="input-group-text">Country</div>
                </div>
                <input class="form-control" id="search-countries" type="text" placeholder="Search" aria-label="Search">
                <div class="dropdown-menu">
                    <i class="no-results d-none">Sorry, no mathes found!</i>
                    <div class="list-autocomplete"></div>
                </div>
            </form>
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
