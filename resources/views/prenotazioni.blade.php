<?php
$id = Auth::user()->id; ?>

@extends('layouts.app')
@section('content')

    <link href="{{ asset('css/user_page.css') }}" rel="stylesheet">
    <link href="{{ asset('css/locale.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if ( Auth::user()->ruolo == "Utente" )

        <div id="app">
            <main class="py-4">
                <div class="container-sm" style="padding-top: 15px; text-muted">
                    <h3>
                        <p class="text-muted" style="padding-left: 5%">
                            Ciao, {{ Auth::user()->ruolo }} {{ Auth::user()->name }}! > Prenotazioni effettuate
                        </p>
                    </h3>
                    </p>
                    <hr/>
                </div>
                <div class="container-sm" style="padding-top: 10px;">
                    <div class="d-flex flex-row">
                        <div class="col-3 " style="padding-top: 30px;">
                            <img src="https://img.icons8.com/small/16/000000/user-male.png" />
                            <a href="{{ url('/home') }}" class="menu list-group-item-secondary"
                                >Account</a>
                            <hr class="my-3" />
                            <img src="https://img.icons8.com/small/16/000000/calendar.png" />
                            <a id="menu" class="menu list-group-item-secondary" style="color: #810000!important; text-decoration: none;">Prenotazioni effettute</a>

                        </div>
                <div class="container" style="padding-top: 1%">
                    <h2>Visualizza tutte le prenotazioni!</h2>
                    
                      
                   <table class="table table-lg table-dark">
                    
                      <div class="table-responsive">
                        <table class="table align-middle">
                            
                              <thead>
                                <tr>
                                    <th>Locale</th>
                                    <th>Indirizzo</th>
                                    <th>Orario</th>
                                    <th>Giorno</th>
                                    <th>Cancella prenotazione</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($prenotazione as $key => $prenotazione)
                                <tr>
                                      <td>{{ $prenotazione->nome }}</td>
                                      <td>{{ $prenotazione->indirizzo }}</td>
                                      <td>{{ $prenotazione->orario }}</td>
                                      <td>{{ $prenotazione->giorno }}</td>
                                      <td><input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-outline-primary custom-btn delete-btn" data-id="{{ $prenotazione->id }}">Cancella
                                            </button>
                                    </td>             
                                </tr>
                                @endforeach
                              </tbody>
                              
                        </table>
                      </div>
                      
                    </table>
                    </div>
               </div>             
            <script type="application/javascript" src="js/table_filter.js"></script>
            </div>
            </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    
    
    <script type="text/javascript">
            $(document).ready(function() {

                $('.delete-btn').on('click', function(e) { //Always use class, not id
                    e.preventDefault();
                        var row = $(this).parents('tr');            
                        var prenotazioneId = $(this).attr('data-id');  
                        var _token = $('#_token').val();
                        console.log('Cancellazione');
                        if (confirm('Vuoi cancellare la tua prenotazione?')) {
                            $.ajax({
                                url: "/prenotazioni/" +
                                    prenotazioneId,
                                type: "DELETE",
                                dataType: "json",
                                data: {
                                    'id': prenotazioneId,
                                    '_token': _token
                                }, 
                                success: function(data) {
                                    if (data.status === 'Prenotazione cancellata!') {
                                        alert('Prenotazione cancellata');
                                        $(row).remove();
                                    }
                                },
                                error: function(response, stato) {
                                    console.log(stato);
                                    console.log('Delete not working');
                                }
                            });
                        } else {
                            return false;
                        }
                });
            });
    </script>
    @endif
@endsection
