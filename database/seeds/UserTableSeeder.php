<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create('es_ES');

		\DB::table('users')->insert(array(
                'name' => 'Gonzalo',
                'lastname' => 'Del Carpio',
                'phone' => $faker->phoneNumber,
                'office_phone' => $faker->phoneNumber,
                'email'   => 'gdelcarpio@gmail.com',
                'password' => \Hash::make('123456'),
                'dni' => $faker->randomNumber($nbDigits = 8),
                'address' => $faker->address,
                'country' => $faker->country,
                'ruc' => $faker->numberBetween(111111,888888),
                'company_name' => $faker->company,
                'sol_key' => $faker->randomNumber($nbDigits = 5),
                'bn_account' =>\Crypt::encrypt($faker->creditCardNumber),
                'level_id' => $faker->numberBetween(1,2),
            ));
 
        \DB::table('users')->insert(array(
                'name' => 'Rodrigo',
                'lastname' => 'Callanaupa',
                'phone' => $faker->phoneNumber,
                'office_phone' => $faker->phoneNumber,
                'email'   => 'rodrigo.callanaupa@gmail.com',
                'password' => \Hash::make('123456'),
                'dni' => $faker->randomNumber($nbDigits = 8),
                'address' => $faker->address,
                'country' => $faker->country,
                'ruc' => $faker->numberBetween(111111,888888),
                'company_name' => $faker->company,
                'sol_key' => $faker->randomNumber($nbDigits = 5),
                'bn_account' =>\Crypt::encrypt($faker->creditCardNumber),
                'level_id' => $faker->numberBetween(1,2),
            ));

		foreach(range(1, 50) as $index)
		{
			\DB::table('users')->insert(array(
				'name' => $faker->firstName,
				'lastname' => $faker->lastName,
				'phone' => $faker->phoneNumber,
				'office_phone' => $faker->phoneNumber,
				'email'   => $faker->email,
				'password' => \Hash::make('123456'),
				'dni' => $faker->randomNumber($nbDigits = 8),
				'address' => $faker->address,
				'country' => $faker->country,
				'ruc' => $faker->numberBetween(111111,888888),
				'company_name' => $faker->company,
				'sol_key' => $faker->randomNumber($nbDigits = 5),
				'bn_account' =>\Crypt::encrypt($faker->creditCardNumber),
				'level_id' => $faker->numberBetween(1,2),
			));
		}

	}

}
