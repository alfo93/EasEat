@extends('layouts.app')

@section('content')

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>


    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">


                <!-- FORM PER CONTANTI -->
                <form id="contactForm" name="contact" role="form">
                    @csrf

                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-header">{{ __('Metodo di pagamento') }}</div>
                        <div class="card-body">
                            <select id="ChoosePayment" name="ChoosePayment" class="form-select form-select-lg mb-3"
                                aria-label="Default select example" onchange="checkPaymentMethod();">
                                <option value="Metodo di pagamento">Metodo di pagamento</option>
                                <option value="positive">Carta</option>
                                <option value="negative">Contanti</option>
                            </select>
                        </div>
                    </div>


                    <div class="card" id="Cash" style="display: none;">
                        <div class="card-header">
                            <strong>Prenotazione di {{ Auth::user()->username }}</strong>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><strong>Prenota un tavolo</strong></h5>
                            <div class="form-floating mb-3" style="display: none;">
                                <input name="id_user" type="number" class="form-control" id="floatingNascosto"
                                    value="{{ $id_user }}" readonly>
                            </div>
                            <div class="form-floating mb-3" style="display: none;">
                                <input name="id_locale" type="number" class="form-control" id="floatingNascosto"
                                    value="{{ $id_locale }}" readonly>
                            </div>
                            
                            <div class="input-group mb-3">
                                <label class="input-group-text"
                                        for="input">Giorno</label>
                                <input name="giorno" type="date" class="form-control" id="floatingNascosto" max="2021-12-31" required>
                                <label class="input-group-text" for="inputGroupSelect01">Orario</label>
                                <select name="orario" class="form-select" id="inputGroupSelect01" required>
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
                                <label class="input-group-text" for="inputGroupSelect01">Numero di persone</label>
                                <select name="capienza" class="form-select" id="validationDefault04" required>
                                    <option selected disabled value="">Scegli</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color:#992b0a">Concludi la prenotazione</button>
                    </div>
                   
                </form>

                 <!--FINE FORM CONTANTI-->

                    <div class="card" id="CartaDiCredito" style="display: none;">

                        <div class="card-header">{{ __('Pagamento') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('pagamento.store') }}">
                                @csrf

                                <div class="card" style="margin-bottom: 10px;">
                                    <div class="card-header">Prenotazione di {{ Auth::user()->username }}</div>
                                    <div class="card-body">
                                        <div class="form-floating mb-3" style="display: none;">
                                            <input name="id_user" type="number" class="form-control" id="floatingNascosto"
                                                value="{{ $id_user }}" readonly>
                                        </div>
                                        <div class="form-floating mb-3" style="display: none;">
                                            <input name="id_locale" type="number" class="form-control" id="floatingNascosto"
                                                value="{{ $id_locale }}" readonly>
                                        </div>
    
                                        <div class="input-group mb-3">
                                            <label class="input-group-text"
                                                    for="input">Giorno</label>
                                            <input name="giorno" type="date" class="form-control" id="floatingNascosto" max="2021-12-31" required>
                                            <label class="input-group-text" for="inputGroupSelect01">Orario</label>
                                            <select name="orario" class="form-select" id="inputGroupSelect01" required>
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
                                            <label class="input-group-text" for="inputGroupSelect01">Numero di persone</label>
                                            <select name="capienza" class="form-select" id="validationDefault04" required>
                                                <option selected disabled value="">Scegli</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            <div class="form-floating mb-3" style="display: none;">
                                <input name="id_user" type="number" class="form-control" id="floatingNascosto"
                                    value="{{ $id_user }}" readonly>
                            </div>

                            <div class="form-floating mb-3" style="display: none;">
                                <input name="id_locale" type="number" class="form-control" id="floatingNascosto"
                                    value="{{ $id_locale }}" readonly>
                            </div>

                            <div class="form-floating mb-3">

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="nome" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="floatingInput">{{ __('Nome e Cognome') }}</label>

                            </div>

                            <div class="form-floating mb-3">

                                <input id="num_carta" type="text" pattern="\d*"
                                    class="form-control @error('num_carta') is-invalid @enderror" name="num_carta" required
                                    autocomplete="num_carta" minlength="13" maxlength="16">

                                @error('num_carta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="floatingInput">{{ __('Numero della Carta') }}</label>

                            </div>

                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating mb-3">

                                        <input id="data_di_scadenza" type="month"
                                            class="form-control @error('data_di_scadenza') is-invalid @enderror"
                                            name="data_di_scadenza" required autocomplete="data_di_scadenza">

                                        @error('data_di_scadenza')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <label for="floatingInputGrid">{{ __('Data di scadenza (MM/YYYY)') }}</label>

                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input id="cvv" type="password"
                                            class="form-control @error('cvc') is-invalid @enderror" name="cvv" required
                                            autocomplete="new-cvv" minlength="3" maxlength="3">

                                        @error('cvv')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <label for="floatingPassword">cvv</label>

                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">Accetta termini e condizioni</label>
                                    <div class="invalid-feedback"> Devi accettare prima di procedere oltre.</div>
                                </div>
                            </div>

                            <div class="col-12">

                                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop"
                                    style="background-color: #992b0a; font-family: 'Nunito'; font-size:medium;">
                                    {{ __('Paga') }}
                                </button>

                              </div>
                            </form>
                        </div>
                    </div>
               
            </div>
        </div>
    </div>


    <script>
        function checkPaymentMethod() {
            var isPayment = document.getElementById("ChoosePayment");
            var selection = isPayment.options[isPayment.selectedIndex].value;
            console.log(selection);
            if (selection == 'positive') {
                document.getElementById("Cash").style.display = "none";
                document.getElementById("CartaDiCredito").removeAttribute("style");
            } else if (selection == 'negative') {
                document.getElementById("CartaDiCredito").style.display = "none";
                document.getElementById('Cash').removeAttribute("style");
            } else {
                document.getElementById("Cash").style.display = "none";
                document.getElementById("CartaDiCredito").style.display = "none";
                document.getElementById('Metodo di Pagamento').removeAttribute("style");
            }
        }

        $(document).ready(function(){	
            $("#contactForm").submit(function(event){
                submitForm();
                return false;
            });
        });

        function submitForm(){
            $.ajax({
                url: "/prenotazione",
                type: "POST",
                cache:false,
                data: $('form#contactForm').serialize(),
                success: function(response){
                    $("#contact").html(response)
                    window.location.href = '{{ url('booked') }}';
                },
                error: function(response, stato){
                    alert('Errore, inserire tutti i campi correttamente');   
                },
                
            });
        }



    </script>

@endsection
