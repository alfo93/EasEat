@extends('layouts.app')

@section('content')

    <link href="{{ asset('css/locale.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">




    <div class="container">
        <div class="row">
            <div class="col-6" id="col-1">
                <div class="box-bar"><a href="bar"><img src="https://i.ibb.co/ZdMW3Zy/logo-small.png"></a></div>
            </div>
            <div class="col-6" id="col-2">
                <div class="box-pub"><a href="pub"><img src="https://i.ibb.co/4mtCWy4/logo-small.png"></a></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="input-group mb-3">
                    <input id="myInput" type="search" class="form-control" placeholder="Ricerca tra i risultati per nome o indirizzo.." aria-label="Recipient's username" aria-describedby="button-addon2" onkeyup="filterTable()">
                </div>
            </div>
        </div>
    </div>


    <table id="myTable">
        @foreach ($locale as $key => $locale)


            <tr>
                <div class="containter">

                    <td>
                        <a class="ancora" href=" {{ route('locale.show', $locale->locale_id) }}">

                            <div class="card">
                                <div class="card-header" style="text-align:start;">
                                    <strong>{{ $locale->locale_nome }}</strong>
                                </div>




                                <div class="card-body">
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">

                                        <div class="col-6" style="width:165px !important; padding-right: 0;">
                                            <div class="box-loc">
                                                <img src="{{ $locale->locale_link_immagine }}">
                                            </div>
                                        </div>

                                        <div class="col" style="width:250px !important; padding-right: 0;">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="nonzero"
                                                    d="M10 10.833a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zM10 10a1.667 1.667 0 1 0 0-3.333A1.667 1.667 0 0 0 10 10zm4.716-6.485a6.633 6.633 0 0 1 2.034 4.657c0 2.256-1.23 4.621-3.268 6.974a25.286 25.286 0 0 1-3.228 3.101.417.417 0 0 1-.508 0 23.028 23.028 0 0 1-1.014-.857 25.286 25.286 0 0 1-2.214-2.244C4.48 12.793 3.25 10.428 3.25 8.163A6.628 6.628 0 0 1 10 1.667a6.628 6.628 0 0 1 4.716 1.848zM10.711 16.77c.73-.655 1.46-1.385 2.14-2.17 1.92-2.215 3.066-4.418 3.066-6.42a5.795 5.795 0 0 0-5.909-5.68 5.806 5.806 0 0 0-4.147 1.616 5.79 5.79 0 0 0-1.778 4.056c0 2.01 1.146 4.213 3.065 6.428a24.463 24.463 0 0 0 2.845 2.776c.226-.174.463-.377.718-.606z">
                                                </path>
                                            </svg>
                                            <div class="indirizzo-locale">
                                                {{ $locale->locale_indirizzo }}
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

                                                {{ $locale->locale_info }}
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

                                        <div class="col-md-15 col-sm-3">
                                            <div class="col">
                                                <svg height="480pt" viewBox="0 -72 480 480" width="480pt"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="m480 55.847656c-.023438-.925781-.207031-1.839844-.542969-2.703125-.097656-.222656-.203125-.445312-.320312-.65625-.132813-.316406-.28125-.628906-.449219-.929687l-32-48c-1.488281-2.234375-4-3.5703128-6.6875-3.558594h-400c-2.675781 0-5.171875 1.335938-6.65625 3.558594l-32 48c-.167969.300781-.316406.613281-.449219.929687-.117187.210938-.222656.433594-.320312.65625-.347657.859375-.542969 1.773438-.574219 2.703125v.152344 48c0 4.417969 3.582031 8 8 8h8v216c0 4.417969 3.582031 8 8 8h48c4.417969 0 8-3.582031 8-8v-184h320v184c0 4.417969 3.582031 8 8 8h48c4.417969 0 8-3.582031 8-8v-216h8c4.417969 0 8-3.582031 8-8v-48c0-.054688 0-.097656 0-.152344zm-435.71875-39.847656h391.4375l21.335938 32h-434.109376zm403.71875 304h-32v-184c0-4.417969-3.582031-8-8-8h-336c-4.417969 0-8 3.582031-8 8v184h-32v-208h416zm16-224h-448v-32h448zm0 0" />
                                                </svg>
                                                <div class="num_tavoli">
                                                        <p>Numero di tavoli attualmente disponibili:
                                                            {{ $locale->locale_num_tavoli - $locale->tavoli_prenotati }} su
                                                            {{ $locale->locale_num_tavoli }}
                                                        </p>
                                                </div>
                                                <div class="disp_massima">
                                                    <p>Dispozione massima: {{ $locale->locale_disp_massima }}</p>
                                                    <p>Stima dell'affluenza attuale: {{ $locale->stima_affluenza }}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </td>
                </div>

                </div>
            </tr>
        @endforeach

    </table>


    <script type="application/javascript" src="js/table_filter.js"></script>



@endsection
