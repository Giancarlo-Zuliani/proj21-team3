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
  <link rel="icon" type="image/png" href="/images/favicon.png"/>

  @stack('scriptPayment')
  @stack('scriptStatistics')
  </head>
<body>

  <div class="flex-center position-ref full-height">
    @if (Route::has('login'))

            @auth
                {{-- @include('components.logged-header') --}}
                @include('components.header')
            @else

              @include('components.header')

            @endauth

    @endif

</div>

    {{-- @include('components.header') --}}

    <main id="app">
      @yield('content')



    </main>

    

    {{-- <div id="prova">
      @yield('content')
    </div> --}}

    @include('components.footer')


    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
