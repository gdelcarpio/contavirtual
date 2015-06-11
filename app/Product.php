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

	public function scopeSortBy($query, array $params)
	{
		if ($this->isSortable($params))
        {
        	$query->orderBy($params['column'], $params['direction']);
        }
	}

	protected function isSortable(array $params)
    {
        return $params['column'] and $params['direction'];
    }

}
