<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecondsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seconds')->insert([[
            'id_locale' 		    => '5',
            'nome_piatto' 	    => 'Burger di lenticchie, funghi e melanzane',
            'costo'	            => '8.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '5',
            'nome_piatto' 	    => 'Insalata di Verdura',
            'costo'	            => '5',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '5',
            'nome_piatto' 	    => 'Tortino di Patate con cavolo nero',
            'costo'	            => '6',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '6',
            'nome_piatto' 	    => 'Insalata Mista',
            'costo'	            => '3',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '6',
            'nome_piatto' 	    => 'Fesa di Tacchino',
            'costo'	            => '3.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '6',
            'nome_piatto' 	    => 'Insalata Mista',
            'costo'	            => '3',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '7',
            'nome_piatto' 	    => 'Hamburger',
            'costo'	            => '5',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '7',
            'nome_piatto' 	    => 'Toast Prosciutto Cotto e Funghi',
            'costo'	            => '3.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '9',
            'nome_piatto' 	    => 'Scaloppine',
            'costo'	            => '6',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '9',
            'nome_piatto' 	    => 'Panini',
            'costo'	            => '5',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '9',
            'nome_piatto' 	    => 'Piadine',
            'costo'	            => '4.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '11',
            'nome_piatto' 	    => 'Hamburger',
            'costo'	            => '6.80',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '11',
            'nome_piatto' 	    => 'Piadine',
            'costo'	            => '5.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '12',
            'nome_piatto' 	    => 'Panini',
            'costo'	            => '3.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '12',
            'nome_piatto' 	    => 'Toast',
            'costo'	            => '3',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '13',
            'nome_piatto' 	    => 'Hamburger',
            'costo'	            => '6.80',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '13',
            'nome_piatto' 	    => 'Piadine',
            'costo'	            => '5.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '14',
            'nome_piatto' 	    => 'Falafel',
            'costo'	            => '6.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '14',
            'nome_piatto' 	    => 'Panino Ripieno',
            'costo'	            => '5.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '15',
            'nome_piatto' 	    => 'Pizza',
            'costo'	            => '5',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '15',
            'nome_piatto' 	    => 'Cecio',
            'costo'	            => '3.50',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '16',
            'nome_piatto' 	    => 'Pollo con mandorle',
            'costo'	            => '6',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '16',
            'nome_piatto' 	    => "Anatra Lixia all'arancia",
            'costo'	            => '7',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '16',
            'nome_piatto' 	    => 'Manzo con peperoncini piccanti',
            'costo'	            => '7',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '17',
            'nome_piatto' 	    => 'Burger King',
            'costo'	            => '5',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '17',
            'nome_piatto' 	    => 'Bacon King',
            'costo'	            => '7',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '17',
            'nome_piatto' 	    => 'Double Cheeseburger',
            'costo'	            => '6',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '17',
            'nome_piatto' 	    => 'Hamburger',
            'costo'	            => '1',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '18',
            'nome_piatto' 	    => 'Schiaccia con prosciutto crudo IGP e mozzarella',
            'costo'	            => '5',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '18',
            'nome_piatto' 	    => 'Schiaccia con prosciutto cotto Alta qualità e mozzarella',
            'costo'	            => '5',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '18',
            'nome_piatto' 	    => 'Schiaccia con speck val rendena, brie e zucchine grigliate',
            'costo'	            => '6',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '18',
            'nome_piatto' 	    => 'Schiaccia con pancetta pepata brie e funghi',
            'costo'	            => '7',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '18',
            'nome_piatto' 	    => 'Schiaccia con mortadella IGP pomodori secchi e scamorza',
            'costo'	            => '7',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '18',
            'nome_piatto' 	    => 'Schiacciata con Zia Ferrarese, Grana Padano Riserva, Valeriana e Glassa di Aceto di Modena IGP',
            'costo'	            => '8',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '19',
            'nome_piatto' 	    => 'Bowl Piccola',
            'costo'	            => '10',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '19',
            'nome_piatto' 	    => 'Bowl Media',
            'costo'	            => '12',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_locale' 		    => '19',
            'nome_piatto' 	    => 'Bowl Grande',
            'costo'	            => '15',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ]]);
    }
}

