<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ $title }}</title>
        <meta name="description" content="@lang('main_layout.website_desc')" />
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="mobmin">
        <meta name="twitter:title" content="{{ $title }}">
        <meta name="twitter:description" content="@lang('main_layout.website_desc')">
        <meta name="twitter:image" content="{{ asset('files/digital-world-atlas-share-twitter.jpg') }}">
        <meta property="og:title" content="{{ $title }}" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="{{ Request::url() }}" />
        <meta property="og:image" content="{{ asset('files/digital-world-atlas-share.jpg') }}" />
        <meta property="og:description" content="@lang('main_layout.website_desc')" />
        <meta property="og:site_name" content="@lang('main_layout.website_name')" />
        <meta name="author" content="Mobile Ministry Forum">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        @yield('extra-css')
    </head>
    @if (Request::path() == '/')
        <body class="home">
    @else
        <body class="pages">
    @endif
        <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
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

        <footer class="footer container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <p class="text-center text-md-left">
                        @lang('main_layout.website_tagline') <a href="https://mobileministryforum.org/" target="_blank">@lang('main_layout.mmf_long')</a>
                        @yield('extra-footer')
                    </p>
                </div>
                <div class="col-12 col-md-6">
                    <p class="text-center text-md-right">
                        <span class="text-success">@lang('main_layout.are_you_developer')</span> <a href="https://github.com/MobMin/digital_atlas" target="_blank">@lang('main_layout.contribute_text') GitHub</a>
                    </p>
                </div>
            </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
        @yield('extra-js')
        @if (env('ANALYTICS_TAG') != '')
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('ANALYTICS_TAG') }}"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', '{{ env('ANALYTICS_TAG') }}');
            </script>
        @endif
    </body>
</html>
