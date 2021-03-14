<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>FooDuro</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  {{-- FAVICON --}}
  <link rel="icon" type="image/png" href="{{asset('storage/assets/favicon.png')}}"/>
  {{-- CUSTOM CURSOR --}}
  <script src="https://cdn.jsdelivr.net/npm/kursor"></script>
  <link rel="stylesheet" href="https://unpkg.com/kursor/dist/kursor.css"/>
 

  @stack('scriptPayment')
  @stack('scriptStatistics')
  </head>
<body>

  <div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        @auth
            @include('components.header')
        @else
          @include('components.header')
        @endauth
    @endif
  </div>

  <main id="app">
    @yield('content')      
  </main>

  @include('components.footer')

  <script src="{{asset('js/app.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/kursor"></script>
</body>



</html>
