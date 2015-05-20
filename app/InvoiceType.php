<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceType extends Model {

	public function invoice()
	{
		return $this->has('App\Invoice');
	}

}
