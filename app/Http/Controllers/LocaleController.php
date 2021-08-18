<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocaleController extends Controller
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

    public function bar()
    {
        $results = DB::select(
            'select locale_id, locale_nome, locale_indirizzo, locale_num_tavoli, locale_id_ristoratore, locale_disp_massima, locale_pianta, 
            locale_tipo, locale_sponsorizzato, locale_link_immagine, locale_info, tavoli_prenotati, stima_affluenza 

            from

            (select locals.id as primo_id, locals.nome, locals.indirizzo, locals.num_tavoli, locals.id_ristoratore, locals.disp_massima, 
            locals.pianta, locals.tipo, locals.sponsorizzato, locals.link_immagine, locals.info,
            count(tables.id) as tavoli_prenotati, sum(tables.capienza) as stima_affluenza
            from locals, reservations, tables
            where locals.tipo = "bar" and reservations.id_locale = locals.id and tables.id_prenotazione = reservations.id
            group by locals.id) prima_query

            right join

            (select locals.id as locale_id, locals.nome as locale_nome, locals.indirizzo as locale_indirizzo, 
            locals.num_tavoli as locale_num_tavoli, locals.id_ristoratore as locale_id_ristoratore, locals.disp_massima as locale_disp_massima, 
            locals.pianta as locale_pianta, locals.tipo as locale_tipo, locals.sponsorizzato as locale_sponsorizzato, 
            locals.link_immagine as locale_link_immagine, locals.info as locale_info
            from locals where tipo="bar") seconda_query

            on prima_query.primo_id = seconda_query.locale_id
            group by locale_id'
        );

        return view('bar',['locale' => $results]);   
    }

    public function ristorante()
    {
        $results = DB::select(
            'select locale_id, locale_nome, locale_indirizzo, locale_num_tavoli, locale_id_ristoratore, locale_disp_massima, locale_pianta, 
            locale_tipo, locale_sponsorizzato, locale_link_immagine, locale_info, tavoli_prenotati, stima_affluenza 

            from

            (select locals.id as primo_id, locals.nome, locals.indirizzo, locals.num_tavoli, locals.id_ristoratore, locals.disp_massima, 
            locals.pianta, locals.tipo, locals.sponsorizzato, locals.link_immagine, locals.info,
            count(tables.id) as tavoli_prenotati, sum(tables.capienza) as stima_affluenza
            from locals, reservations, tables
            where locals.tipo = "ristorante" and reservations.id_locale = locals.id and tables.id_prenotazione = reservations.id
            group by locals.id) prima_query

            right join

            (select locals.id as locale_id, locals.nome as locale_nome, locals.indirizzo as locale_indirizzo, 
            locals.num_tavoli as locale_num_tavoli, locals.id_ristoratore as locale_id_ristoratore, locals.disp_massima as locale_disp_massima, 
            locals.pianta as locale_pianta, locals.tipo as locale_tipo, locals.sponsorizzato as locale_sponsorizzato, 
            locals.link_immagine as locale_link_immagine, locals.info as locale_info
            from locals where tipo="ristorante") seconda_query

            on prima_query.primo_id = seconda_query.locale_id
            group by locale_id'
        );

        return view('ristorante',['locale' => $results]); 
    }

    public function pub()
    {
        $results = DB::select(
            'select locale_id, locale_nome, locale_indirizzo, locale_num_tavoli, locale_id_ristoratore, locale_disp_massima, locale_pianta, 
            locale_tipo, locale_sponsorizzato, locale_link_immagine, locale_info, tavoli_prenotati, stima_affluenza 

            from

            (select locals.id as primo_id, locals.nome, locals.indirizzo, locals.num_tavoli, locals.id_ristoratore, locals.disp_massima, 
            locals.pianta, locals.tipo, locals.sponsorizzato, locals.link_immagine, locals.info,
            count(tables.id) as tavoli_prenotati, sum(tables.capienza) as stima_affluenza
            from locals, reservations, tables
            where locals.tipo = "pub" and reservations.id_locale = locals.id and tables.id_prenotazione = reservations.id
            group by locals.id) prima_query

            right join

            (select locals.id as locale_id, locals.nome as locale_nome, locals.indirizzo as locale_indirizzo, 
            locals.num_tavoli as locale_num_tavoli, locals.id_ristoratore as locale_id_ristoratore, locals.disp_massima as locale_disp_massima, 
            locals.pianta as locale_pianta, locals.tipo as locale_tipo, locals.sponsorizzato as locale_sponsorizzato, 
            locals.link_immagine as locale_link_immagine, locals.info as locale_info
            from locals where tipo="pub") seconda_query

            on prima_query.primo_id = seconda_query.locale_id
            group by locale_id'
        );

        return view('pub',['locale' => $results]); 
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

    public function getTavoliPrenotati($id) 
    {
        return DB::table('locals')->where('locals.id', $id)
                    ->join('reservations', 'reservations.id_locale', '=', 'locals.id')
                    ->join('tables', 'tables.id_prenotazione', '=', 'reservations.id')
                    ->count('tables.id');
    }

    public function getAffluenza($id) 
    {
        return DB::table('locals')->where('locals.id', $id)
                    ->join('reservations', 'reservations.id_locale', '=', 'locals.id')
                    ->join('tables', 'tables.id_prenotazione', '=', 'reservations.id')
                    ->sum('tables.capienza');
    }

    public function getAntipasti($id) 
    {
        return DB::table('locals')->where('locals.id', $id)
                    ->join('starters', 'locals.id', '=', 'starters.id_locale')
                    ->select('starters.nome_piatto', 'starters.costo')
                    ->get();
    }

    public function getPrimi($id) 
    {
        return DB::table('locals')->where('locals.id', $id)
                    ->join('firsts', 'locals.id', '=', 'firsts.id_locale')
                    ->select('firsts.nome_piatto', 'firsts.costo')
                    ->get();
    }

    public function getSecondi($id) 
    {
        return DB::table('locals')->where('locals.id', $id)
                    ->join('seconds', 'locals.id', '=', 'seconds.id_locale')
                    ->select('seconds.nome_piatto', 'seconds.costo')
                    ->get();
    }

    public function getDolci($id) 
    {
        return DB::table('locals')->where('locals.id', $id)
                    ->join('sweets', 'locals.id', '=', 'sweets.id_locale')
                    ->select('sweets.nome_piatto', 'sweets.costo')
                    ->get();
    }

    public function getBevande($id) 
    {
        return DB::table('locals')->where('locals.id', $id)
                    ->join('beverages', 'locals.id', '=', 'beverages.id_locale')
                    ->select('beverages.nome_bevanda', 'beverages.costo')
                    ->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info_locale = DB::table('locals')->select('id', 'nome','indirizzo','num_tavoli','id_ristoratore','disp_massima'
        ,'pianta','tipo','sponsorizzato','link_immagine','info')->where('id',$id)->get();
        $numero_tavoli_prenotati = $this->getTavoliPrenotati($id);
        $affluenza = $this->getAffluenza($id);
        $antipasti = $this->getAntipasti($id);
        $primi = $this->getPrimi($id);
        $secondi = $this->getSecondi($id);
        $dolci = $this->getDolci($id);
        $bevande = $this->getBevande($id);
        return view('locale', compact('info_locale', 'numero_tavoli_prenotati', 'affluenza', 'antipasti', 'primi', 'secondi', 'dolci', 'bevande'));
    }

    public function ricercaLocale(Request $request) 
    {
        $richiesta = $request->input('richiesta');

        $query = DB::select("select locale_id, locale_nome, locale_indirizzo, locale_num_tavoli, locale_id_ristoratore, locale_disp_massima, locale_pianta, locale_tipo, locale_sponsorizzato, locale_link_immagine, locale_info, tavoli_prenotati, stima_affluenza 
        from
        
            (select locals.id as primo_id, locals.nome, locals.indirizzo, locals.num_tavoli, locals.id_ristoratore, locals.disp_massima, 
            locals.pianta, locals.tipo, locals.sponsorizzato, locals.link_immagine, locals.info,
            count(tables.id) as tavoli_prenotati, sum(tables.capienza) as stima_affluenza
            from locals, reservations, tables
            where (locals.nome like '%$richiesta%' and reservations.id_locale = locals.id and tables.id_prenotazione = reservations.id)
            or    (locals.indirizzo like '%$richiesta%' and reservations.id_locale = locals.id and tables.id_prenotazione = reservations.id)
            group by locals.id)prima_query
        
            right join
        
            (select locals.id as locale_id, locals.nome as locale_nome, locals.indirizzo as locale_indirizzo, 
            locals.num_tavoli as locale_num_tavoli, locals.id_ristoratore as locale_id_ristoratore, locals.disp_massima as locale_disp_massima, 
            locals.pianta as locale_pianta, locals.tipo as locale_tipo, locals.sponsorizzato as locale_sponsorizzato, 
            locals.link_immagine as locale_link_immagine, locals.info as locale_info
            from locals 
            where (locals.nome like '%$richiesta%')
            or (locals.indirizzo like '%$richiesta%')) seconda_query
        
            on prima_query.primo_id = seconda_query.locale_id
            group by locale_id;"
    );
        
        //dd($query);
        $rowCount = count($query);
        if($rowCount == 1) { // se la query ritorna una sola riga apro direttamente la pagina di quel locale
            return $this->show($query[0]->locale_id);
        }
        return view('ricerca_locali', compact('query'));
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
