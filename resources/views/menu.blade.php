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
    @if ( Auth::user()->ruolo == "Ristoratore" )

         @foreach ($info_locale as $key => $info_locale)
         <?php $id_locale = $info_locale->id ?>
       <div id="app">
            <main class="py-4">
                <div class="container-sm" style="padding-top: 15px; text-muted">
                    <h3>
                        <p class="text-muted" style="padding-left: 5%">
                            Ciao, {{ Auth::user()->ruolo }} {{ Auth::user()->name }}! > Menù 

                        </p>
                    </h3>
                    </p>
                    <hr/>
                </div>
                <div class="container-sm" style="padding-top: 10px;">
                    <div class="d-flex flex-row">
                        <div class="col-3 " style="padding-top: 30px;">
                            <img src="https://img.icons8.com/windows/16/000000/cook-male.png"/>
                            <a href="{{ url('/home') }}" class="menu list-group-item-secondary">Account</a>
                            <hr class="my-3" />
                            <img src="https://img.icons8.com/ios/16/000000/restaurant-building.png"/>
                            <a href="{{ url('/locali', [$id]) }}" id="menu" class="menu list-group-item-secondary">Locali</a>
                            <hr class="my-3" />
                            <img src="https://img.icons8.com/small/16/000000/calendar.png" />
                            <a id="#" class="menu list-group-item-secondary" style="color: #810000!important; text-decoration: none;">Menù</a>
                            <hr class="my-3" />
                            <img src="https://img.icons8.com/material-outlined/16/000000/group-task.png"/>
                            <a href="{{ url('/prenoristo', [$id]) }}" id="menu" class="menu list-group-item-secondary">Prenotazioni</a>
                            <hr class="my-3" />
                        </div>
                        <div class="col-lg">
                            <div class="justify-content-center" style="padding-top: 2%;">
                                    @csrf
                                    <p style="text-align: center;">Aggiungi un piatto o una bevanda</p>
                            <form method="POST" id="modificaPiatti">      
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Tipo</label>
                                        <div class="col-md-6">
                                            
                                                <select style="width: 100%;" name="menu_loc" id="menu_loc">
                                                    <option selected>Scegli menù...</option>
                                                    <option value="antipasto">antipasto</option>
                                                    <option value="primo">primo</option>
                                                    <option value="secondo">secondo</option>
                                                    <option value="dolce">dolce</option>
                                                    <option value="bevanda">bevanda</option>
                                                </select>    
                                               
                                        </div>
                                    
                                </div>
                               
                                    <div class="form-group row">
                                        <label for="nome_piatto"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Nome piatto') }}</label>

                                        <div class="col-md-6">
                                            <input id="nome_piatto" type="text" required
                                                class="form-control @error('nome_piatto') is-invalid @enderror" name="nome_piatto"
                                                placeholder="es. Ravioli">

                                            @error('nome_piatto')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="costo"
                                            class="col-md-4 col-form-label text-md-right">Prezzo</label>

                                        <div class="col-md-6">
                                            <input id="costo" type="costo"
                                                class="form-control @error('costo') is-invalid @enderror" name="costo" required autocomplete="costo"
                                                value="" placeholder="{{ request()->id }}">

                                            @error('costo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0" style="padding-top: 2%;">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="d-grid gap-2">
                                                
                                               
                                                @csrf
                                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                                <button id="update_data" 
                                                    class="btn btn-outline-primary custom-btn" style="width: 100%" value="{{ $id_locale }}">
                                                    {{ __('Aggiungi') }}
                                                </button>
                                                <div id="modificato"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </main>
            <div class="container">
                <div class="row justify-content-start" style="text-align: center;">
                
            
            <div class="container-fluid" style="padding-top: 5%;">
                                <h2><p class="fs-2 text-center" style="color: #810000!important;">Menù</p></h2>
                </div>
                <div class="col-4" id="menu_piatti">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        
                            <a class="btn" href="javascript:void(0)" onclick="openMenu(event, 'Antipasti');" id="myLink"
                                role="button" @if ($antipasti->count() == 0) style="display:none;" @endif>
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
                           c-1.696,0-3.415-0.432-4.99-1.341l-10.872-6.277C190.634,309.185,188.995,303.069,191.757,298.287z" />
                                    </svg>
                                    Antipasti</div>
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
                           c-24.146,0-44.349-17.206-48.996-40h437.991C454.349,417.794,434.146,435,410,435z" />
                                    </svg>
                                    Primi</div>
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
                           C451.028,459.999,460,451.027,460,439.999z" />
                                    </svg>
                                    Secondi</div>
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
                           C88.972,240,80,231.028,80,220z M410,460H70c-24.146,0-44.349-17.206-48.996-40h437.991C454.349,442.794,434.146,460,410,460z" />
                                    </svg>
                                    Dolci</div>
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
                           c0.744,0.327,1.539,0.567,2.371,0.707c24.137,4.052,41.655,24.783,41.655,49.293V210z" />
                                    </svg>
                                    Bevande</div>
                            </a>
                    </div>
                </div>
                <div class="col-md" id="contenuto">
                    <div id="Antipasti" class="w3-container menu_piatti w3-padding-32 w3-white">
                        <table class="table table-bordered table-hover" id="tab-antipasti">
                              <thead>
                                <tr>
                                  <th scope="col">Antipasti</th>
                                  <th scope="col">Prezzo</th>
                                  <th scope="col">Cancellazione</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($antipasti as $key => $antipasti)
                                <tr>
                                  <td>{{ $antipasti->nome_piatto }}</td>
                                  <td>{{ $antipasti->costo }}€</td>
                                  <td> <div id="eliminazione">
                                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-outline-primary custom-btn delete-btn" data-id="{{ $antipasti->id }}" tipo-id="antipastos">Cancella
                                                </button>
                                    </div>
                                  </td>  
                                </tr>
                                 @endforeach
                              </tbody>
                            </table>
                       
                    </div>


                    <div id="Primi" class="w3-container menu_piatti w3-padding-32 w3-white">
                        <table class="table table-bordered table-hover" id="tab-primi">
                              <thead>
                                <tr>
                                  <th scope="col">Primi</th>
                                  <th scope="col">Prezzo</th>
                                  <th scope="col">Cancellazione</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($primi as $key => $primi)
                                <tr>
                                  <td>{{ $primi->nome_piatto }}</td>
                                  <td>{{ $primi->costo }}€</td>
                                  <td><input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" id="tab-primi">
                                                <button type="submit" class="btn btn-outline-primary custom-btn delete-btn" data-id="{{ $primi->id }}" tipo-id="primos">Cancella
                                                </button>
                                  </td>  
                                </tr>
                                 @endforeach
                              </tbody>
                            </table>
                       
                    </div>

                    <div id="Secondi" class="w3-container menu_piatti w3-padding-32 w3-white">
                            <table class="table table-bordered table-hover" id="tab-secondi">
                              <thead>
                                <tr>
                                  <th scope="col">Secondo</th>
                                  <th scope="col">Prezzo</th>
                                  <th scope="col">Cancellazione</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($secondi as $key => $secondi)
                                <tr>
                                  <td>{{ $secondi->nome_piatto }}</td>
                                  <td>{{ $secondi->costo }}€</td>
                                  <td><input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-outline-primary custom-btn delete-btn" data-id="{{ $secondi->id }}" tipo-id="secondos">Cancella
                                                </button>
                                  </td>  
                                </tr>
                                 @endforeach
                              </tbody>
                            </table>
                       
                    </div>

                    <div id="Dolci" class="w3-container menu_piatti w3-padding-32 w3-white">
                        <table class="table table-bordered table-hover" id="tab-dolci">
                              <thead>
                                <tr>
                                  <th scope="col">Dolci</th>
                                  <th scope="col">Prezzo</th>
                                  <th scope="col">Cancellazione</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($dolci as $key => $dolci)
                                <tr>
                                  <td>{{ $dolci->nome_piatto }}</td>
                                  <td>{{ $dolci->costo }}€</td>
                                  <td><input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-outline-primary custom-btn delete-btn" data-id="{{ $dolci->id }}" tipo-id="dolces">Cancella
                                                </button>
                                  </td>  
                                </tr>
                                 @endforeach
                              </tbody>
                            </table>
                       
                    </div>

                    <div id="Bevande" class="w3-container menu_piatti w3-padding-32 w3-white">
                        <table class="table table-bordered table-hover" id="tab-bevande">
                              <thead>
                                <tr>
                                  <th scope="col">Bevande</th>
                                  <th scope="col">Prezzo</th>
                                  <th scope="col">Cancellazione</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($bevande as $key => $bevande)
                                <tr>
                                  <td>{{ $bevande->nome_bevanda }}</td>
                                  <td>{{ $bevande->costo }}€</td>
                                  <td><input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-outline-primary custom-btn delete-btn" data-id="{{ $bevande->id }}" tipo-id="bevandas">Cancella
                                                </button>
                                  </td>  
                                </tr>
                                 @endforeach
                              </tbody>
                            </table>
                       
                    </div>
            </div>
     
            
              @endforeach
          
    @endif

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    
    
    <script>

                $(document).on('click','.delete-btn',function(e) {
                    e.preventDefault();
                        var row = $(this).parents('tr');            
                        var pietanzaID = $(this).attr('data-id');
                        var menuName = $(this).attr('tipo-id');  
                        var _token = $('#_token').val();
                        console.log('Cancellazione');
                        
                            $.ajax({
                                url: "/menu/" +
                                    pietanzaID + "/" +
                                    menuName,
                                type: "DELETE",
                                dataType: "json",
                                data: {
                                    'id': pietanzaID,
                                    'nome_menu': menuName,
                                    '_token': _token
                                }, 
                                success: function(data) {
                                    if (data.status === 'Pietanza cancellata') {
                                        console.log('Dish deleted succesfully');
                                        $(row).remove();
                                    }
                                },
                                error: function(response, stato) {
                                    console.log(stato);
                                    console.log('Delete not working');
                                }
                            }); 
                
                });
         
 
    </script>
    <script>
        function openMenu(evt, menuName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("menu_piatti");
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
        $(document).ready(function() {
            
                    $('#modificaPiatti').on('submit', function(e) {
                    e.preventDefault();
                    var localeID = '{{ $id_locale }}';                  
                    var optionValue = $("#menu_loc").val();
                    var _token = $('#_token').val();
                    
                    nome_piatto = $('#nome_piatto').val(),
                    costo = $('#costo').val(),
                    id_locale = $('#update_data').val(),
                    console.log('Modifica in corso');
                    
                        $.ajax({
                            url: "/menu/" +
                                    optionValue,
                            type: "POST",
                            cache: false,
                            dataType: "json",
                            data: {
                                'nome_menu': optionValue,
                                '_token': _token,
                                'nome_piatto': nome_piatto,
                                'costo': costo,
                                'id_locale': id_locale,
                                
                            },

                            success: function(data) {
                              
                                if (data.status === 'Menu modificato') {
                                    if(optionValue == 'antipasto') {
                                        var newColId = $('<td/>', { text: nome_piatto });
                                        var newColName = $('<td/>', { text: costo + '€'});
                                        var dataid = JSON.stringify(data.antipasti.id);
                                        var delAction = $('<button/>', {
                                            text: 'Cancella',
                                            class: "btn btn-outline-primary custom-btn delete-btn",
                                            "data-id": dataid,
                                            "tipo-id": 'antipastos'
                                        });
                                       
                                        var newColAction = $('<td/>').append(delAction);
                                        var newRow = $('<tr/>').append(newColId).append(newColName).append(newColAction);
                                        $('#tab-antipasti').append(newRow);
                                                    }
                                        
                                        
                                    }  
                                    if (optionValue == 'primo') {
                                        var newColId = $('<td/>', { text: nome_piatto });
                                        var newColName = $('<td/>', { text: costo + '€' });
                                        var dataid = JSON.stringify(data.primi.id);
                                        var delAction = $('<button/>', {
                                            text: 'Cancella',
                                            class: "btn btn-outline-primary custom-btn delete-btn",
                                            "data-id": dataid,
                                            "tipo-id": 'primos'
                                        });
                                       
                                        var newColAction = $('<td/>').append(delAction);
                                        var newRow = $('<tr/>').append(newColId).append(newColName).append(newColAction);
                                        $('#tab-primi').append(newRow);
                                    }
                                     if (optionValue == 'secondo') {
                                        var newColId = $('<td/>', { text: nome_piatto });
                                        var newColName = $('<td/>', { text: costo + '€'});
                                        var dataid = JSON.stringify(data.secondi.id);
                                        var delAction = $('<button/>', {
                                            text: 'Cancella',
                                            class: "btn btn-outline-primary custom-btn delete-btn",
                                            "data-id": dataid,
                                            "tipo-id": 'secondos'
                                        });
                                       
                                        var newColAction = $('<td/>').append(delAction);
                                        var newRow = $('<tr/>').append(newColId).append(newColName).append(newColAction);
                                        $('#tab-secondi').append(newRow);
                                    } 
                                     if (optionValue == 'dolce') {
                                        var newColId = $('<td/>', { text: nome_piatto });
                                        var newColName = $('<td/>', { text: costo + '€'});
                                        var dataid = JSON.stringify(data.dolci.id);
                                        var delAction = $('<button/>', {
                                            text: 'Cancella',
                                            class: "btn btn-outline-primary custom-btn delete-btn",
                                            "data-id": dataid,
                                            "tipo-id": 'dolces'
                                        });
                                       
                                        var newColAction = $('<td/>').append(delAction);
                                        var newRow = $('<tr/>').append(newColId).append(newColName).append(newColAction);
                                        $('#tab-dolci').append(newRow);
                                    } 
                                     if (optionValue == 'bevanda') {
                                        var newColId = $('<td/>', { text: nome_piatto });
                                        var newColName = $('<td/>', { text: costo + '€'});
                                        var dataid = JSON.stringify(data.bevande.id);
                                        var delAction = $('<button/>', {
                                            text: 'Cancella',
                                            class: "btn btn-outline-primary custom-btn delete-btn",
                                            "data-id": dataid,
                                            "tipo-id": 'bevandas'
                                        });
                                       
                                        var newColAction = $('<td/>').append(delAction);
                                        var newRow = $('<tr/>').append(newColId).append(newColName).append(newColAction);
                                        $('#tab-bevande').append(newRow);
                                    }
                            },
                            error: function(xhr) {
                                var jsonResponse = JSON.parse(xhr.responseText);
                                $(".alert").html(jsonResponse.message);
                              }
                        });
                    
                });
            }); 

    </script>
    
@endsection
