<!DOCTYPE HTML>
<html>
	<head>
		<title>Page not found | FooDuro </title>
		<meta name="keywords" content="404 iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
		<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"  media="all" />
		 {{-- FAVICON --}}
		 <link rel="icon" type="image/png" href="{{asset('storage/assets/favicon.png')}}"/>		
	</head>
	<body style="overflow:hidden;background-color:#2F294D;">
		<div id="container_404" class="container-fluid" style="background-image: url('{{asset('storage/assets/404.svg')}}') ">
			<div id="notfound" >
				<h1 class="quattro text-center font-weight-bolder">404</h1>
				<h1 class="text-center font-weight-bolder">Ops, page not found!</h1>
			</div>
			<div id="error_404_button">
				<a href="{{route('index')}}">
					<h1 class="font-weight-bolder">Take me home!</h1>					
				</a>
			</div>	
		</div>
  	</body>
</html>
