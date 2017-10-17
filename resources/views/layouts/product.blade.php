<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @section('styles')
        <!-- Main -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    @show
</head>
<body>
    <div id="app">
        <!-- Top Navigation -->
        @include('partials.top-nav')

        <!-- Content -->
        @yield('content')
    </div>

    <!-- Scripts -->
    @section('scripts')
        <script src="{{ asset('js/app.js') }}"></script>
    @show
</body>
</html>
