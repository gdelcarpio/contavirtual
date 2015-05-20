<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SubaccountsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

			\DB::table('subaccounts')->insert(array(
				'name' => 'Mercadería manufacturada',
				'code' => '100',
				'account_id' => '1'
			));

			\DB::table('subaccounts')->insert(array(
				'name' => 'Materias primas iniciales'	,
				'code' => '100',
				'account_id' => '1'		
			));	

			\DB::table('subaccounts')->insert(array(
				'name' => 'Quimicos',
				'code' => '100',
				'account_id' => '3'		
			));	

			\DB::table('subaccounts')->insert(array(
				'name' => 'Computo'	,
				'code' => '100',
				'account_id' => '3'		
			));

			\DB::table('subaccounts')->insert(array(
				'name' => 'Pinturas'	,
				'code' => '100',
				'account_id' => '2'		
			));

			\DB::table('subaccounts')->insert(array(
				'name' => 'Acciones'	,
				'code' => '100',
				'account_id' => '2'		
			));

	}

}
