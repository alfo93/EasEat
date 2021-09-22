@extends('layouts.app')
@section('content')

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ricerca.css') }}">
    <link href="{{ asset('js/bootstrap.js') }}">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album-rtl/">
    <link href="/docs/5.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet" integrity="sha384-mUkCBeyHPdg0tqB6JDd+65Gpw5h/l8DKcCTV2D2UpaMMFd7Jo8A+mDAosaWgFBPl" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <script src="{{ asset('js/ricerca_locali.js') }}" defer></script>




    @if (count($query) == 0)
        <div class="container">
            <div class="row" style="margin-top:30px">
                <div class="col-12">
                    <h2 style="position:relative; text-align:center; color:#992b0a; font-family:'Nunito';">Ci dispiace, non abbiamo trovato nessun risultato</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <img class="wmx100" src="https://cdn.sstatic.net/Sites/stackoverflow/img/404.svg" style="display:block; margin-left:140px; margin-right:140px; width:50%; margin-top:20px;"
                        alt="Page not found">
                </div>
            </div>
        </div>
    @else
        <main>
            <section class="py-5 text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Risultati di ricerca</h1>
                        <p class="lead text-muted">Qui trovi dei filtri per aiutarti a cercare il locale che soddisfa le tue
                            esigenze</p>
                    </div>
                    <div id="myBtnContainer">
                        <button class="btn active" onclick="filterSelection('all')">Mostra tutto</button>
                        <button id="bottone" class="btn" onclick="filterSelection('Pub')">Pub</button>
                        <button id="bottone" class="btn" onclick="filterSelection('Ristorante')">Ristorante</button>
                        <button id="bottone" class="btn" onclick="filterSelection('Bar')">Bar</button>
                        <div class="form-check form-switch" style="margin-top: 10px;">
                            <input name="sort" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                onclick="tryToSort()">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Ordina per affluenza</label>
                        </div>
                    </div>
                </div>
            </section>

            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="list">
                        @foreach ($query as $key => $query)
                            <div class="col filterDiv {{ $query->locale_tipo }}" id="ord-{{ $query->stima_affluenza }}">
                                <div class="card shadow-sm">
                                    <img class="immagine_locale" src="{{ $query->locale_link_immagine }}">
                                    <div class="card-body">
                                        <p class="card-text">{{ $query->locale_nome }}, {{ $query->locale_indirizzo }}</p>
                                        <p class="card-text">{{ $query->locale_info }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a class="btn btn-sm btn-outline-secondary"
                                                href=" {{ route('locale.show', $query->locale_id) }}"
                                                style="color:white; background-color: #992b0a;">Vai</a>
                                            <p class="text" style="color:#992b0a!important; font-size:15px">Stima
                                                dell'affluenza
                                                attuale: @if($query->stima_affluenza == NULL)
                                                0 persone</p>
                                                @else
                                                {{ $query->stima_affluenza }} persone</p>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    @endif



    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

@endsection
