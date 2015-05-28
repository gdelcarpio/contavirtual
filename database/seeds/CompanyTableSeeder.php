<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CompanyTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create('es_ES');

		foreach(range(1, 100) as $index)
		{
			\DB::table('companies')->insert(array(
				'user_id'       => $faker->numberBetween(1,50),
				'company_name'  => $faker->company,
				'ruc'           => $faker->numberBetween(1111111111,9999999999),
				'tax_address'   => $faker->address,
				'name'          => $faker->name,
				'lastname'      => $faker->lastname,
				'relationship'  => $faker->word,
				'email'         => $faker->email,
                'office_phone'  => $faker->phoneNumber,
                'phone'         => $faker->phoneNumber,
				'web'           => $faker->domainName,
				'country'       => $faker->country,
				'observations'  => $faker->text($maxNbChars = 200),
                'client'        => $faker->numberBetween(0,1),
				'provider'      => $faker->numberBetween(0,1),
			));
		}

	}

}
