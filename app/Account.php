<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model {

	public function subaccount()
	{
		return $this->has('App\Subaccount');
	}

}
