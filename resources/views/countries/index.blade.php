@extends('layouts.main')

@section('content')
    <div id="welcome" class="row">
        <div class="mx-auto col-8 col-lg-4">
            <h1>Welcome to the Digital Atlas</h1>
            <form class="input-group pt-5">
                <input class="form-control" type="text" placeholder="Find a Country" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-dark" type="submit">Go</button>
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
