<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('LevelTableSeeder');
		$this->call('RoleTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('Invoice_typesTableSeeder');
		$this->call('Invoice_categoriesTableSeeder');
		$this->call('AccountsTableSeeder');
		$this->call('SubaccountsTableSeeder');
		$this->call('RoleUserTableSeeder');

		
	}

}
