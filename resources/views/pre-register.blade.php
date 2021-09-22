<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EasEat</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/BVJktcf/logo-Vero-removebg-preview.png">
    <link href="{{ asset('css/pre_register.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

</head>

<body>

<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white" style="background-color: white!important; box-shadow: none">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    EasEat
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <div class="button">
                                <a class="nav-link" style="color:#de593f!important;" href="{{ route('login') }}"><span>{{ __('Login') }}</span></a>
                            </div>
                        </li>
                        @if (Route::has('pre-register'))
                        <li class="nav-item">
                            <div class="button">
                                <a class="nav-link" style="color:#de593f!important;" href="/#page2"><span>{{ __('Locali') }}</span></a>
                            </div>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        <main class="py-4">
            @yield('content')
        </main>

    </div>

    <a class="cliente" href="/register">
        <div class="split left">
            <div class="centered">
                <img src="https://i.postimg.cc/yY3GrNtt/cliente.jpg" alt="Avatar cliente">
                <div style="padding-top: 10%;">
                    <h2><strong>Cliente</strong></h2>
                </div>
                <p><strong>Usufruisci dei nostri servizi, registrati come Cliente</strong></p>
            </div>
            
        </div>
    </a>
    
        <a class="ristoratore"  href="{{ 'register_rist' }}">
        <div class="split right">
            <div class="centered">
                <img src="https://i.postimg.cc/Y916mJsX/cliente.png" alt="Avatar ristoratore">
                <div style="padding-top: 10%;">
                    <h2><strong>Ristoratore</strong></h2>
                </div>
                <p><strong>Offri i tuoi servizi, registrati come Ristoratore</strong></p>
            </div>
        </div>
    </a> 

</body>

</html>
