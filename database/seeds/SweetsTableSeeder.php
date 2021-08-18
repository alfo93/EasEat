<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sweets')->insert([[
            'id_locale' 		    => '5',
            'nome_piatto' 	    => 'Crostata',
            'costo'	            => '3',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '5',
            'nome_piatto' 	    => 'Brownies al Cioccolato',
            'costo'	            => '3.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '5',
            'nome_piatto' 	    => 'Biscotteria',
            'costo'	            => '2.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '8',
            'nome_piatto' 	    => 'Cornetto',
            'costo'	            => '1.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '8',
            'nome_piatto' 	    => 'Mignon',
            'costo'	            => '2',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '8',
            'nome_piatto' 	    => 'Tenerina',
            'costo'	            => '3.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '8',
            'nome_piatto' 	    => 'Semifreddo al Pistacchio',
            'costo'	            => '5',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '14',
            'nome_piatto' 	    => 'Nammura',
            'costo'	            => '3',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '14',
            'nome_piatto' 	    => 'Torta Caprese',
            'costo'	            => '3.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '14',
            'nome_piatto' 	    => 'Crostata ai Frutti di Bosco',
            'costo'	            => '3',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '16',
            'nome_piatto' 	    => 'Gelato fritto',
            'costo'	            => '3',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '16',
            'nome_piatto' 	    => 'Nutella fritta',
            'costo'	            => '3',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '18',
            'nome_piatto' 	    => 'Schiaccia con nutella',
            'costo'	            => '5',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '18',
            'nome_piatto' 	    => 'Schiaccia con confettura di marmellata',
            'costo'	            => '5',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ]]);
    }
}
