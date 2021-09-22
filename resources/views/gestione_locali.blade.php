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
                    <input id="myInput" type="search" class="form-control" placeholder="Ricerca tra i Locali registrati" aria-label="Recipient's username" aria-describedby="button-addon2" onkeyup="filterTable()">
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
                              </svg><a href="{{ route('gestione_utenti') }}" id="menu" class="menu list-group-item-secondary">Gestione Utenti</a>
                            <hr class="my-3" />
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                              </svg><a href="#" id="menu" class="menu list-group-item-secondary">Gestione Locali</a>

                </div>
        <div class="container" style="padding-top: 1%; text-align:center">
            <table id="myTable" style="width:100%">
                @foreach ($locali as $key => $locali)
                    <tr style="width: 100%">
                            <td>
                                    <div class="card">
                                        <div class="card-header" style="text-align:start;">
                                            <strong>{{ $locali->nome }}</strong>
                                        </div>

                                        <div class="card-body">
                                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">

                                                <div class="col-3">
                                                    <div style="width:165px !important; padding-right: 0;">
                                                        <div class="box-loc">
                                                            <img src="{{ $locali->link_immagine }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="indirizzo">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path fill-rule="nonzero"
                                                                d="M10 10.833a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zM10 10a1.667 1.667 0 1 0 0-3.333A1.667 1.667 0 0 0 10 10zm4.716-6.485a6.633 6.633 0 0 1 2.034 4.657c0 2.256-1.23 4.621-3.268 6.974a25.286 25.286 0 0 1-3.228 3.101.417.417 0 0 1-.508 0 23.028 23.028 0 0 1-1.014-.857 25.286 25.286 0 0 1-2.214-2.244C4.48 12.793 3.25 10.428 3.25 8.163A6.628 6.628 0 0 1 10 1.667a6.628 6.628 0 0 1 4.716 1.848zM10.711 16.77c.73-.655 1.46-1.385 2.14-2.17 1.92-2.215 3.066-4.418 3.066-6.42a5.795 5.795 0 0 0-5.909-5.68 5.806 5.806 0 0 0-4.147 1.616 5.79 5.79 0 0 0-1.778 4.056c0 2.01 1.146 4.213 3.065 6.428a24.463 24.463 0 0 0 2.845 2.776c.226-.174.463-.377.718-.606z">
                                                            </path>
                                                        </svg> {{ $locali->indirizzo }}
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="info">
                                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="366.182px"
                                                        height="366.182px" viewBox="0 0 366.182 366.182"
                                                        style="enable-background:new 0 0 366.182 366.182;" xml:space="preserve">
                                                        <g>
                                                            <g>
                                                                <path d="M261.39,168.768c19.439-20.182,28.627-44.058,25.867-67.229c-1.263-10.604-7.755-34.217-15.79-57.423
                                                                    c-4.032-11.646-7.924-21.604-11.254-28.793C254.974,4.01,251.488,0,246.899,0H119.287c-4.591,0-8.074,4.01-13.314,15.323
                                                                    c-3.33,7.19-7.222,17.146-11.254,28.793c-8.034,23.206-14.527,46.818-15.789,57.423c-5.785,48.574,41.113,93.064,88.259,102.289
                                                                    c0.609,8.4,1.16,31.939,0.841,59.988c-0.514,45.139-2.784,61.541-4.021,64.074c-1.849,3.256-12.858,7.672-29.624,9.439
                                                                    l-0.467,0.049c-8.963,0.943-25.647,2.703-25.647,16.01c0,6.34,2.987,9.402,5.492,10.855c2.938,1.703,6.455,1.938,9.819,1.938
                                                                    c0.872,0,1.781-0.016,2.719-0.033c0.932-0.018,1.894-0.035,2.878-0.035H237.01c0.983,0,1.945,0.018,2.877,0.035
                                                                    c0.938,0.018,1.848,0.033,2.72,0.033c3.787,0,15.313,0,15.313-12.793c0-13.307-16.686-15.066-25.648-16.01l-0.469-0.049
                                                                    c-16.766-1.77-27.774-6.184-29.597-9.393c-1.269-2.613-3.452-19.045-3.602-64.057c-0.095-28.908,0.736-52.332,1.501-60.404
                                                                    C222.271,198.639,244.937,185.848,261.39,168.768z M187.601,262.764c0.101,41.135,1.785,64.873,5.012,70.557
                                                                    c5.743,10.121,26.296,13.709,38.033,14.947l0.472,0.049c4.729,0.5,15.802,1.666,15.802,5.072c0,0.783-0.09,1.211-0.146,1.404
                                                                    c-0.375,0.152-1.402,0.389-4.167,0.389c-0.807,0-1.648-0.016-2.517-0.033c-0.996-0.018-2.026-0.037-3.08-0.037h-53.536h-54.295
                                                                    c-1.054,0-2.084,0.02-3.081,0.037c-0.868,0.018-1.709,0.033-2.516,0.033c-2.763,0-3.79-0.236-4.165-0.389
                                                                    c-0.058-0.193-0.146-0.621-0.146-1.406c0-3.406,11.072-4.572,15.801-5.07l0.469-0.049c11.738-1.238,32.289-4.826,38.035-14.949
                                                                    c1.193-2.102,4.823-8.498,5.47-70.788c0.152-14.737,0.076-30.267-0.209-42.606c-0.472-20.396-1.172-21.842-1.789-23.117
                                                                    c-0.825-1.701-2.406-2.883-4.229-3.162c-21.24-3.258-43.567-15.155-59.725-31.825c-17.38-17.933-25.634-38.879-23.24-58.981
                                                                    c2.442-20.509,23.675-83.082,30.964-91.84h124.557c7.289,8.759,28.521,71.333,30.964,91.84
                                                                    c5.067,42.551-39.031,82.894-81.847,90.539c-1.834,0.328-3.356,1.52-4.179,3.268C187.488,202.657,187.595,260.312,187.601,262.764
                                                                    z" />
                                                                <path d="M244.876,152.387c7.387-8.986,13.278-16.938,14.321-27.506c0.086-0.874,0.229-4-2.657-4
                                                                    c-36.54,0-110.438,0.014-146.979,0.014c-3.159,0-2.665,3.056-2.574,3.986c1.056,10.84,7.114,19.048,14.765,28.241
                                                                    c12.812,15.393,29.63,25.398,48.34,26.765c3.171,0.232,8.396,0.375,13.635,0.375c4.988,0,9.529-0.133,12.146-0.356
                                                                    C214.984,178.276,232.051,167.988,244.876,152.387z" />
                                                            </g>
                                                        </g>
                                                    </svg> {{ $locali->info }}
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn delete-btn btn-primary btn-outline-danger" data-id={{ $locali->id }}>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                        </svg> Elimina Locale
                                                    </button>
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
                var row = $(this).parents('tr');
                var localeId = $(this).attr('data-id');
                console.log(localeId);
                if(confirm('Vuoi cancellare il Locale?')){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/gestione_locali/" + localeId,
                        type: "DELETE",
                        dataType: "json",
                        data: {
                            'locale': localeId,
                        },
                        success: function(data) {
                            if (data.status === 'Locale cancellato!') {
                                $(row).remove();
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

@endif
@endsection