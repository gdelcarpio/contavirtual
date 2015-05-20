<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

			$table->string('company_name');
			$table->string('ruc');
			$table->string('tax_address');
			$table->string('name');
			$table->string('lastname');
			$table->string('relationship');
			$table->string('email');
			$table->string('office_phone');
			$table->string('phone');
			$table->string('web');

			$table->integer('department_id')->nullable()->unsigned();
	        $table->foreign('department_id')->references('id')->on('departments');

	        $table->integer('province_id')->nullable()->unsigned();
	        $table->foreign('province_id')->references('id')->on('provinces');

	        $table->integer('district_id')->nullable()->unsigned();
	        $table->foreign('district_id')->references('id')->on('districts');

			$table->string('country');
			$table->text('observations');
			$table->boolean('client');
			$table->boolean('provider');
			
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('companies');
	}

}
