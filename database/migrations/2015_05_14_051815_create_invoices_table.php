<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('invoice_type_id')->unsigned();
			$table->foreign('invoice_type_id')->references('id')->on('invoice_types');

			$table->integer('invoice_category_id')->unsigned();
			$table->foreign('invoice_category_id')->references('id')->on('invoice_categories');

			$table->integer('company_id')->unsigned();
			$table->foreign('company_id')->references('id')->on('companies');

			$table->string('serial');
			$table->integer('number');
			$table->date('issue_date');
			$table->date('expiration_date');
			$table->decimal('subtotal');
			$table->decimal('unaffected');
			$table->decimal('igv');
			$table->decimal('isc');
			$table->decimal('total');
			$table->string('image');
			$table->text('note');

			$table->integer('subaccount_id')->unsigned();
			$table->foreign('subaccount_id')->references('id')->on('subaccounts');
			
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
		Schema::drop('invoices');
	}

}
