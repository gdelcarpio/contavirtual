<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice_product', function(Blueprint $table)
		{
			$table->integer('invoice_id')->unsigned()->index();
			$table->foreign('invoice_id')->references('id')->on('invoices');
			$table->integer('product_id')->unsigned()->index();
			$table->foreign('product_id')->references('id')->on('products');
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
		Schema::drop('invoice_product');
	}

}
