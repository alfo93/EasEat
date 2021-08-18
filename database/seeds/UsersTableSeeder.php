<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
	        'name' 			=> 'Francesco Penna',
			'email' 		=> 'francescoamministratore@dominio.it',
			'username'		=> 'fra',
	        'password' 		=> bcrypt('password'),
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s'),
			'ruolo'			=> 'Amministratore'			        
		], [
	        'name' 			=> 'Alfonso Esposito',
			'email' 		=> 'alfonso@dominio.it',
			'username'		=> 'alfo',
	        'password' 		=> bcrypt('password'),
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s'),	
			'ruolo'			=> 'Amministratore'		        
		], [
	        'name' 			=> 'Nicola Adami',
			'email' 		=> 'nicola@dominio.it',
			'username'		=> 'nico',
	        'password' 		=> bcrypt('password'),
	        'updated_at' 	=> date('Y-m-d h:i:s'),
			'created_at' 	=> date('Y-m-d h:i:s'),
			'ruolo'			=> 'Amministratore'		        
		]]);
    }
}
