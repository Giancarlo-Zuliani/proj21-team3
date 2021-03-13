<!DOCTYPE HTML>
<html>
	<head>
		<title>ERROR 404</title>
		<meta name="keywords" content="404 iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
		<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"  media="all" />

	</head>
	<body>

    <div class="container-fluid" id="container404">
			<div class="logo">
				<h1 id="text-logo">Fooduro </h1><img height="50"; width="50"; src="{{asset('storage/assets/logo-white-xs.svg')}}">
				{{-- <img id="logo-white-xs" height="50"; width="50"; src="{{asset('storage/assets/logo-white-xs.svg')}}"> --}}
			</div>
        <div class="ops">
          <h1 id="text404">404 <br> Ops, page not found! </h1>
        </div>
			<div id="image404">
				<img id="astronauta" src="{{asset('storage/assets/404-tutti2.svg')}}">
			</div>
			<a id="home" href="{{route('index')}}">Take me home</a>
    </div>
	</body>
</html>
