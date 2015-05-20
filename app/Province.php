<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model {

	public function districts()
	{
		return $this->has('App\District');
	}
	
	public function department()
	{
		return $this->belongsTo('App\Department');
	}

}
