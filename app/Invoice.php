<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {

	public function products()
	{
		return $this->belongsToMany('App\Product');
	}

	public function invoiceCategory()
	{
		return $this->belongsTo('App\InvoiceCategory');
	}

	public function invoiceType()
	{
		return $this->belongsTo('App\InvoiceType');
	}

	public function company()
	{
		return $this->belongsTo('App\Company');
	}

	public function subaccount()
	{
		return $this->belongsTo('App\Subaccount');
	}

}
