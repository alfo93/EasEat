<?php
$id = Auth::user()->id; ?>


@extends('layouts.app')
@section('content')

    <link href="{{ asset('css/user_page.css') }}" rel="stylesheet">


    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (Auth::user()->ruolo == 'Utente')
        <div id="app">
            <main class="py-4">
                <div class="container-sm" style="padding-top: 15px; text-muted">
                    <h3>
                        <p class="text-muted" style="padding-left: 5%">
                            Ciao, Cliente {{ Auth::user()->name }}! > Account
                        </p>
                    </h3>
                    </p>
                    <hr/>
                </div>

                <div class="container-sm" style="padding-top: 10px;">
                    <div class="d-flex flex-row">
                        <div class="col-3 " style="padding-top: 30px;">
                            <img src="https://img.icons8.com/small/16/000000/user-male.png" />
                            <a class="menu list-group-item-secondary"
                                style="color: #810000!important; text-decoration: none;">Account</a>
                            <hr class="my-3" />
                            <img src="https://img.icons8.com/small/16/000000/calendar.png" />
                            <a href="{{ url('/prenotazioni', [$id]) }}" id="menu" class="menu list-group-item-secondary">Prenotazioni effettute</a>

                        </div>
                        <div class="col-lg">
                            <h4 class="text-muted">Visualizza e modifica le informazioni del tuo account</h4>
                            <div class="justify-content-center" style="padding-top: 2%;">

                                <form method="POST" action="{{ url('/User', [$id]) }}" id="modificaUser">
                                    <input name="_method" type="hidden" value="PATCH">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" required
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ Auth::user()->name }}">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="username"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                        <div class="col-md-6">
                                            <input id="username" type="text"
                                                class="form-control @error('username') is-invalid @enderror" name="username"
                                                placeholder="{{ Auth::user()->username }}", value="">

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                placeholder="{{ Auth::user()->email }}", value="">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                   


                                    <div class="form-group row mb-0" style="padding-top: 2%;">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="d-grid gap-2">
                                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                                <button id="update_data" value="{{ Auth::user()->id }}"
                                                    class="btn btn-outline-primary custom-btn">
                                                    {{ __('Modifica') }}
                                                </button>
                                                <div id="modificato"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                @csrf
                                <p class="text-muted" style="padding-top: 5%">Vuoi cancellare il tuo account?</p>
                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                <button type="submit" id="delete-btn" onclick="myFunction()"
                                    class="btn btn-outline-primary custom-btn btn-sm" data-id="">Sì, cancellami!
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    @elseif ( Auth::user()->ruolo == "Ristoratore" )

        <div id="app">
            <main class="py-4">
                <div class="container-sm" style="padding-top: 15px; text-muted">
                    <h3>
                        <p class="text-muted" style="padding-left: 5%">
                            Ciao, {{ Auth::user()->ruolo }} {{ Auth::user()->name }}! > Account
                        </p>
                    </h3>
                    </p>
                    <hr/>
                </div>
                <div class="container-sm" style="padding-top: 10px;">
                    <div class="d-flex flex-row">
                        <div class="col-3 " style="padding-top: 30px;">
                            <img src="https://img.icons8.com/windows/16/000000/cook-male.png"/>
                            <a class="menu list-group-item-secondary"
                                style="color: #810000!important; text-decoration: none;">Account</a>
                            <hr class="my-3" />              
                            <img src="https://img.icons8.com/ios/16/000000/restaurant-building.png"/>
                                <a href="{{ url('/locali', [$id]) }}" id="menu" class="menu list-group-item-secondary">Locali</a>
                            <hr class="my-3" />
                                <img src="https://img.icons8.com/small/16/000000/calendar.png" />
                                <a href="{{ url('/prenoristo', [$id]) }}" id="menu" class="menu list-group-item-secondary">Prenotazioni</a>
                            <hr class="my-3" />
                </div>
                        <div class="col-lg">
                            <h4 class="text-muted">Visualizza e modifica le informazioni del tuo account</h4>
                            <div class="justify-content-center" style="padding-top: 2%;">

                                <form method="POST" action="{{ url('/User', [$id]) }} " id="modificaUser">
                                    <input name="_method" type="hidden" value="PATCH">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" required
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ Auth::user()->name }}">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="username"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                        <div class="col-md-6">
                                            <input id="username" type="text"
                                                class="form-control @error('username') is-invalid @enderror" name="username"
                                                placeholder="{{ Auth::user()->username }}" value="">

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                placeholder="{{ Auth::user()->email }}" value="">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row mb-0" style="padding-top: 2%;">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="d-grid gap-2">
                                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                                <button id="update_data" value="{{ Auth::user()->id }}"
                                                    class="btn btn-outline-primary custom-btn">
                                                    {{ __('Modifica') }}
                                                </button>
                                                <div id="modificato"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                @csrf
                                <p class="text-muted" style="padding-top: 5%">Vuoi cancellare il tuo account?</p>
                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                <button type="submit" id="delete-btn" onclick="myFunction()"
                                    class="btn btn-outline-primary custom-btn btn-sm" data-id="">Sì, cancellami!
                                </button>

                            </div>
                        </div>
                    </div>
            </main>
        </div>

        @elseif ( Auth::user()->ruolo == "Amministratore" )
        <div id="app">
            <main class="py-4">
                <div class="container-sm" style="padding-top: 15px; text-muted">
                    <h3>
                        <p class="text-muted" style="padding-left: 5%">
                            Ciao, {{ Auth::user()->name }}! > Amministratore
                        </p>
                    </h3>
                    </p>
                    <hr/>
                </div>
    
                
    
                <div class="container-sm" style="padding-top: 10px;">
                    <div class="d-flex flex-row">
                        <div class="col-3 " style="padding-top: 30px;">
                            <img src="https://img.icons8.com/small/16/000000/user-male.png" />
                                <a class="menu list-group-item-secondary" style="color: #810000!important; text-decoration: none;">Account</a>
                                <hr class="my-3" />
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                  </svg>
                                <a href="{{ route('gestione_utenti') }}" id="menu" class="menu list-group-item-secondary">Gestione Utenti</a>
                                <hr class="my-3" />
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                  </svg>
                            <a href="{{ route('gestione_locali') }}" id="menu" class="menu list-group-item-secondary">Gestione Locali</a>
    
                        </div>
                        <div class="col-lg">
                            <h4 class="text-muted">Visualizza e modifica le informazioni del tuo account</h4>
                            <div class="justify-content-center" style="padding-top: 2%;">
    
                                <form method="POST" action="{{ url('/User', [$id]) }} " id="modificaUser">
                                    <input name="_method" type="hidden" value="PATCH">
                                    @csrf
    
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ Auth::user()->name }}">
    
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="form-group row">
                                        <label for="username"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
    
                                        <div class="col-md-6">
                                            <input id="username" type="text"
                                                class="form-control @error('username') is-invalid @enderror" name="username"
                                                placeholder="{{ Auth::user()->username }}" value="">
    
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="form-group row">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                placeholder="{{ Auth::user()->email }}" value="">
    
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="form-group row mb-0" style="padding-top: 2%;">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="d-grid gap-2">
                                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                                <button id="update_data" value="{{ Auth::user()->id }}"
                                                    class="btn btn-outline-primary custom-btn">
                                                    {{ __('Modifica') }}
                                                </button>
                                                <div id="modificato"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
    
                                @csrf
    
                            </div>
                        </div>
                    </div>
            </main>
        </div>
    

    @endif
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            function myFunction() {
                var categoryId =
                    '{{ Auth::user()->id }}'; // $(this).attr('data-id');  Ottengo l'id della categoria andando a prelevare il valore dell'attributo "data-id"
                var _token = $('#_token').val();
                console.log('ciao');
                if (confirm('Vuoi cancellare il tuo utente?')) {
                    $.ajax({
                        url: "/User/" +
                            categoryId,
                        type: "DELETE",
                        dataType: "json",
                        data: {
                            'User': categoryId,
                            '_token': _token
                        }, // Passo l'id della categria e il token
                        success: function(data) {
                            if (data.status === 'Utente cancellato!') {
                                alert('Utente cancellato');
                                window.location.href = '{{ url('/') }}';
                            }
                        },
                        error: function(response, stato) {
                            console.log(stato);
                        }
                    });
                } else {
                    return false;
                }
            }

            $(document).ready(function() {
             
                $('#modificaUser').on('submit', function(e) {
                   
                    var userID = '{{ Auth::user()->id }}';
                    var _token = $('#_token').val();
                    console.log('Modifica in corso');
                    if (confirm('Vuoi modificare le informazioni?')) {
                        
                        $.ajax({
                            url: "/User/" +
                                userID,
                            type: "PATCH",
                            cache: false,
                            dataType: "json",
                            data: {
                                'User': userID,
                                '_token': _token,
                                name: $('#name').val(),
                            }, // Passo l'id della categria e il token
                            success: function(data) {
                                if (data.status === 'Utente modificato') {
                                    var paragraph = document.getElementById("modificato");
                                    document.getElementById("modificato").classList.add('text-muted');
                                    var text = document.createTextNode("Informazioni modificate!");
                                    paragraph.appendChild(text);
                                    window.location.href="{{ url('/home') }}"
                                }
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                    } else {
                        return false;
                    }
                });
            });

        </script>
@endsection