<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Invoice extends Model {

	protected $guarded = ['id', 'created_at', 'updated_at'];

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

	public function setIssueDateAttribute($date)
	{
		$this->attributes['issue_date'] = Carbon::parse($date);
	}

	public function setExpirationDateAttribute($date)
	{
		$this->attributes['expiration_date'] = Carbon::parse($date);
	}

	public function getIssueDateAttribute()
	{
		if ( ! empty ( $this->attributes['issue_date'] ) ) {
			$issue_date = Carbon::createFromFormat('Y-m-d', $this->attributes['issue_date']);
			return $issue_date->format('d-m-Y');
		}

		return $this->attributes['payment_date'];
	}

}
