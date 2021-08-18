<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PrenotazioniRistoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$prenotazione = DB::table('reservations')->where('locals.id_ristoratore', $id)
                    ->join('locals', 'locals.id_ristoratore', '=', 'reservations.id_locale')
                    ->join ('users', 'users.id', '=', 'reservations.id_user')
                    ->select('locals.nome', 'locals.indirizzo', 'reservations.id', 'reservations.id_user', 'reservations.giorno', 'reservations.orario', 'users.name')
                    ->get();*/

        $prenotazione = DB::table('locals')->where('locals.id_ristoratore', $id)
                    ->join('reservations', 'reservations.id_locale', '=', 'locals.id')
                    ->join('users', 'users.id', '=', 'reservations.id_user')
                    ->select('locals.nome', 'locals.indirizzo', 'reservations.id', 'reservations.id_user', 'reservations.giorno', 'reservations.orario', 'users.name')
                    ->get();

        return view('prenoristo',compact('prenotazione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $prenotazione=Reservation::find($id);
        $prenotazione->delete();
        return json_encode(['status' => 'Prenotazione cancellata!']);
    }
}
