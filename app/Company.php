<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

	protected $fillable = [
		'user_id', 
		'company_name', 
		'ruc', 
		'tax_address',
		'name',
		'lastname',
		'relationship',
		'email',
		'office_phone',
		'phone',
		'web', 
		'department_id',
		'province_id', 
		'district_id', 
		'country', 
		'observations',
		'client',
		'provider'
	];

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

	// scopes

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
