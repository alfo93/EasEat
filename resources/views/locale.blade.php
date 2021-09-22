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
    <script src="{{ asset('js/shopCart.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pagina_locale.css') }}" rel="stylesheet">

</head>

<body>
    @foreach ($info_locale as $key => $info_locale)
        <div class="grid-container">
            <div class="row">
                <div class="col-md-12" id="navbar">
                    <div id="app">
                        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                            <div class="container">
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    EasEat
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                                    <a class="nav-link" style="color:black;"
                                                        href="{{ route('login') }}"><span>{{ __('Login') }}</span></a>
                                                </div>
                                            </li>
                                            @if (Route::has('pre-register'))
                                                <li class="nav-item">
                                                    <div class="button">
                                                        <a class="nav-link" style="color:black;"
                                                            href="{{ route('pre-register') }}"><span>{{ __('Registrati') }}</span></a>
                                                    </div>
                                                </li>
                                            @endif
                                            <li class="nav-item">
                                                <div class="button">
                                                    <a class="nav-link" id="cart-info" style="color:black;" href="#cart">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                                            </svg>
                                                            Carrello
                                                            <div class="badge" id="item-count">0</div>
                                                            <div class="total_price" id="cart-total">0.00 €</div>
                                                        </span>
                                                    </a>
                                                </div>
                                            </li>
                                        @else

                                            <?php $id_user = Auth::user()->id; ?>

                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" v-pre>
                                                    <strong>{{ Auth::user()->username }}</strong>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('home') }}"><strong>{{ __('Home') }}</strong></a>
                                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                                                   

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                            <li class="nav-item">
                                                <div class="button">
                                                    <a class="nav-link" id="cart-info" style="color:black;" href="">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                                            </svg>
                                                            Carrello
                                                            <div class="badge" id="item-count">0</div>
                                                            <div class="total_price" id="cart-total">0.00 €</div>
                                                        </span>
                                                    </a>
                                                </div>
                                            </li>
                                        @endguest
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>



            <div class="row">
                @if ($info_locale->tipo == 'Ristorante')
                    <div class="immagineLocale">
                        <div class="col-md-12" id="immagine">
                            <img class="img-fluid"
                                src="https://cdn.pixabay.com/photo/2020/03/15/23/05/momos-4935232_960_720.jpg"
                                alt="gyoza">
                        </div>
                    </div>
                @elseif($info_locale->tipo == "Bar")
                    <div class="immagineLocale">
                        <div class="col-md-12" id="immagine">
                            <img class="img-fluid"
                                src="https://cdn.pixabay.com/photo/2017/08/07/07/06/coffeehouse-2600877_960_720.jpg"
                                alt="starbucks">
                        </div>
                    </div>
                @elseif($info_locale->tipo == "Pub")
                    <div class="immagineLocale">
                        <div class="col-md-12" id="immagine">
                            <img class="img-fluid"
                                src="https://cdn.pixabay.com/photo/2013/11/12/01/29/bar-209148_960_720.jpg" alt="pub">
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-4" id="descrizione">
                    <?php $id_locale = $info_locale->id; ?>
                    <div class="nome-locale"><strong>{{ $info_locale->nome }}</strong></div>
                    <div class="info-locale">{{ $info_locale->info }}</div>
                    <div class="indirizzo-locale">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="nonzero"
                                d="M10 10.833a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zM10 10a1.667 1.667 0 1 0 0-3.333A1.667 1.667 0 0 0 10 10zm4.716-6.485a6.633 6.633 0 0 1 2.034 4.657c0 2.256-1.23 4.621-3.268 6.974a25.286 25.286 0 0 1-3.228 3.101.417.417 0 0 1-.508 0 23.028 23.028 0 0 1-1.014-.857 25.286 25.286 0 0 1-2.214-2.244C4.48 12.793 3.25 10.428 3.25 8.163A6.628 6.628 0 0 1 10 1.667a6.628 6.628 0 0 1 4.716 1.848zM10.711 16.77c.73-.655 1.46-1.385 2.14-2.17 1.92-2.215 3.066-4.418 3.066-6.42a5.795 5.795 0 0 0-5.909-5.68 5.806 5.806 0 0 0-4.147 1.616 5.79 5.79 0 0 0-1.778 4.056c0 2.01 1.146 4.213 3.065 6.428a24.463 24.463 0 0 0 2.845 2.776c.226-.174.463-.377.718-.606z">
                            </path>
                        </svg>
                        <strong>Ferrara, {{ $info_locale->indirizzo }}</strong>
                    </div>
                </div>

                <div class="col-4">
                    <div class="container">
                        <div class="toast" id="myToast" data-autohide="false" role="alert" aria-live="assertive" aria-atomic="true" style="margin-top: 10px; margin-bottom:10px;">
                            <div class="toast-header">
                              <strong class="me-auto" style="color: #992b0a"><em>Benvenuto in EasEat!</em></strong>
                              <button type="button" class="btn-close" data-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                              Se vuoi solo prenotare un tavolo, clicca pure sul bottone qui a lato,
                              <br/>
                            Se desideri pre-ordinare, consulta il nostro menu e procedi cliccando Checkout
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="container">

                        <div class="d-flex flex-row-reverse">
                            <div class="p-2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn  btn-lg btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalPrenotazione" id="TastoPrenotazione">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                        </svg>Prenota un Tavolo
                                    </span>
                                </button>
                            </div>
                        </div>

                        @if (Auth::check())
                            <!-- Modal con Login -->
                            @if ($info_locale->num_tavoli - $numero_tavoli_prenotati === 0 || $info_locale->num_tavoli - $numero_tavoli_prenotati < 0)
                                <!-- Modal impossibile prenotare -->
                                <div class="modal fade" id="modalPrenotazione" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tavoli esauriti</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>È impossibile prenotare un tavolo attualmente vista l'affluenza,
                                                    riprova più tardi</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a style="text-decoration:none; " href="{{ route('home') }}">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal"
                                                        style="color:white; background-color: #992b0a; pointer-events:none">Home</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="modal fade" id="modalPrenotazione" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!-- Header -->
                                            <h5 class="modal-title" id="exampleModalLabel"
                                                style=" font-family: 'Nunito', sans-serif; !important">
                                                <strong>Prenotazione di {{ Auth::user()->username }}</strong></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Body -->
                                            <form id="contactForm" name="contact" role="form">
                                                @csrf
                                                <div class="form-floating mb-3" style="display: none;">
                                                    <input name="id_user" type="number" class="form-control" id="floatingNascosto"
                                                        value="{{ $id_user }}" readonly>
                                                </div>
                                                <div class="form-floating mb-3" style="display: none;">
                                                    <input name="id_locale" type="number" class="form-control" id="floatingNascosto"
                                                        value="{{ $id_locale }}" readonly>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="input">Giorno</label>
                                                    <input name="giorno" type="date" class="form-control"
                                                        id="floatingNascosto" max="2021-12-31" required>
                                                    <label class="input-group-text"
                                                        for="inputGroupSelect01">Orario</label>
                                                    <select name="orario" class="form-select" id="inputGroupSelect01"
                                                        required>
                                                        <option selected>Scegli</option>
                                                        <option value="18:00">18:00</option>
                                                        <option value="18:30">18:30</option>
                                                        <option value="19:00">19:00</option>
                                                        <option value="19:30">19:30</option>
                                                        <option value="20:00">20:00</option>
                                                        <option value="20:30">20:30</option>
                                                        <option value="21:00">21:00</option>
                                                        <option value="21:30">21:30</option>
                                                        <option value="22:00">22:00</option>
                                                    </select>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupSelect01">Numero di
                                                        persone</label>
                                                    <select name="capienza" class="form-select" id="validationDefault04"
                                                        required>
                                                        <option selected disabled value="">Scegli</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>

                                                <div class="modal-footer">
                                                    <!-- Footer -->
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Chiudi</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        style="background-color:#992b0a">Prenota</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @else
                            <!-- Modal senza login -->
                            <div class="modal fade" id="modalPrenotazione" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Effettua il Login</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Per creare una prenotazione devi prima effettuare il Login</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a style="text-decoration:none; " href="{{ route('login') }}">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                    style="color:white; background-color: #992b0a; pointer-events:none">Login</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="d-flex justify-content-end">
                            <div class="p-2" id="nTavoli">
                                <div class="info-tavoli">Numero di tavoli disponibili:
                                    {{ $info_locale->num_tavoli - $numero_tavoli_prenotati }}
                                </div>
                            </div>
                            <div class="p-2" id="icona"><svg id="tavolo" height="480pt" viewBox="0 -72 480 480"
                                    width="480pt" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m480 55.847656c-.023438-.925781-.207031-1.839844-.542969-2.703125-.097656-.222656-.203125-.445312-.320312-.65625-.132813-.316406-.28125-.628906-.449219-.929687l-32-48c-1.488281-2.234375-4-3.5703128-6.6875-3.558594h-400c-2.675781 0-5.171875 1.335938-6.65625 3.558594l-32 48c-.167969.300781-.316406.613281-.449219.929687-.117187.210938-.222656.433594-.320312.65625-.347657.859375-.542969 1.773438-.574219 2.703125v.152344 48c0 4.417969 3.582031 8 8 8h8v216c0 4.417969 3.582031 8 8 8h48c4.417969 0 8-3.582031 8-8v-184h320v184c0 4.417969 3.582031 8 8 8h48c4.417969 0 8-3.582031 8-8v-216h8c4.417969 0 8-3.582031 8-8v-48c0-.054688 0-.097656 0-.152344zm-435.71875-39.847656h391.4375l21.335938 32h-434.109376zm403.71875 304h-32v-184c0-4.417969-3.582031-8-8-8h-336c-4.417969 0-8 3.582031-8 8v184h-32v-208h416zm16-224h-448v-32h448zm0 0" /></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-4" id="menu">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <div class="d-flex justify-content-start"><svg alt="" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 17 15">
                            <path d="M5.1 4h3.6a.4.4 0 0 1 0 .8h-.4l-1.2 9.3a.4.4 0 0 1-.4.3h-4a.4.4 0 0 1-.4-.3L1.3 4.8H.7a.4.4 0 1 1 0-.8h3.6V2.2L2.8.7a.4.4 0 1 1 .6-.6L5 1.7a.4.4 0 0 1 .1.3v2zm2.4.8H2L3 13.6h3.3l1-8.8zm7.2 4v-.4c0-.7-.5-1.2-1.2-1.2h-2.4c-.6 0-1.2.5-1.2 1.2v.4h4.8zm.8 3.2v.4a2 2 0 0 1-2 2h-2.4a2 2 0 0 1-2-2V12a1.7 1.7 0 0 1-.4 0 .4.4 0 1 1 0-.8c.3 0 .4 0 .7-.3.4-.4.6-.5 1.1-.5.5 0 .8.1 1.2.5l.6.3c.3 0 .4 0 .7-.3.4-.4.6-.5 1.1-.5.5 0 .8.1 1.2.5l.6.3a.4.4 0 1 1 0 .8 1.7 1.7 0 0 1-.4 0zm-5.6-.5v.9c0 .7.6 1.2 1.2 1.2h2.4c.7 0 1.2-.5 1.2-1.2v-1l-.6-.2c-.3 0-.3 0-.6.3-.4.4-.7.5-1.2.5s-.7-.1-1.1-.5c-.3-.2-.4-.3-.7-.3-.2 0-.3 0-.6.3zm-.8-3.1c0-1.1 1-2 2-2h2.4a2 2 0 0 1 2 2v.8a.4.4 0 0 1-.4.4H9.5a.4.4 0 0 1-.4-.4v-.8z"></path></svg>
                        Menu
                    </div>
                    <a class="btn" href="javascript:void(0)" onclick="openMenu(event, 'Antipasti');" id="myLink" role="button" @if ($antipasti->count() == 0) style="display:none;" @endif>
                        <div class="w3-col s4 tablink w3-padding-large w3-hover-red"><svg version="1.1" id="Capa_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;"
                                xml:space="preserve">
                                <path id="XMLID_494_" d="M450.995,401.537c9.406-5.502,18.167-12.251,26.076-20.16c3.905-3.905,3.905-10.237,0-14.143
                                    L309.924,200.088c-3.906-3.905-10.236-3.905-14.143,0c-4.433,4.432-8.472,9.111-12.118,13.993
                                    c-24.363-40.086-68.134-65.171-115.864-65.171c-1.561,0-3.121,0.027-4.668,0.079L140,125.858V70c0-38.598-31.401-70-70-70H10
                                    C4.478,0,0,4.477,0,10v60c0,38.598,31.401,70,70,70h55.857l12.197,12.197C77.572,165.789,32.254,219.928,32.254,284.455
                                    c0,23.7,6.099,46.679,17.719,67.048C37.81,361.195,30,376.132,30,392.857c0,2.786,0.214,5.539,0.639,8.249
                                    C13.083,405.332,0,421.167,0,440c0,22.056,17.944,40,40,40h400c22.056,0,40-17.944,40-40
                                    C480,421.756,467.722,406.326,450.995,401.537z M120,105.858L87.071,72.929c-3.906-3.905-10.236-3.905-14.143,0
                                    c-3.905,3.905-3.905,10.237,0,14.143L105.857,120H70c-27.57,0-50-22.43-50-50V20h50c27.57,0,50,22.43,50,50V105.858z
                                        M303.177,221.625l152.36,152.361c-19.383,16.147-43.572,24.938-69.111,24.938c-28.898,0-56.067-11.254-76.502-31.688v0
                                    C270.124,327.435,267.876,264.086,303.177,221.625z M319.3,400h-80.448c15.89-9.771,29.754-22.848,40.591-38.621
                                    c4.672,7.07,10.119,13.777,16.339,19.997v0C302.97,388.565,310.86,394.794,319.3,400z M156.69,169.439
                                    c6.185-0.772,9.988-0.53,11.108-0.53c44.235,0,84.479,25.272,103.817,64.777c-16.666,33.611-17.692,73.074-3.078,107.405
                                    C248.043,377.549,209.866,400,167.799,400c-10.97,0-21.75-1.521-32.148-4.528c0.042-0.852,0.063-1.708,0.063-2.567
                                    c0-0.001,0-0.001,0-0.002c0-0.015,0-0.03,0-0.045c0-29.146-23.711-52.857-52.856-52.857c-5.266,0-10.353,0.773-15.155,2.213
                                    c-10.129-17.507-15.448-37.316-15.448-57.759C52.254,224.487,98.167,175.044,156.69,169.439z M68.105,363.501
                                    c0.012-0.005,0.022-0.011,0.033-0.017c4.431-2.229,9.431-3.484,14.719-3.484c18.117,0,32.856,14.74,32.856,32.857
                                    c0,2.382-0.266,4.784-0.79,7.143H50.776C50.26,397.673,50,395.286,50,392.857C50,380.041,57.376,368.915,68.105,363.501z M440,460
                                    H40c-11.028,0-20-8.972-20-20s8.972-20,20-20h400c11.028,0,20,8.972,20,20S451.028,460,440,460z M191.757,270.623
                                    c-2.762-4.783-1.123-10.898,3.66-13.66l10.872-6.277c4.782-2.762,10.899-1.123,13.66,3.66c2.762,4.783,1.123,10.898-3.66,13.66
                                    l-10.872,6.277c-1.574,0.909-3.294,1.341-4.99,1.341C196.97,275.625,193.609,273.832,191.757,270.623z M157.799,334.673v-12.555
                                    c0-5.523,4.478-10,10-10s10,4.477,10,10v12.555c0,5.523-4.478,10-10,10S157.799,340.196,157.799,334.673z M115.648,254.346
                                    c2.761-4.782,8.876-6.422,13.66-3.66l10.873,6.277c4.783,2.761,6.422,8.877,3.66,13.66c-1.852,3.208-5.214,5.001-8.67,5.001
                                    c-1.696,0-3.415-0.432-4.99-1.341l-10.873-6.277C114.525,265.245,112.887,259.129,115.648,254.346z M115.648,314.564
                                    c-2.762-4.783-1.123-10.899,3.66-13.66l10.873-6.277c4.786-2.762,10.899-1.122,13.66,3.66c2.762,4.783,1.123,10.899-3.66,13.66
                                    l-10.873,6.277c-1.575,0.909-3.294,1.341-4.99,1.341C120.861,319.566,117.5,317.772,115.648,314.564z M157.799,246.791v-12.554
                                    c0-5.523,4.478-10,10-10s10,4.477,10,10v12.554c0,5.523-4.478,10-10,10S157.799,252.314,157.799,246.791z M191.757,298.287
                                    c2.762-4.783,8.875-6.421,13.66-3.66l10.872,6.277c4.783,2.762,6.422,8.877,3.66,13.66c-1.853,3.208-5.214,5.001-8.67,5.001
                                    c-1.696,0-3.415-0.432-4.99-1.341l-10.872-6.277C190.634,309.185,188.995,303.069,191.757,298.287z" /></svg>
                            Antipasti
                        </div>
                    </a>
                    <a class="btn" href="javascript:void(0)" onclick="openMenu(event, 'Primi');" role="button" @if ($primi->count() == 0) style="display:none;" @endif>
                        <div class="w3-col s4 tablink w3-padding-large w3-hover-red"><svg version="1.1" id="Capa_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;"
                                xml:space="preserve">
                                <path id="XMLID_9_" d="M470,375h-51.991l15.988-46.33h26.861c3.975,0,7.572-2.354,9.164-5.996
                                    c6.621-15.153,9.979-31.272,9.979-47.91c0-26.566-8.695-51.14-23.388-71.025c-0.342-0.566-0.746-1.105-1.21-1.609
                                    C433.498,173.499,398.986,155,360.236,155c-13.132,0-25.774,2.124-37.607,6.047C296.375,150.399,268.582,145,240,145H100
                                    c-11.028,0-20-8.972-20-20s8.972-20,20-20h30c22.056,0,40-17.944,40-40s-17.944-40-40-40H10C4.477,25,0,29.477,0,35s4.477,10,10,10
                                    h120c11.028,0,20,8.972,20,20s-8.972,20-20,20h-30c-22.056,0-40,17.944-40,40s17.944,40,40,40h48.067
                                    c-23.374,10.759-44.894,25.699-63.631,44.437C42.884,250.989,20,306.236,20,365v10H10c-5.523,0-10,4.477-10,10
                                    c0,38.598,31.402,70,70,70h340c38.598,0,70-31.402,70-70C480,379.477,475.523,375,470,375z M350.236,175.497v33.173
                                    c0,5.523,4.477,10,10,10s10-4.477,10-10v-33.173c25.456,2.545,48.121,14.696,64.309,32.769l-25.521,25.521
                                    c-3.906,3.905-3.906,10.237,0,14.142c3.906,3.907,10.238,3.905,14.142,0l23.3-23.299C455.067,239.369,460,256.502,460,274.764
                                    c0,11.689-1.986,23.065-5.912,33.906h-27.219c-4.266,0-8.062,2.706-9.453,6.738L396.851,375h-73.829l-27.025-60.414
                                    c-1.61-3.599-5.186-5.917-9.128-5.917h-20.485c-3.926-10.841-5.913-22.218-5.913-33.906c0-18.124,4.86-35.139,13.342-49.802
                                    l19.38,20.566c3.787,4.019,10.117,4.209,14.136,0.42c4.02-3.788,4.208-10.116,0.42-14.136l-22-23.348
                                    C301.949,190.284,324.688,178.051,350.236,175.497z M240.9,285.005C240.6,285.001,240.3,285,240,285c-44.112,0-80,35.888-80,80v10
                                    h-50.389v-10c0-71.897,58.492-130.389,130.389-130.389c2.439,0,4.883,0.068,7.322,0.203c-4.436,12.5-6.851,25.948-6.851,39.95
                                    C240.471,278.201,240.614,281.616,240.9,285.005z M180,365c0-33.084,26.916-60,60-60c1.454,0,2.911,0.052,4.36,0.156
                                    c1.563,5.96,3.595,11.807,6.09,17.518c1.592,3.642,5.189,5.996,9.164,5.996h20.774L301.112,375H180V365z M40,365
                                    c0-110.28,89.72-200,200-200c19.453,0,38.497,2.747,56.849,8.186c-12.25,7.672-23.024,17.5-31.78,28.945
                                    c-0.463,0.502-0.867,1.041-1.208,1.607c-2.771,3.75-5.332,7.672-7.658,11.738c-5.367-0.575-10.796-0.865-16.202-0.865
                                    c-82.687,0-150.001,67.08-150.387,149.677c-0.001,0.062-0.001,0.123-0.001,0.184V375H40V365z M410,435H70
                                    c-24.146,0-44.349-17.206-48.996-40h437.991C454.349,417.794,434.146,435,410,435z" /></svg>
                            Primi
                        </div>
                    </a>
                    <a class="btn" href="javascript:void(0)" onclick="openMenu(event, 'Secondi');" role="button" @if ($secondi->count() == 0) style="display:none;" @endif>
                        <div class="w3-col s4 tablink w3-padding-large w3-hover-red"><svg version="1.1" id="Capa_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;"
                                xml:space="preserve">
                                <path id="XMLID_224_" d="M90,80.003c0-22.056,17.944-40.001,40-40.001h135c11.028,0,20-8.972,20-20.001V10c0-5.523,4.477-10,10-10
                                    s10,4.478,10,10v10c0,22.056-17.944,40.001-40,40.001H130c-11.028,0-20,8.972-20,20.001s8.972,20.001,20,20.001h220
                                    c22.056,0,40,17.945,40,40.001s-17.944,40.001-40,40.001H205c-11.028,0-20,8.972-20,20.001v20.001c0,5.523-4.477,10-10,10
                                    s-10-4.478-10-10v-20.001c0-22.056,17.944-40.001,40-40.001h145c11.028,0,20-8.972,20-20.001s-8.972-20.001-20-20.001H130
                                    C107.944,120.004,90,102.059,90,80.003z M480,439.999C480,462.055,462.056,480,440,480H40c-22.056,0-40-17.945-40-40.001
                                    c0-18.805,13.044-34.622,30.56-38.876c4.005-31.517,29.049-56.562,60.565-60.568c3.731-15.364,16.358-27.288,32.095-29.985
                                    c8.187-23.911,30.955-40.577,56.78-40.577c17.029,0,32.425,7.132,43.356,18.565c9.073-28.147,35.519-48.566,66.644-48.566h10
                                    c22.056,0,40,17.945,40,40.001v10c0,19.568-8.07,37.286-21.057,50.002H380c35.592,0,65.065,26.703,69.44,61.127
                                    C466.956,405.376,480,421.193,480,439.999z M240,321.528l20.271-20.272c3.905-3.904,10.238-3.904,14.142,0
                                    c3.905,3.905,3.906,10.238,0,14.143l-24.596,24.597H270c27.57,0,50-22.43,50-50.002v-10c0-11.029-8.972-20.001-20-20.001h-10
                                    c-27.57,0-50,22.43-50,50.002V321.528z M144.007,312.524c12.112,4.543,21.454,14.8,24.727,27.471h50.003
                                    c0.839-3.247,1.263-6.592,1.263-10c0-22.056-17.944-40.001-40-40.001C164.456,289.993,150.574,299.043,144.007,312.524z
                                        M51.004,399.997h377.991c-4.646-22.795-24.85-40.001-48.996-40.001H160c-5.523,0-10-4.478-10-10
                                    c0-10.676-8.408-19.425-18.95-19.973c-0.258-0.008-0.5-0.007-0.749-0.025c-0.101-0.001-0.2-0.002-0.301-0.002
                                    c-11.028,0-20,8.972-20,20.001c0,5.523-4.477,10-10,10C75.854,359.996,55.651,377.202,51.004,399.997z M460,439.999
                                    c0-11.029-8.972-20.001-20-20.001H40c-11.028,0-20,8.972-20,20.001c0,11.029,8.972,20.001,20,20.001h400
                                    C451.028,459.999,460,451.027,460,439.999z" /></svg>
                            Secondi
                        </div>
                    </a>
                    <a class="btn" href="javascript:void(0)" onclick="openMenu(event, 'Dolci');" role="button" @if ($dolci->count() == 0) style="display:none;" @endif>
                        <div class="w3-col s4 tablink w3-padding-large w3-hover-red"><svg version="1.1" id="Capa_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;"
                                xml:space="preserve">
                                <path id="XMLID_917_"
                                    d="M470,400h-80V258.735c17.233-4.451,30-20.13,30-38.734c0-22.056-17.944-40-40-40h-50.712
                                    c-4.063-28.283-25.099-51.16-52.419-57.945c2.082-3.474,3.487-7.323,4.058-11.418l6.701-30.806c0.066-0.303,0.118-0.609,0.155-0.917
                                    c1.048-8.611-1.7-17.108-7.738-23.926c-4.976-5.619-11.705-9.61-19.295-11.595l26.322-26.321c3.905-3.905,3.905-10.237,0-14.143
                                    s-10.237-3.905-14.143,0l-39.035,39.036h-3.391c-12.083,0-23.218,4.747-30.547,13.023c-6.039,6.818-8.787,15.315-7.738,23.926
                                    c0.038,0.308,0.089,0.614,0.155,0.917l6.701,30.806c0.571,4.096,1.976,7.944,4.058,11.418c-27.32,6.785-48.355,29.663-52.419,57.945
                                    H100c-22.056,0-40,17.944-40,40c0,18.604,12.767,34.283,30,38.734V400H10c-5.523,0-10,4.477-10,10c0,38.598,31.402,70,70,70h340
                                    c38.598,0,70-31.402,70-70C480,404.477,475.523,400,470,400z M330,200h50c11.028,0,20,8.972,20,20s-8.972,20-20,20h-50V200z
                                        M324.632,260H370v60H110v-60h145.368c6.926,11.948,19.856,20,34.632,20S317.706,271.948,324.632,260z M370,340v60H110v-60H370z
                                        M214.928,68.248c3.484-3.935,9.307-6.283,15.575-6.283h18.994c6.268,0,12.091,2.349,15.575,6.283
                                    c1.494,1.687,3.178,4.399,2.896,7.866l-6.673,30.68c-0.066,0.303-0.118,0.609-0.155,0.917c-0.839,6.891-8.935,12.29-18.432,12.29
                                    h-5.416c-9.497,0-17.593-5.398-18.432-12.29c-0.038-0.308-0.089-0.614-0.155-0.917l-6.673-30.68
                                    C211.75,72.647,213.434,69.935,214.928,68.248z M220,140h40c27.57,0,50,22.43,50,50v50c0,11.028-8.972,20-20,20s-20-8.972-20-20v-50
                                    c0-5.523-4.477-10-10-10h-88.996C175.651,157.206,195.855,140,220,140z M80,220c0-11.028,8.972-20,20-20h150v40H100
                                    C88.972,240,80,231.028,80,220z M410,460H70c-24.146,0-44.349-17.206-48.996-40h437.991C454.349,442.794,434.146,460,410,460z" /></svg>
                            Dolci
                        </div>
                    </a>
                    <a class="btn" href="javascript:void(0)" onclick="openMenu(event, 'Bevande');" role="button" @if ($bevande->count() == 0) style="display:none;" @endif>
                        <div class="w3-col s4 tablink w3-padding-large w3-hover-red"><svg version="1.1" id="Capa_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;"
                                xml:space="preserve">
                                <path id="XMLID_744_" d="M388.335,301.916c36.367-16.596,57.101-56.173,50.422-96.246L420.872,98.356
                                    c-0.804-4.822-4.975-8.356-9.864-8.356H291.009c-4.888,0-9.06,3.534-9.864,8.356L263.26,205.67
                                    c-6.679,40.073,14.056,79.65,50.422,96.246c8.714,3.977,17.871,6.5,27.327,7.54V460h-30c-5.523,0-10,4.477-10,10s4.477,10,10,10
                                    h79.999c5.523,0,10-4.477,10-10s-4.477-10-10-10h-30V309.456C370.464,308.416,379.621,305.893,388.335,301.916z M282.987,208.958
                                    L299.48,110h103.057l16.493,98.958c0.058,0.348,0.113,0.693,0.166,1.042H282.822C282.875,209.652,282.929,209.307,282.987,208.958z
                                        M351.009,290c-10.128,0-19.893-2.113-29.024-6.279c-21.737-9.919-36.251-30.507-39.348-53.721h136.745
                                    c-3.097,23.213-17.611,43.801-39.348,53.721C370.902,287.887,361.137,290,351.009,290z M169.999,132.906V10c0-5.523-4.477-10-10-10
                                    H99.999c-5.523,0-10,4.477-10,10v122.906C60.573,141.59,40,168.577,40,200v270c0,5.523,4.477,10,10,10h159.998
                                    c5.523,0,10-4.477,10-10V200C219.998,168.577,199.426,141.59,169.999,132.906z M109.999,20h40v110h-40V20z M199.998,460H60V230
                                    h139.999V460z M199.998,210H60v-10c0-24.51,17.518-45.241,41.655-49.293c0.833-0.14,1.627-0.38,2.372-0.707h51.946
                                    c0.744,0.327,1.539,0.567,2.371,0.707c24.137,4.052,41.655,24.783,41.655,49.293V210z" /></svg>
                            Bevande
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md" id="contenuto">

                <div id="Antipasti" class="w3-container menu w3-padding-32 w3-white">
                    @foreach ($antipasti as $key => $antipasti)
                        <div class="card w-75" id="vorspeisen">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="card-text">{{ $antipasti->nome_piatto }} </p>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end" style="margin-block-end: 10px;">
                                        <p class="card-text" id="cash">{{ $antipasti->costo }}
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path class="path"
                                                    d="M11.25 16.667a2.083 2.083 0 1 1 0-4.167 2.083 2.083 0 0 1 0 4.167zm0-.834a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5zm-6.258-4.166V17.5H17.5v-5.833H4.992zm-.417-.834h13.342c.23 0 .416.187.416.417v6.667c0 .23-.186.416-.416.416H4.575a.417.417 0 0 1-.417-.416V11.25c0-.23.187-.417.417-.417zm-1.872-1.45l.824 1.41a.417.417 0 0 1-.72.42l-1.033-1.77a.417.417 0 0 1 .15-.57l11.524-6.725a.417.417 0 0 1 .57.15l3.367 5.758a.417.417 0 0 1-.15.57l-2.258 1.317a.417.417 0 1 1-.42-.72l1.898-1.106-2.946-5.039L2.703 9.383zm8.682.41a.417.417 0 0 1-.72-.419 1.25 1.25 0 1 0-2.163 0 .417.417 0 0 1-.72.418 2.083 2.083 0 1 1 3.603 0z">
                                                </path>
                                            </svg>
                                        </p>
                                    </div>
                                </div>



                                <div class="card-footer bg-transparent">
                                    <button type="button" class="btn btn-secondary float-right" id="toRight">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                            <path class="path"
                                                d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z">
                                            </path>
                                        </svg>
                                        <span class="visually-hidden">Button</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div id="Primi" class="w3-container menu w3-padding-32 w3-white">
                    @foreach ($primi as $key => $primi)
                        <div class="card w-75" id="first">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="card-text">{{ $primi->nome_piatto }} </p>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end" style="margin-block-end: 10px;">
                                        <p class="card-text" id="cash">{{ $primi->costo }} <svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M11.25 16.667a2.083 2.083 0 1 1 0-4.167 2.083 2.083 0 0 1 0 4.167zm0-.834a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5zm-6.258-4.166V17.5H17.5v-5.833H4.992zm-.417-.834h13.342c.23 0 .416.187.416.417v6.667c0 .23-.186.416-.416.416H4.575a.417.417 0 0 1-.417-.416V11.25c0-.23.187-.417.417-.417zm-1.872-1.45l.824 1.41a.417.417 0 0 1-.72.42l-1.033-1.77a.417.417 0 0 1 .15-.57l11.524-6.725a.417.417 0 0 1 .57.15l3.367 5.758a.417.417 0 0 1-.15.57l-2.258 1.317a.417.417 0 1 1-.42-.72l1.898-1.106-2.946-5.039L2.703 9.383zm8.682.41a.417.417 0 0 1-.72-.419 1.25 1.25 0 1 0-2.163 0 .417.417 0 0 1-.72.418 2.083 2.083 0 1 1 3.603 0z">
                                                </path>
                                            </svg>
                                        </p>
                                    </div>
                                </div>



                                <div class="card-footer bg-transparent">
                                    <button type="button" class="btn btn-secondary float-right" id="toRight">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                            <path
                                                d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z">
                                            </path>
                                        </svg>
                                        <span class="visually-hidden">Button</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div id="Secondi" class="w3-container menu w3-padding-32 w3-white">
                    @foreach ($secondi as $key => $secondi)
                        <div class="card w-75" id="second">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="card-text">{{ $secondi->nome_piatto }} </p>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end" style="margin-block-end: 10px;">
                                        <p class="card-text" id="cash">{{ $secondi->costo }} <svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M11.25 16.667a2.083 2.083 0 1 1 0-4.167 2.083 2.083 0 0 1 0 4.167zm0-.834a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5zm-6.258-4.166V17.5H17.5v-5.833H4.992zm-.417-.834h13.342c.23 0 .416.187.416.417v6.667c0 .23-.186.416-.416.416H4.575a.417.417 0 0 1-.417-.416V11.25c0-.23.187-.417.417-.417zm-1.872-1.45l.824 1.41a.417.417 0 0 1-.72.42l-1.033-1.77a.417.417 0 0 1 .15-.57l11.524-6.725a.417.417 0 0 1 .57.15l3.367 5.758a.417.417 0 0 1-.15.57l-2.258 1.317a.417.417 0 1 1-.42-.72l1.898-1.106-2.946-5.039L2.703 9.383zm8.682.41a.417.417 0 0 1-.72-.419 1.25 1.25 0 1 0-2.163 0 .417.417 0 0 1-.72.418 2.083 2.083 0 1 1 3.603 0z">
                                                </path>
                                            </svg>
                                        </p>
                                    </div>
                                </div>



                                <div class="card-footer bg-transparent">
                                    <button type="button" class="btn btn-secondary float-right" id="toRight">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                            <path
                                                d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z">
                                            </path>
                                        </svg>
                                        <span class="visually-hidden">Button</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div id="Dolci" class="w3-container menu w3-padding-32 w3-white">
                    @foreach ($dolci as $key => $dolci)
                        <div class="card w-75" id="sweet">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="card-text">{{ $dolci->nome_piatto }} </p>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end" style="margin-block-end: 10px;">
                                        <p class="card-text" id="cash">{{ $dolci->costo }} <svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M11.25 16.667a2.083 2.083 0 1 1 0-4.167 2.083 2.083 0 0 1 0 4.167zm0-.834a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5zm-6.258-4.166V17.5H17.5v-5.833H4.992zm-.417-.834h13.342c.23 0 .416.187.416.417v6.667c0 .23-.186.416-.416.416H4.575a.417.417 0 0 1-.417-.416V11.25c0-.23.187-.417.417-.417zm-1.872-1.45l.824 1.41a.417.417 0 0 1-.72.42l-1.033-1.77a.417.417 0 0 1 .15-.57l11.524-6.725a.417.417 0 0 1 .57.15l3.367 5.758a.417.417 0 0 1-.15.57l-2.258 1.317a.417.417 0 1 1-.42-.72l1.898-1.106-2.946-5.039L2.703 9.383zm8.682.41a.417.417 0 0 1-.72-.419 1.25 1.25 0 1 0-2.163 0 .417.417 0 0 1-.72.418 2.083 2.083 0 1 1 3.603 0z">
                                                </path>
                                            </svg>
                                        </p>
                                    </div>
                                </div>



                                <div class="card-footer bg-transparent">
                                    <button type="button" class="btn btn-secondary float-right" id="toRight">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                            <path
                                                d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z">
                                            </path>
                                        </svg>
                                        <span class="visually-hidden">Button</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div id="Bevande" class="w3-container menu w3-padding-32 w3-white">
                    @foreach ($bevande as $key => $bevande)
                        <div class="card w-75" id="drink">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="card-text">{{ $bevande->nome_bevanda }} </p>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end" style="margin-block-end: 10px;">
                                        <p class="card-text" id="cash">{{ $bevande->costo }} <svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M11.25 16.667a2.083 2.083 0 1 1 0-4.167 2.083 2.083 0 0 1 0 4.167zm0-.834a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5zm-6.258-4.166V17.5H17.5v-5.833H4.992zm-.417-.834h13.342c.23 0 .416.187.416.417v6.667c0 .23-.186.416-.416.416H4.575a.417.417 0 0 1-.417-.416V11.25c0-.23.187-.417.417-.417zm-1.872-1.45l.824 1.41a.417.417 0 0 1-.72.42l-1.033-1.77a.417.417 0 0 1 .15-.57l11.524-6.725a.417.417 0 0 1 .57.15l3.367 5.758a.417.417 0 0 1-.15.57l-2.258 1.317a.417.417 0 1 1-.42-.72l1.898-1.106-2.946-5.039L2.703 9.383zm8.682.41a.417.417 0 0 1-.72-.419 1.25 1.25 0 1 0-2.163 0 .417.417 0 0 1-.72.418 2.083 2.083 0 1 1 3.603 0z">
                                                </path>
                                            </svg>
                                        </p>
                                    </div>
                                </div>



                                <div class="card-footer bg-transparent">
                                    <button type="button" class="btn btn-secondary float-right" id="toRight">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                            <path
                                                d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z">
                                            </path>
                                        </svg>
                                        <span class="visually-hidden">Button</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <br>
            </div>


            <div class="col-md" id="cartBanner">

                <div class="card text-center border-success mb-3" id="banner" style="max-width: 20rem;">

                    <div class="card-header bg-transparent border-success" id="bannerHeader">
                        @if (Auth::check())
                            Carrello di {{ Auth::user()->username }}
                        @else
                            Carrello
                        @endif
                    </div>

                    <div class="card-body" id="cardBody">

                        <div id="cart" class="cart">
                            <div id="noTarget"
                                class="cart-total-container d-flex justify-content-around text-capitalize mt-5"
                                style="display: none"></div>
                        </div>


                        <!-- cart buttons -->
                        <div class="card-footer bg-transparent border-success" id="bannerFooter">
                            <h5><strong id="tot" class="Totale font-weight-bold">Totale 0.00 € </strong></h5>
                            <div class="cart-buttons-container mt-3 d-flex justify-content-between">
                                <button id="clear-cart" type="button" class="btn btn-danger"
                                    onclick="removeAllElement('Target')">Svuota</button>
                                @if (Auth::check())
                                    @if ($info_locale->num_tavoli - $numero_tavoli_prenotati === 0)
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-secondary text-uppercase btn-pink" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <strong>checkout</strong>
                                          </button>

                                          <!-- Modal -->
                                          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="staticBackdropLabel">Avviso!</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  Non puoi prenotare un tavolo, il locale è pieno.
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    @else
                                    <a onclick="getTotale()" id="ancoraPagamento"
                                        class="btn btn-outline-secondary text-uppercase btn-pink"><strong>checkout</strong></a>
                                    @endif
                                @else
                                    <a onclick="displayMessage()"
                                        class="btn btn-outline-secondary text-uppercase btn-pink"><strong>checkout</strong></a>
                                @endif
                            </div>
                        </div>
                        <!--end of  cart buttons -->
                        <div class="card">
                            <div class="card-body">
                                <div id="paragraph">
                                    <p style="font-family: 'Nunito'"><strong>Per effettuare il CheckOut devi prima
                                            essere registrato al nostro Sito. Effettua il Login, se non sei registrato
                                            Registrati in pochi semplici passi<strong></p>
                                </div>
                                <div id="Demo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <script>
        function openMenu(evt, menuName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("menu");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
            }
            document.getElementById(menuName).style.display = "block";
            evt.currentTarget.firstElementChild.className += " w3-red";
        }
        document.getElementById("myLink").click();

        function getTotale() 
        {
            if(document.getElementById('cart-total').textContent=="0.00 €")
            {
                var p = document.getElementById("ancoraPagamento");
                p.style.pointerEvents="none";
                setTimeout(function(){
                    document.getElementById("ancoraPagamento").style.pointerEvents="auto";
                }, 3000);
            } 
            else
            {
                @if (Auth::check())
                    var id_user = {{ $id_user }};
                    var id_locale = {{ $id_locale }};

                    document.getElementById("ancoraPagamento").style.pointerEvents="";
                    document.getElementById("ancoraPagamento").href= "{{ route('pagamento', compact('id_user', 'id_locale')) }}";
                @endif
            } 
        }

        $(document).ready(function() {
            $("#contactForm").submit(function(event) {
                submitForm();
                return false;
            });
        });

        function submitForm() {
            $.ajax({
                url: "/prenotazione",
                type: "POST",
                cache: false,
                data: $('form#contactForm').serialize(),
                success: function(response) {
                    $("#contact").html(response)
                    $("#modalPrenotazione").modal('hide');
                    window.location.href = '{{ url('booked') }}';
                },
                error: function(response, stato) {
                    alert('Errore, inserire tutti i campi correttamente');
                },
            });
        }

    $(document).ready(function(){
        $("#myToast").toast('show');
    });

    </script>


</body>

</html>
