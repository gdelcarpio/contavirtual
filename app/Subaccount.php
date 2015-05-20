<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subaccount extends Model {

	public function account()
	{
		return $this->belongsTo('App\Account');
	}

	public function invoice()
	{
		return $this->has('App\Invoice');
	}

}
