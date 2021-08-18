<?php

namespace App\Http\Controllers;
use App\Payment;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Reservation;
use App\Table;

class PagamentoController extends Controller
{



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id_user' => ['required'],
            'id_locale' => ['required'],
            'nome' => ['required', 'string', 'max:255'],
            'numero_di_carta' => ['required', 'string', 'min:13', 'max:16'],
            
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_user, $id_locale)
    {
        return view('pagamento', compact('id_user', 'id_locale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(),[
            'id_user' => 'required|integer',
            'id_locale' => 'required|integer',
            'nome' => 'required|string|max:255',
            'num_carta' => 'required|string|min:13|max:16',
            'orario' => 'required|string',
            'giorno' => 'required|string',
            'capienza' => 'required|integer',
        ]);
        $pagamento = new Payment;
        $prenotazione = new Reservation;
        $tavolo = new Table;


        $prenotazione = new Reservation;
        $tavolo = new Table;
        $prenotazione->id_user = request('id_user');
        $prenotazione->orario = request('orario');
        $prenotazione->id_locale = request('id_locale');
        $prenotazione->giorno = request('giorno');
        $prenotazione->save();
        $tavolo->id_prenotazione = $prenotazione->id;
        $tavolo->capienza = request('capienza');

        $tavolo->save();
        $pagamento->id_user = request('id_user');
        $pagamento->id_locale = request('id_locale');
        $pagamento->nome = request('nome');
        $pagamento->num_carta = request('num_carta');
        $pagamento->save();


        return redirect('booked');

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
