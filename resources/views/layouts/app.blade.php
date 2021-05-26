<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/d4acc87b25.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/esenciales-style.css') }}" rel="stylesheet">  

</head>
<body>
    <div id="app">
        <!-- mi navbar -->
        <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #3e5731;">
            <div class="container-fluid" >
                <a class="navbar-brand" href="/">
                    <img src="/img/logo_esenciales.png" alt="" width="175">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                 data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2"
                 aria-expanded="false" aria-label="Toogle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent2" >
                    <ul class="navbar-nav ml-auto">                 
                        <li class="nav-item"><a class="nav-link" href="{{ route('productos.catalogo') }}">{{ __('Productos') }}</a></li>
                        @if(Auth::check())
                            <li class="nav-item"><a class="nav-link" href="{{ route('pedidos') }}">{{ __('Pedidos') }}</a></li>
                        @endif
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"> {{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))    
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"> {{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" 
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

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

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
