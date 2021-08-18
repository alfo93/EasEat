<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StartersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('starters')->insert([[
            'id_locale' 		    => '5',
            'nome_piatto' 	    => 'Zuppa di zuppa, cappuccio e legumi',
            'costo'	            => '5',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '5',
            'nome_piatto' 	    => 'Crema di Patate e Broccoli',
            'costo'	            => '3.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '6',
            'nome_piatto' 	    => 'Ricciola',
            'costo'	            => '1',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '6',
            'nome_piatto' 	    => 'Cornetto',
            'costo'	            => '1',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '11',
            'nome_piatto' 	    => 'Patatine Fritte',
            'costo'	            => '3.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '11',
            'nome_piatto' 	    => 'Bruschette',
            'costo'	            => '3.20',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '13',
            'nome_piatto' 	    => 'Patatine Fritte',
            'costo'	            => '3.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '13',
            'nome_piatto' 	    => 'Bruschette',
            'costo'	            => '3.20',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '14',
            'nome_piatto' 	    => 'Verdure fresche con Tahini e Limone',
            'costo'	            => '5',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '14',
            'nome_piatto' 	    => 'Verdure Grigliate',
            'costo'	            => '5',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '14',
            'nome_piatto' 	    => 'Patate Fritte',
            'costo'	            => '4',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '14',
            'nome_piatto' 	    => 'Tostones',
            'costo'	            => '3',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '16',
            'nome_piatto' 	    => 'Involtino di Grano Saraceno con Verdure',
            'costo'	            => '4',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '16',
            'nome_piatto' 	    => 'Tris di Mare',
            'costo'	            => '5.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '16',
            'nome_piatto' 	    => 'Involtini Primavera',
            'costo'	            => '2',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '17',
            'nome_piatto' 	    => 'Croissant',
            'costo'	            => '1.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '17',
            'nome_piatto' 	    => 'Torta della Nonna',
            'costo'	            => '1.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '17',
            'nome_piatto' 	    => 'Salame al Cioccolato',
            'costo'	            => '2.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ]]);
    }
}
