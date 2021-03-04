<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Fooduro</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  </head>
<body>

    @include('components.header')

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
