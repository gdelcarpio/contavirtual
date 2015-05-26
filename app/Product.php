<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = 'products';

	protected $guarded = ['id', 'created_at', 'updated_at'];

	

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function invoices()
	{
		return $this->belongsToMany('App\Invoice');
	}

}
