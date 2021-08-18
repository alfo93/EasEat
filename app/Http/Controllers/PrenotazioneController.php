<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Table;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class PrenotazioneController extends Controller
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
    public function store(Request $request)
    {
        $rules = array('id_user' => 'required|integer',
                       'orario' => 'required|string',
                       'id_locale' => 'required|integer',
                       'giorno' => 'required|string',
                       'capienza' => 'required|integer',
                    );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
            ), 422); 
        }

        $prenotazione = new Reservation;
        $tavolo = new Table;
        $prenotazione->id_user = $request->get('id_user');
        $prenotazione->orario = $request->get('orario');
        $prenotazione->id_locale = $request->get('id_locale');
        $prenotazione->giorno = $request->get('giorno');
        $prenotazione->save();
        $tavolo->id_prenotazione = $prenotazione->id;
        $tavolo->capienza = $request->get('capienza');

        $tavolo->save();

        return response()->json(['message' => 'ok']);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
