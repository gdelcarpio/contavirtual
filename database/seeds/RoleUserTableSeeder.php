<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RoleUserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

			\DB::table('role_user')->insert(array(
				'role_id' => '1',
				'user_id' => '1'
			));

			\DB::table('role_user')->insert(array(
				'role_id' => '2',
				'user_id' => '2'
				
			));

	}

}
