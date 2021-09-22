<?php $mail = Auth::user()->email ?>

@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
@if ( Auth::user()->ruolo == "Amministratore" )

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <link href="{{ asset('css/locale.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user_page.css') }}" rel="stylesheet">


    <div class="container-sm" style="padding-top: 15px; text-muted">
        <h3>
            <p class="text-muted" style="padding-left: 5%">
                Ciao, {{ Auth::user()->ruolo }}  > {{ Auth::user()->name }}! 
            </p>
        </h3>
        <hr/>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="input-group mb-3">
                    <input id="myInput" type="search" class="form-control" placeholder="Ricerca tra gli utenti registrati" aria-label="Recipient's username" aria-describedby="button-addon2" onkeyup="filterTable()">
                </div>
            </div>
        </div>
    </div>

    <div class="container-sm" style="padding-top: 10px;">
        <div class="d-flex flex-row">
                <div class="col-3 " style="padding-top: 30px;">
                    <img src="https://img.icons8.com/small/16/000000/user-male.png" />
                            <a class="menu list-group-item-secondary" style="color: #810000!important; text-decoration: none;" href="{{ route("home") }}">Account</a>
                            <hr class="my-3" />
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                              </svg><a href="#" id="menu" class="menu list-group-item-secondary">Gestione Utenti</a>
                            <hr class="my-3" />
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                              </svg><a href="{{ route('gestione_locali') }}" id="menu" class="menu list-group-item-secondary">Gestione Locali</a>

                </div>

            <div class="container" style="padding-top: 1%; text-align:center">
                <table id="myTable" style="width:100%">
                    @foreach ($utenti as $key => $utenti)
                        <tr style="width: 100%">
                                <td>
                                        <div class="card">
                                            <div class="card-header" style="text-align:start;">
                                                <strong>{{ $utenti->name }}</strong>
                                            </div>

                                            <div class="card-body">
                                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">

                                                    <div class="col-3">
                                                        <div class="email" data-id={{ $utenti->email }}>
                                                            {{ $utenti->email }}
                                                        </div>
                                                    </div>

                                                    <div class="col-3">
                                                        <div class="username">
                                                            {{ $utenti->username }}
                                                        </div>
                                                    </div>

                                                    <div class="col-3">
                                                        <div class="ruolo">
                                                            @if( $utenti->ruolo == 'Utente' )
                                                            Cliente
                                                            @else
                                                            {{ $utenti->ruolo }}
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-3">
                                
                                                        <button style="margin-bottom:10px;" type="button" class="btn delete-btn btn-outline-danger" data-id={{ $utenti->id }}>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                            </svg> Elimina Utente
                                                        </button>

                                                        <!--START MODAL-->
                                                        <button type="button" class="btn btn-outline-danger" id="Messaggio" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $utenti->email }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                                                            <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                                            <path d="M2.165 15.803l.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
                                                        </svg> Contatta</button>

                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Invia messaggio</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name" class="col-form-label">Mittente:</label>
                                                                        <input name="mail" type="text" class="form-control" id="floatingNascosto"
                                                                            value="{{ $mail }}" readonly>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="message-text" class="col-form-label">Messaggio:</label>
                                                                        <textarea class="form-control" id="message-text"></textarea>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                                                    <button id="invia" type="button" data-bs-dismiss="modal" class="btn btn-outline-danger">Invia</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--END MODAL-->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    <script type="application/javascript" src="js/table_filter.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
    <script type="text/javascript">

        $('document').ready(function() {

            $('.delete-btn').bind('click', function(e) {
                e.preventDefault();
                var row =  $(this).parents('tr');
                
                var userId = $(this).attr('data-id');
                if(confirm('Vuoi cancellare l`Utente?')){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/amministratore/" + userId,
                        type: "DELETE",
                        dataType: "json",
                        data: {
                            'User': userId,
                        }, // Passo l'id della categria e il token
                        success: function(data) {
                            if (data.status === 'Utente cancellato!') {
                                $(row).remove();
                                //alert('Utente cancellato');
                                //window.location.href = "{{ url('/gestione_utenti') }}";
                            }
                        },
                        error: function(response, stato) {
                            console.log(stato);
                        }
                    });
                }else{
                    return false;
                }
            });

        }); 

        
        

    </script>

@else


<div style="position:relative; text-align:center">
<img src="https://i.ibb.co/VjkRNcj/403-You-Shall-Not-Pass-HTML-CSS.png" alt="401">
</div>
<div>
    <h1 style="position:relative; text-align:center; margin-bottom: 20px; font-family:'Nunito'; color:#992b0a"><strong>403 - You Shall Not Pass</strong></h1>
        
        <p style="position:relative; text-align:center; margin-bottom: 5px; font-family:'Nunito'; font-size: 0.8cm; color:#992b0a">Uh Oh, Gandalf is blocking the way!</p>
        <p style="position:relative; text-align:center; margin-bottom: 5px; font-family:'Nunito'; font-size: 0.8cm; color:#992b0a">Maybe you have a typo in the url? Or you meant to go to a different</p>
        <p style="position:relative; text-align:center; margin-bottom: 5px; font-family:'Nunito'; font-size: 0.8cm; color:#992b0a">location? Like...Hobbiton?</p>

    
</div>

<!--<div style="position:relative; text-align:center">
<img src="https://cdn.dribbble.com/users/761395/screenshots/6287961/error_401.jpg" alt="401">
</div>-->

@endif
@endsection