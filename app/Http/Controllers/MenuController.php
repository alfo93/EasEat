<?php

namespace App\Http\Controllers;

use App\Starter;
use App\First;
use App\Second;
use App\Sweet;
use App\Beverage;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
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
    public function store(Request $request, $nome_menu)
    {
        if ($nome_menu == 'antipasto') {
            $this->validate(request(),[
            'id_locale' => 'required|integer',
            'nome_piatto' => 'required|string|max:100|unique:starters,nome_piatto',
            'costo' => 'required|string|max:100',
        ]);
            $antipasti = new Starter;

            $antipasti->id_locale = request('id_locale');
            $antipasti->nome_piatto = request('nome_piatto');
            $antipasti->costo = request('costo');
            
            $antipasti->save();

            return json_encode(['status' => 'Menu modificato', 'antipasti' => $antipasti]);

        } else if ($nome_menu == 'primo') {
            $this->validate(request(),[
            'id_locale' => 'required|integer',
            'nome_piatto' => 'required|string|max:100',
            'costo' => 'required|string|max:100',
        ]);
            $primi = new First;

            $primi->id_locale = request('id_locale');
            $primi->nome_piatto = request('nome_piatto');
            $primi->costo = request('costo');
            
            $primi->save();

            return json_encode(['status' => 'Menu modificato', 'primi' => $primi]);
        } else if ($nome_menu == 'secondo') {
             $this->validate(request(),[
            'id_locale' => 'required|integer',
            'nome_piatto' => 'required|string|max:100',
            'costo' => 'required|string|max:100',
        ]);
            $secondi = new Second;

            $secondi->id_locale = request('id_locale');
            $secondi->nome_piatto = request('nome_piatto');
            $secondi->costo = request('costo');
            
            $secondi->save();

            return json_encode(['status' => 'Menu modificato', 'secondi' => $secondi]);
        } else if ($nome_menu == 'dolce') {
            $this->validate(request(),[
            'id_locale' => 'required|integer',
            'nome_piatto' => 'required|string|max:100',
            'costo' => 'required|string|max:100',
        ]);
            $dolci = new Sweet;

            $dolci->id_locale = request('id_locale');
            $dolci->nome_piatto = request('nome_piatto');
            $dolci->costo = request('costo');
            
            $dolci->save();

            return json_encode(['status' => 'Menu modificato', 'dolci' => $dolci]);
        } else if ($nome_menu == 'bevanda') {
             $this->validate(request(),[
            'id_locale' => 'required|integer',
            'nome_piatto' => 'required|string|max:100',
            'costo' => 'required|string|max:100',
        ]);
            $bevande = new Beverage;

            $bevande->id_locale = request('id_locale');
            $bevande->nome_bevanda = request('nome_piatto');
            $bevande->costo = request('costo');
            
            $bevande->save();

            return json_encode(['status' => 'Menu modificato', 'bevande' => $bevande]);
        }

    }


    public function getAntipasti($id) 
    {
        return DB::table('locals')->where('locals.id', $id)
                    ->join('starters', 'locals.id', '=', 'starters.id_locale')
                    ->select('starters.nome_piatto', 'starters.costo', 'starters.id')
                    ->get();
    }

    public function getPrimi($id) 
    {
        return DB::table('locals')->where('locals.id', $id)
                    ->join('firsts', 'locals.id', '=', 'firsts.id_locale')
                    ->select('firsts.nome_piatto', 'firsts.costo', 'firsts.id')
                    ->get();
    }

    public function getSecondi($id) 
    {
        return DB::table('locals')->where('locals.id', $id)
                    ->join('seconds', 'locals.id', '=', 'seconds.id_locale')
                    ->select('seconds.nome_piatto', 'seconds.costo', 'seconds.id')
                    ->get();
    }

    public function getDolci($id) 
    {
        return DB::table('locals')->where('locals.id', $id)
                    ->join('sweets', 'locals.id', '=', 'sweets.id_locale')
                    ->select('sweets.nome_piatto', 'sweets.costo', 'sweets.id')
                    ->get();
    }

    public function getBevande($id) 
    {
        return DB::table('locals')->where('locals.id', $id)
                    ->join('beverages', 'locals.id', '=', 'beverages.id_locale')
                    ->select('beverages.nome_bevanda', 'beverages.costo', 'beverages.id')
                    ->get();
    }

    public function show($id)
    {
        $info_locale = DB::table('locals')->select('id')->where('id',$id)->get();
        $antipasti = $this->getAntipasti($id);
        $primi = $this->getPrimi($id);
        $secondi = $this->getSecondi($id);
        $dolci = $this->getDolci($id);
        $bevande = $this->getBevande($id);
        return view('menu', compact('info_locale', 'antipasti', 'primi', 'secondi', 'dolci', 'bevande'));
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
    public function destroy($id, $nome_menu)
    {
        if ($nome_menu == 'antipastos') {
            $antipasti=Starter::find($id);
            $antipasti->delete();
            return json_encode(['status' => 'Pietanza cancellata']);
        } else if ($nome_menu == 'primos') {
            $primi=First::find($id);
            $primi->delete();
            return json_encode(['status' => 'Pietanza cancellata']);
        } else if ($nome_menu == 'secondos') {
            $secondi=Second::find($id);
            $secondi->delete();
            return json_encode(['status' => 'Pietanza cancellata']);
        } else if ($nome_menu == 'dolces') {
            $dolci=Sweet::find($id);
            $dolci->delete();
            return json_encode(['status' => 'Pietanza cancellata']);
        } else if ($nome_menu == 'bevandas') {
            $bevande=Beverage::find($id);
            $bevande->delete();
            return json_encode(['status' => 'Pietanza cancellata']);
        }
        
    }
}
