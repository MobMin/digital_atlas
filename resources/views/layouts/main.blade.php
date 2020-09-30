<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mobile Ministry Forum">
        <title>@lang('main_layout.website_name')</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('extra-css')
    </head>
    @if (Request::path() == '/')
        <body class="home">
    @else
        <body class="pages">
    @endif
        <nav class="navbar navbar-expand-md navbar-primary bg-primary fixed-top">
            <a class="navbar-brand" href="/"><img src="{{ asset('files/logo-landscape.png') }}" alt="Digital World Atlas" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="@lang('main_layout.aria_toggle_nav')">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">@lang('main_layout.nav_home')</a>
                    </li>
                </ul>
                @if (Request::path() != '/')
                    <form id="search-form" class="form-inline my-2 my-lg-0" autocomplete="off">
                        <input autocomplete="false" name="hidden" type="text" class="d-none">
                        <input class="form-control" id="search-countries" type="text" placeholder="{{ ucfirst(__('main_layout.search')) }}" aria-label="@lang('main_layout.search')">
                        <div class="dropdown-menu">
                            <i class="no-results d-none">@lang('main_layout.search_no_results')</i>
                            <div class="list-autocomplete"></div>
                        </div>
                    </form>
                @endif
            </div>
        </nav>

        <main role="main" class="container-fluid">

            @if (Request::path() == '/')
            	<div class="content home">
            @else
                <div class="content">
            @endif
                @yield('content')
            </div>

        </main><!-- /.container -->

        <footer class="footer">
            <p>
                @lang('main_layout.website_tagline') <a href="https://mobileministryforum.org/">@lang('main_layout.mmf_long')</a>
                @yield('extra-footer')
            </p>
        </footer>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
        @yield('extra-js')
    </body>
</html>
