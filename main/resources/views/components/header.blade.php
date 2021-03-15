<header>
    <nav id="nav-bar" class="navbar fixed-top nav-dash navbar-expand-md navbar-dark">
        <div class="container">

            <a class="navbar-brand" href="{{route('index')}}">
                <img id="logo_header" src="{{asset('storage/assets/logo.svg')}}" height="40" alt="Fooduro logo">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="btn btn-nav btn-primary btn-header border-0 nav-link font-weight-bold" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn-nav btn btn-primary btn-header border-0 nav-link font-weight-bold" href="{{ route('register') }}">{{ __('Registra') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="far fa-user-circle" style="font-size: 1.5rem;"></i>
                                <span style="font-size: 1.5rem;"> &nbsp; {{ Auth::user()->name }}</span>                                
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">                                
                                <a class="dropdown-item" href="{{ route('user-show')}}">                                     
                                    Il tuo profilo
                                </a>
                                <a class="dropdown-item" href="{{ route('home')}}">                                     
                                    Dashboard
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>