<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->insert([[
            'id_prenotazione' 	=> '1',
            'capienza' 		    => '2',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_prenotazione' 	=> '2',
            'capienza' 		    => '2',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_prenotazione' 	=> '3',
            'capienza' 		    => '1',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_prenotazione' 	=> '4',
            'capienza' 		    => '5',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_prenotazione' 	=> '5',
            'capienza' 		    => '6',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_prenotazione' 	=> '6',
            'capienza' 		    => '2',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
        ], [
            'id_prenotazione' 	=> '7',
            'capienza' 		    => '4',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),       
        ], [
            'id_prenotazione' 	=> '8',
            'capienza' 		    => '2',
            'updated_at' 	    => date('Y-m-d h:i:s'),
            'created_at' 	    => date('Y-m-d h:i:s'),
    ]]);
    }
}
