<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeveragesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beverages')->insert([[
            'id_locale' 		    => '5',
            'nome_bevanda' 	    => 'Acqua',
            'costo'	            => '1',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '5',
            'nome_bevanda' 	    => 'Frullato Piccolo',
            'costo'	            => '3.80',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '5',
            'nome_bevanda' 	    => 'Milkshake Piccolo',
            'costo'	            => '3.80',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '5',
            'nome_bevanda' 	    => 'Frullato Medio',
            'costo'	            => '4.90',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '5',
            'nome_bevanda' 	    => 'Milkshake Medio',
            'costo'	            => '4.90',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '5',
            'nome_bevanda' 	    => 'Milkshake Grande',
            'costo'	            => '5.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '5',
            'nome_bevanda' 	    => 'Frullato Grande',
            'costo'	            => '5.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '6',
            'nome_bevanda' 	    => 'Acqua',
            'costo'	            => '1',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '6',
            'nome_bevanda' 	    => 'Estathe',
            'costo'	            => '1.20',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '6',
            'nome_bevanda' 	    => 'CocaCola',
            'costo'	            => '2',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '6',
            'nome_bevanda' 	    => 'Cappuccino',
            'costo'	            => '1.20',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '6',
            'nome_bevanda' 	    => 'Espresso',
            'costo'	            => '1',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '6',
            'nome_bevanda' 	    => 'Corona',
            'costo'	            => '2',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '6',
            'nome_bevanda' 	    => 'Spritz',
            'costo'	            => '3.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '7',
            'nome_bevanda' 	    => 'Mojito',
            'costo'	            => '5',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '7',
            'nome_bevanda' 	    => 'Tequila Sunrise',
            'costo'	            => '5.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '7',
            'nome_bevanda' 	    => 'Negroni',
            'costo'	            => '4',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '7',
            'nome_bevanda' 	    => 'Gin Tonic',
            'costo'	            => '4.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '8',
            'nome_bevanda' 	    => 'Caffè',
            'costo'	            => '1',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '8',
            'nome_bevanda' 	    => 'Cappuccino',
            'costo'	            => '1.60',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '8',
            'nome_bevanda' 	    => 'Thè',
            'costo'	            => '3.20',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '8',
            'nome_bevanda' 	    => 'Tisana',
            'costo'	            => '4',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '9',
            'nome_bevanda' 	    => 'Becks',
            'costo'	            => '3.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '9',
            'nome_bevanda' 	    => 'Ichnusa',
            'costo'	            => '5.00',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '9',
            'nome_bevanda' 	    => 'Augustiner',
            'costo'	            => '6.00',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '9',
            'nome_bevanda' 	    => 'Corona',
            'costo'	            => '4.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '9',
            'nome_bevanda' 	    => 'Acqua',
            'costo'	            => '1',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '10',
            'nome_bevanda' 	    => "Timothy Tailor's",
            'costo'	            => '4',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '10',
            'nome_bevanda' 	    => 'Greeny King',
            'costo'	            => '7',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '10',
            'nome_bevanda' 	    => 'Light bulb',
            'costo'	            => '4',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '10',
            'nome_bevanda' 	    => 'Pride and Joy',
            'costo'	            => '5',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '10',
            'nome_bevanda' 	    => 'Roadie',
            'costo'	            => '6',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '11',
            'nome_bevanda' 	    => 'Birra Bionda Media Artigianale',
            'costo'	            => '4.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '11',
            'nome_bevanda' 	    => 'Birra Bionda Grande Artigianale',
            'costo'	            => '5.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '11',
            'nome_bevanda' 	    => 'Birra Scura Media Artigianale',
            'costo'	            => '4.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '11',
            'nome_bevanda' 	    => 'Birra Scura Grande Artigianale',
            'costo'	            => '5.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '11',
            'nome_bevanda' 	    => 'Acqua',
            'costo'	            => '1',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '12',
            'nome_bevanda' 	    => 'Birra in bottiglia 66cl',
            'costo'	            => '5',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '12',
            'nome_bevanda' 	    => 'White Russian',
            'costo'	            => '5.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '12',
            'nome_bevanda' 	    => 'Negroni',
            'costo'	            => '4.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '12',
            'nome_bevanda' 	    => 'Hugo',
            'costo'	            => '3.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '13',
            'nome_bevanda' 	    => 'Caipiroska',
            'costo'	            => '5.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '13',
            'nome_bevanda' 	    => 'Birra Bionda alla Spina',
            'costo'	            => '4.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '13',
            'nome_bevanda' 	    => 'Birra Scura alla Spina',
            'costo'	            => '4.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '14',
            'nome_bevanda' 	    => 'Acqua',
            'costo'	            => '1',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '14',
            'nome_bevanda' 	    => 'CocaCola',
            'costo'	            => '2',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '14',
            'nome_bevanda' 	    => 'Thè al Limone',
            'costo'	            => '2',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '15',
            'nome_bevanda' 	    => 'Acqua',
            'costo'	            => '1',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '15',
            'nome_bevanda' 	    => 'Birra',
            'costo'	            => '3',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '15',
            'nome_bevanda' 	    => 'Cocacola',
            'costo'	            => '2',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '16',
            'nome_bevanda' 	    => 'Thè verde',
            'costo'	            => '3',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '16',
            'nome_bevanda' 	    => 'Acqua',
            'costo'	            => '2',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '16',
            'nome_bevanda' 	    => 'Birra 66cl',
            'costo'	            => '3.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '17',
            'nome_bevanda' 	    => 'CocaCola',
            'costo'	            => '2',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '17',
            'nome_bevanda' 	    => 'Fanta',
            'costo'	            => '2',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '17',
            'nome_bevanda' 	    => 'Sprite',
            'costo'	            => '2',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '18',
            'nome_bevanda' 	    => 'Birre Artigianali',
            'costo'	            => '4',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '18',
            'nome_bevanda' 	    => 'Acqua',
            'costo'	            => '1',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '18',
            'nome_bevanda' 	    => 'CocaCola',
            'costo'	            => '2.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '19',
            'nome_bevanda' 	    => 'Birra',
            'costo'	            => '4',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '19',
            'nome_bevanda' 	    => 'Acqua',
            'costo'	            => '1',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '19',
            'nome_bevanda' 	    => 'CocaCola',
            'costo'	            => '2.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ]]);
    }
}
