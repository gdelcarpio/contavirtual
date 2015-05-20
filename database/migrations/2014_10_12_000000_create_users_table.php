<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('lastname');
			$table->string('phone');
			$table->string('office_phone');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('photo');
			$table->string('dni');
			$table->string('address');

			$table->integer('department_id')->nullable()->unsigned();
	        $table->foreign('department_id')->references('id')->on('departments');

	        $table->integer('province_id')->nullable()->unsigned();
	        $table->foreign('province_id')->references('id')->on('provinces');

	        $table->integer('district_id')->nullable()->unsigned();
	        $table->foreign('district_id')->references('id')->on('districts');

	        $table->integer('level_id')->unsigned();
	        $table->foreign('level_id')->references('id')->on('levels');

			$table->string('country');
			$table->boolean('active')->default(1);
			$table->boolean('debt')->default(0);
			$table->boolean('confirmed')->default(0);
			$table->string('confirmation_code')->nullable();
			$table->text('observations')->nullable();
			$table->string('ruc');
			$table->string('company_name');
			$table->string('sol_key');
			$table->string('bn_account');
			
			$table->softDeletes();
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
