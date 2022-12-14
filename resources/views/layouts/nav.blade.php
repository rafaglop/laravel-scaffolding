<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    
    <div class="container">
        
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('assets/img/logo.svg') }}" alt="{{ config('app.name', 'Laravel') }}">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                
                @guest
                <li class="nav-item">
                    <a href="#" class="nav-link" id="gigya-registration">
                        {{ __('Regístrate') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" id="gigya-login">
                        {{ __('Accede') }}
                    </a>
                </li>
                @else
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('customer.pincode.use') }}">
                        {{ __('Canjea tu pincode') }}
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        {{ Auth::User()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item gigyaShowScreenSet" href="#" id="gigya-profile">
                            {{ __('Mi cuenta') }}
                        </a>
                        <a href="#" class="dropdown-item" id="gigya-logout">
                            {{ __('Desconectar') }}
                        </a>
                    </div>
                </li>
                @endguest
                
            </ul>
            
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif
                
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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