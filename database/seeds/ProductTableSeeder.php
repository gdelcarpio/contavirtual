<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create('es_ES');

		foreach(range(1, 200) as $index)
		{
			\DB::table('products')->insert(array(
				'user_id'       => $faker->numberBetween(1,50),
				'code'          => $faker->numberBetween(1111111,9999999),
				'name'          => $faker->word,
                'active'        => $faker->numberBetween(0,1),
				'description' 	=> $faker->text($maxNbChars = 200),
				'price'      	=> $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 200),
			));
		}

	}

}
