<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FooDuro</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- Chart js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    {{-- FAVICON --}}
    <link rel="icon" type="image/png" href="{{asset('storage/assets/favicon.png')}}"/>
    {{-- CUSTOM CURSOR --}}
    <script src="https://cdn.jsdelivr.net/npm/kursor"></script>
    <link rel="stylesheet" href="https://unpkg.com/kursor/dist/kursor.css"/>

    @stack('scriptPayment')
    @stack('scriptStatistics')
</head>
<body>
    <div id="app">
        @if (Route::has('login'))

        @auth
            {{-- @include('components.logged-header') --}}
            @include('components.header')
        @else

          @include('components.header')

        @endauth

@endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    {{-- dashboard totalSales --}}
    <section>
        @yield('charts')
    </section>
    
    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/kursor"></script>
</body>
</html>
