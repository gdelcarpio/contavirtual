<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {

	public function paymentStatuses()
	{
		return $this->has('App\PaymentStatus');
	}

}
