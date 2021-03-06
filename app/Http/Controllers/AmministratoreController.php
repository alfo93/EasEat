<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Local;

class AmministratoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUtenti()
    {
        $utenti = User::where('ruolo', 'Utente')->orWhere('ruolo', 'Ristoratore')->get();
        return view('gestione_utenti', compact('utenti'));
    }

    public function indexLocali()
    {
        $locali = Local::all();
        return view('gestione_locali', compact('locali'));
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
        $user=User::find($id);
        $user->delete();
        return json_encode(['status' => 'Utente cancellato!']);
    }

    public function destroyLocale($id)
    {
        $locale=Local::find($id);
        $locale->delete();
        return json_encode(['status' => 'Locale cancellato!']);
    }
}
