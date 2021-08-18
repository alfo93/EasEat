<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FirstsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('firsts')->insert([[
            'id_locale' 		    => '5',
            'nome_piatto' 	    => 'Zazie Bowl',
            'costo'	            => '7',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '5',
            'nome_piatto' 	    => "Riso Venere all'arancia",
            'costo'	            => '6',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '5',
            'nome_piatto' 	    => 'Canederli alla Rapa rossa',
            'costo'	            => '7.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '6',
            'nome_piatto' 	    => 'Cappellacci di Zucca al Ragù',
            'costo'	            => '4',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '6',
            'nome_piatto' 	    => 'Risotto al Radicchio',
            'costo'	            => '4.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '14',
            'nome_piatto' 	    => 'Piatto del Giorno',
            'costo'	            => '8',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '14',
            'nome_piatto' 	    => 'Mjaddara',
            'costo'	            => '7',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '16',
            'nome_piatto' 	    => 'Riso saltato al Curry',
            'costo'	            => '4.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '16',
            'nome_piatto' 	    => 'Spaghetti di riso con misto pesce',
            'costo'	            => '5.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '16',
            'nome_piatto' 	    => 'Spaghetti di soia alla piastra con misto pesce e verdure',
            'costo'	            => '5.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ]]);
    }
}
