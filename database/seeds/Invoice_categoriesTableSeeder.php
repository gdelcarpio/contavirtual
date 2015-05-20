<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Invoice_categoriesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

			\DB::table('invoice_categories')->insert(array(
				'name' => 'Venta'
			));

			\DB::table('invoice_categories')->insert(array(
				'name' => 'Compra'
				
			));		

	}

}
