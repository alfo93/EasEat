<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([[
                'id_user' 		=> '1',
                'orario' 		=> '13:30',
                'id_locale'		=> '1',
                'updated_at' 	=> date('Y-m-d h:i:s'),
                'created_at' 	=> date('Y-m-d h:i:s'),
            ], [
                'id_user' 		=> '1',
                'orario' 		=> '13:30',
                'id_locale'		=> '1',
                'updated_at' 	=> date('Y-m-d h:i:s'),
                'created_at' 	=> date('Y-m-d h:i:s'),
            ], [
                'id_user' 		=> '2',
                'orario' 		=> '13:30',
                'id_locale'		=> '3',
                'updated_at' 	=> date('Y-m-d h:i:s'),
                'created_at' 	=> date('Y-m-d h:i:s'),
            ], [
                'id_user' 		=> '2',
                'orario' 		=> '13:30',
                'id_locale'		=> '3',
                'updated_at' 	=> date('Y-m-d h:i:s'),
                'created_at' 	=> date('Y-m-d h:i:s'),
            ], [
                'id_user' 		=> '3',
                'orario' 		=> '13:30',
                'id_locale'		=> '4',
                'updated_at' 	=> date('Y-m-d h:i:s'),
                'created_at' 	=> date('Y-m-d h:i:s'),
            ], [
                'id_user' 		=> '3',
                'orario' 		=> '13:30',
                'id_locale'		=> '4',
                'updated_at' 	=> date('Y-m-d h:i:s'),
                'created_at' 	=> date('Y-m-d h:i:s'),
            ], [
                'id_user' 		=> '4',
                'orario' 		=> '13:30',
                'id_locale'		=> '2',
                'updated_at' 	=> date('Y-m-d h:i:s'),
                'created_at' 	=> date('Y-m-d h:i:s'),                    
            ], [
                'id_user' 		=> '4',
                'orario' 		=> '13:30',
                'id_locale'		=> '2',
                'updated_at' 	=> date('Y-m-d h:i:s'),
                'created_at' 	=> date('Y-m-d h:i:s'),                
        ]]);
    }
}
