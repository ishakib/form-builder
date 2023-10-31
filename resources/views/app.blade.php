<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <div class="container-scroller">
        @section('nav-bar')
            @include('sections.navbar')
        @show

        @section('side-bar')
            @include('sections.sidebar')
        @show
            <div class="container-fluid page-body-wrapper">
                <div class="main-panel">
                    <!--Contents-->
                    @yield('contents')
                </div>
            </div>

        @include('sections.footer')
    </div>

</div>
</body>
</html>
@stack('before-scripts')
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
@stack('after-scripts')
