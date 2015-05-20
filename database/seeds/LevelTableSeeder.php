<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LevelTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

			\DB::table('levels')->insert(array(
				'name' => 'Free',
				'expenses' => '10',
				'purchases' => '10',
				
			));

			\DB::table('levels')->insert(array(
				'name' => 'Pagado',
				'expenses' => '100',
				'purchases' => '100',
				
			));

	}

}
