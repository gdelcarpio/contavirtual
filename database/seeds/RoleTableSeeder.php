<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RoleTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('roles')->delete();

		\DB::table('roles')->insert(array(
			'name' => 'Usuario'
		));

		\DB::table('roles')->insert(array(
			'name' => 'Administrador'
			
		));

		\DB::table('roles')->insert(array(
			'name' => 'Contador'
		));

	}

}
