<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

	public function users()
	{
		return $this->belongsTo('App\User');
	}

	public function department()
	{
		return $this->belongsTo('App\Department');
	}

	public function province()
	{
		return $this->belongsTo('App\Province');
	}

	public function district()
	{
		return $this->belongsTo('App\District');
	}

	public function products()
	{
		return $this->has('App\Product');
	}

	public function invoices()
	{
		return $this->hasMany('App\Invoice');
	}

}
