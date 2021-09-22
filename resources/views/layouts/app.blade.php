<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EasEat</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/BVJktcf/logo-Vero-removebg-preview.png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap Core Css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">

    <!-- Waves Effect Css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/node-waves/waves.css') }}">

    <!-- Animation Css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/animate-css/animate.css') }}">

    <!-- Sweetalert Css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalert/sweetalert.css') }}">

    <!-- Morris Chart Css-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/morrisjs/morris.css') }}">

    <!-- JQuery DataTable Css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}">

    <!-- Bootstrap Select Css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}">

    <!-- Custom Css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/referti/style.css') }}">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/themes/theme-white.css') }}">

	<!-- Custom Css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/referti/custom.css') }}">

    <!-- Multi Select Css -->
    <link href="../../plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Dropzone Css -->
    <link href="../../plugins/dropzone/dropzone.css" rel="stylesheet">

    @yield('style')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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
                                <a class="nav-link" style="color:black;" href="{{ route('login') }}"><span>{{ __('Login') }}</span></a>
                            </div>
                        </li>
                        @if (Route::has('pre-register'))
                        <li class="nav-item">
                            <div class="button">
                                <a class="nav-link" style="color:black;" href="{{ route('pre-register') }}"><span>{{ __('Registrati') }}</span></a>
                            </div>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <strong>{{ Auth::user()->username }}</strong>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('home') }}"><strong>{{ __('Home') }}</strong></a>
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
</body>

</html>