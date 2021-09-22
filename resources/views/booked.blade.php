@extends('layouts.app')

@section('content')

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <div class="card" style="justify-content: center !important; margin-left: 400px; width:400px !important; height:180px !important">
        <div class="card-header">
        <strong>Grazie!</strong>
        </div>
        <div class="card-body">
          <h5 class="card-title"><strong>Prenotato</strong></h5>
          <p class="card-text">Grazie per la tua prenotazione, ti aspettiamo!</p>
          <a href="/home" class="btn btn-primary" style="color:white; background-color: #992b0a; border-color: #992b0a;">Home</a>
        </div>
      </div>



@endsection