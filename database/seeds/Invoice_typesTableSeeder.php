<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Invoice_typesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

			\DB::table('invoice_types')->insert(array(
				'name' => 'Factura'
			));

			\DB::table('invoice_types')->insert(array(
				'name' => 'Boleta'
				
			));

			\DB::table('invoice_types')->insert(array(
				'name' => 'Ticket Factura'
			));

			\DB::table('invoice_types')->insert(array(
				'name' => 'Ticket Boleta'
			));

			\DB::table('invoice_types')->insert(array(
				'name' => 'Recibo de Servicios'
			));

			\DB::table('invoice_types')->insert(array(
				'name' => 'Otros'
			));

	}

}
