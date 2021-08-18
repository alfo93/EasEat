<?php

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PagamentoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//-------------------INDEX PAGINA WELCOME
Route::get('/', function () {
    return view('welcome');
});
//-------------------


//-------------------INDEX PAGINA PRE REGISTRAZIONE
Route::get('/pre-register', function () {
    return view('pre-register');
})->name('pre-register');
//-------------------


//-------------------INDEX PAGINA BOOKED
Route::get('/booked', function() {
    return view('booked');
})->name('booked');
//-------------------


Auth::routes();


//-------------------HOME
Route::get('/home', 'HomeController@index')->name('home');
//-------------------


//------------------FORM REGISTRAZIONE RISTORATORE
Route::get('/register_rist','RegistrazioneRistoratoreController@create')->name('register_rist');
//------------------


//------------------LOCALE
Route::get('/bar', 'LocaleController@Bar');

Route::get('/pub', 'LocaleController@Pub');

Route::get('/ristorante', 'LocaleController@Ristorante');

Route::get('/locale', 'LocaleController@show');

Route::resource('/locale', 'LocaleController');

Route::post('/ricerca_locali', 'LocaleController@ricercaLocale')->name('ricerca_locali');
//-------------------


//-----------------GESTIONE UTENTI
Route::resource('/User', 'UserController');

Route::get('User/{user}',  ['as' => 'User.edit', 'user' => 'UserController@edit']);
//-------------------


//-------------GESTIONE RISTORATORE
Route::get('/locali/{$id}','RistoratoreController@show');

Route::post('/locali','RistoratoreController@store');

Route::resource('/locali','RistoratoreController');

Route::get('/prenoristo/{id}','PrenotazioniRistoController@show');

Route::resource('/prenoristo','PrenotazioniRistoController');

Route::get('/prenotazioni/{$id}','ListaPrenController@show');

Route::resource('/prenotazioni','ListaPrenController');

Route::get('/menu/{$id}','MenuController@show');

Route::delete('/menu/{id}/{nome_menu}', 'MenuController@destroy');

Route::post('/menu/{id}/{nome_menu}', 'MenuController@store');

Route::resource('/menu','MenuController');
//-------------------


//-------------------GESTIONE AMMINISTRATORE
Route::resource('/amministratore', 'AmministratoreController');

Route::get('/gestione_utenti', 'AmministratoreController@indexUtenti')->name('gestione_utenti');

Route::get('/gestione_locali', 'AmministratoreController@indexLocali')->name('gestione_locali');

Route::delete('/gestione_locali/{id}', 'AmministratoreController@destroyLocale');
//-------------------


//-------------PAGAMENTO
Route::get('/pagamento/{id_user}/{id_locale}','PagamentoController@create')->name('pagamento');

Route::post('/pagamento/{id_user}/{id_locale}', 'PagamentoController@store');

Route::resource('/pagamento', 'PagamentoController');
//-------------------


//-------------PRENOTAZIONE
Route::resource('/prenotazione', 'PrenotazioneController');
//-------------


//-------------MENU
Route::get('/menu/{$id}','MenuController@show');

Route::delete('/menu/{id}/{nome_menu}', 'MenuController@destroy');

Route::post('/menu/{nome_menu}', 'MenuController@store');

Route::resource('/menu','MenuController');
//-------------
