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
    @if ( Auth::user()->ruolo == "Ristoratore" )

        <div id="app">
            <main class="py-4">
                <div class="container-sm" style="padding-top: 15px; text-muted">
                    <h3>
                        <p class="text-muted" style="padding-left: 5%">
                            Ciao, {{ Auth::user()->ruolo }} {{ Auth::user()->name }}! > Locali
                        </p>
                    </h3>
                    </p>
                    <hr/>
                </div>
                <div class="container-sm" style="padding-top: 10px;">
                    <div class="d-flex flex-row">
                        <div class="col-3 " style="padding-top: 30px;">
                            <img src="https://img.icons8.com/windows/16/000000/cook-male.png"/>
                            <a href="{{ url('/home') }}" class="menu list-group-item-secondary" style="color: #810000!important;"
                                >Account</a>
                            <hr class="my-3" />
                            <img src="https://img.icons8.com/ios/16/000000/restaurant-building.png"/>
                            <a id="menu" style="color: #810000!important; text-decoration: none;" class="menu list-group-item-secondary">Locali</a>
                            <hr class="my-3" />
                            <img src="https://img.icons8.com/small/16/000000/calendar.png" />
                            <a href="{{ url('/prenoristo', [$id]) }}" id="menu" class="menu list-group-item-secondary" style="color: #810000!important;">Prenotazioni</a>
                            <hr class="my-3" />
                        </div>
                        <div class="col-lg">
                            <h4 class="text-muted" style="text-align: center;">Inserisci un nuovo locale</h4>
                            <div class="justify-content-center" style="padding-top: 2%;">
                                <button type="button" style="width:100%;"class="btn btn-outline-primary custom-btn" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Aggiungi</button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Nuovo Locale</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <form method="POST" action="{{route('locali.store') }}">
                                                @csrf
                                                    <div class="form-group">
                                                        <label for="nome" class="col-form-label">{{ __('Nome') }}</label>
                                                        <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
                                                        @error('nome')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="indirizzo" class="col-form-label">{{ __('Indirizzo') }}</label>
                                                        <input id="indirizzo" type="text" class="form-control @error('indirizzo') is-invalid @enderror" name="indirizzo" value="{{ old('indirizzo') }}" required autocomplete="indirizzo" autofocus>
                                                        @error('indirizzo')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="num_tavoli" class="col-form-label">{{ __('N. tavoli') }}</label>
                                                        <input id="num_tavoli" type="number" class="form-control @error('num_tavoli') is-invalid @enderror" name="num_tavoli" value="{{ old('num_tavoli') }}" required autocomplete="num_tavoli" autofocus>
                                                        @error('num_tavoli')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="disp_massima" class="col-form-label">{{ __('Disp. massima') }}</label>
                                                        <input id="disp_massima" type="number" class="form-control @error('disp_massima') is-invalid @enderror" name="disp_massima" value="{{ old('disp_massima') }}" required autocomplete="disp_massima" autofocus>
                                                        @error('disp_massima')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tipo" class="col-form-label">{{ __('Tipo') }}</label>
                                                        <select class="form-select" name="tipo" value="{{ old('tipo') }}" required autocomplete="tipo" autofocus style="width:100%" aria-label="Default select example">
                                                            <option id="tipo" selected>Scegli tra...</option>
                                                            <option value="Bar">Bar</option>
                                                            <option value="Pub">Pub</option>
                                                            <option value="Ristorante">Ristorante</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="info" class="col-form-label">{{ __('Info') }}</label>
                                                        <input id="info" type="text" class="form-control @error('info') is-invalid @enderror" name="info" value="{{ old('info') }}" required autocomplete="info" autofocus>
                                                        @error('info')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="link_immagine" class="col-form-label">{{ __('Link immagine') }}</label>
                                                        <input id="link_immagine" type="text" class="form-control @error('link_immagine') is-invalid @enderror" name="link_immagine" value="{{ old('link_immagine') }}" required autocomplete="link_immagine" autofocus>
                                                        @error('link_immagine')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-floating mb-3" style="display: none;">
                                                        <input name="id_ristoratore" type="number" class="form-control" id="floatingNascosto"
                                                        value="{{ $id }}" readonly>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                                        <button type="submit" class="btn btn-outline-primary custom-btn">Aggiungi</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <table id="myTable">
        @foreach ($locale as $key => $locale)
            <tr>
                <div class="containter">
                        <td>
                                <div class="card">
                                    <div class="card-header" style="text-align:start;">
                                        <strong>{{ $locale->nome }}</strong>
                                    </div>

                                    <div class="card-body">
                                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">

                                            <div class="col-6" style="width:165px !important; padding-right: 0;">
                                                <div class="box-loc">
                                                    <img src="{{ $locale->link_immagine }}">
                                                </div>
                                            </div>

                                            <div class="col" style="width:250px !important; padding-right: 0;">

                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="nonzero"
                                                        d="M10 10.833a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zM10 10a1.667 1.667 0 1 0 0-3.333A1.667 1.667 0 0 0 10 10zm4.716-6.485a6.633 6.633 0 0 1 2.034 4.657c0 2.256-1.23 4.621-3.268 6.974a25.286 25.286 0 0 1-3.228 3.101.417.417 0 0 1-.508 0 23.028 23.028 0 0 1-1.014-.857 25.286 25.286 0 0 1-2.214-2.244C4.48 12.793 3.25 10.428 3.25 8.163A6.628 6.628 0 0 1 10 1.667a6.628 6.628 0 0 1 4.716 1.848zM10.711 16.77c.73-.655 1.46-1.385 2.14-2.17 1.92-2.215 3.066-4.418 3.066-6.42a5.795 5.795 0 0 0-5.909-5.68 5.806 5.806 0 0 0-4.147 1.616 5.79 5.79 0 0 0-1.778 4.056c0 2.01 1.146 4.213 3.065 6.428a24.463 24.463 0 0 0 2.845 2.776c.226-.174.463-.377.718-.606z">
                                                    </path>
                                                </svg>
                                                <div class="indirizzo-locale">
                                                    {{ $locale->indirizzo }}
                                                </div>
                                            </div>

                                            <div class="col" style="width:250px !important; padding-right: 0;">
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
                                                </svg>
                                                <div class="info-locale">

                                                    {{ $locale->info }}
                                                </div>
                                            </div>

                                            <div class="col-sm" style="width:250px !important; padding-right: 0;">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path
                                                        d="M12.795 12.205a.417.417 0 1 1-.59.59l-2.622-2.622V6.25a.417.417 0 1 1 .834 0v3.577l2.378 2.378zM10 17.5a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15zm0-.833a6.667 6.667 0 1 0 0-13.334 6.667 6.667 0 0 0 0 13.334z">
                                                    </path>
                                                </svg>
                                                <p class="info-locale" data-test-id="restaurant-preorder"><strong>Prenota un
                                                        tavolo</strong>
                                                </p>
                                                <p class="info-locale"><span class="c-badge-icon"></span> Apre alle 18:00</p>
                                            </div>
                                            <div class="col-sm" style="width:250px !important; padding-right: 0;">
                                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path
                                                        d="M12.795 12.205a.417.417 0 1 1-.59.59l-2.622-2.622V6.25a.417.417 0 1 1 .834 0v3.577l2.378 2.378zM10 17.5a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15zm0-.833a6.667 6.667 0 1 0 0-13.334 6.667 6.667 0 0 0 0 13.334z">
                                                    </path>
                                                </svg> -->
                                            <p>
                                                @csrf
                                                <p class="text-muted">Vuoi cancellare il tuo locale?</p>
                                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                                <button type="submit" style="width: 100%;" class="btn btn-outline-primary custom-btn delete-btn" id="delete-btn" data-id="{{$locale->id}}" >Delete</button>
                                            </p>
                                            <p>
                                                @csrf
                                                <p class="text-muted" style=" text-align:center">Vuoi modificare il menù?</p>
                                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                                <a href="{{ route('menu.show', $locale->id) }}"><button type="button" style="width: 100%;" class="btn btn-outline-primary custom-btn">Modifica</button></a>
                                            </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </td>
                </div>
            </tr>
                @endforeach

    </table>
    </div>
            </main>
            <script type="application/javascript" src="js/table_filter.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.delete-btn').on('click', function(e) {
                e.preventDefault();
                var row = $(this).parents('tr');
                var localeId = $(this).attr('data-id');
                var _token = $('#_token').val();
                console.log('Deleting...');
                if (confirm('Vuoi cancellare il tuo locale?')) {
                    $.ajax({
                        url: "/locali/" +
                            localeId,
                        type: "DELETE",
                        dataType: "json",
                        data: {
                            'id': localeId,
                            '_token': _token
                        }, // Passo l'id della categria e il token
                        success: function(data) {
                            if (data.status === 'Locale cancellato!') {
                                alert('Locale cancellato');
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
        </div>
    @endif
@endsection
