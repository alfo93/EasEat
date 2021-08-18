<?php

namespace App\Http\Controllers;

use App\Local;
use App\Http\Controllers\Controller;
use App\Prenotazione;
use App\Providers\RouteServiceProvider;
use App\Tavolo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RistoratoreController extends Controller
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

    public function show($id)
    {
        $locale = DB::table('locals')->where('locals.id_ristoratore',$id)->get();
        return view('locali',compact('locale'));
    }

    public function store()
    {
        $this->validate(request(),[
            'nome' => 'required|string|max:255',
            'indirizzo' => 'required|string|max:255',
            'num_tavoli' => 'required|integer',
            'disp_massima' => 'required|integer',
            'tipo' => 'required|string|max:255',
            'info' => 'required|string|max:255',
            'link_immagine' => 'required|string|max:255',
            'id_ristoratore' => 'required|integer',
        ]);
        $locale = new Local;

        $locale->nome = request('nome');
        $locale->indirizzo = request('indirizzo');
        $locale->num_tavoli = request('num_tavoli');
        $locale->disp_massima = request('disp_massima');
        $locale->tipo = request('tipo');
        $locale->info = request('info');
        $locale->link_immagine = request('link_immagine');
        $locale->id_ristoratore = request('id_ristoratore');
        $locale->sponsorizzato = 0;

        $locale->save();

        return view('/home');
    }

    public function destroy($id) {
        $locale=Local::find($id);
        $locale->delete();
        return json_encode(['status' => 'Locale cancellato!']);
    }
}
