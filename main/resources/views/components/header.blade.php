<header>
        <div class="logo">
            <a href="{{route('index')}}">
                <img src="{{asset('storage/assets/logo.svg')}}" alt="Fooduro logo">
            </a>
        </div>
        
        <div class="btns">
            <a href="{{ route('register') }}">
                <button class="btn btn-primary">
                    Register
                </button>
            </a>

            <a href="{{ route('login') }}">
                <button class="btn btn-primary">
                    Login
                </button>
            </a>
        </div>
</header>