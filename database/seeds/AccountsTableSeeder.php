<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AccountsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

			\DB::table('accounts')->insert(array(
				'name' => 'Mercadería'
			));

			\DB::table('accounts')->insert(array(
				'name' => 'materias primas'				
			));	

			\DB::table('accounts')->insert(array(
				'name' => 'Suministros'				
			));	

	}

}
