<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceCategory extends Model {

	public function invoice()
	{
		return $this->has('App\Invoice');
	}

}
