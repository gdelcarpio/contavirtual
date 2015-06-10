<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuantityToInvoiceProduct extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('invoice_product', function(Blueprint $table)
		{
			
			$table->integer('quantity')->after('product_id');
			$table->decimal('old_price')->after('quantity');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('invoice_product', function(Blueprint $table)
		{
			$table->dropColumn('quantity');
			$table->dropColumn('old_price');
		});
	}

}
