<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Invoice extends Model {

	protected $guarded = ['id', 'created_at', 'updated_at'];

	protected $dates = ['issue_date'];

	public function products()
	{
		return $this->belongsToMany('App\Product')->withPivot(array('price', 'quantity'));;
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

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function subaccount()
	{
		return $this->belongsTo('App\Subaccount');
	}

	public function credit_notes()
	{
		return $this->hasMany('App\CreditNote');
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

		return $this->attributes['issue_date'];
	}

	public function getExpirationDateAttribute()
	{
		if ( ! empty ( $this->attributes['expiration_date'] ) ) {
			$expiration_date = Carbon::createFromFormat('Y-m-d', $this->attributes['expiration_date']);
			return $expiration_date->format('d-m-Y');
		}

		return $this->attributes['expiration_date'];
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

	public function scopeDateBetween($query, array $params)
	{
		if ($this->isDatable($params))
        {
    		$from = Carbon::parse($params['from']);
    		$to   = Carbon::parse($params['to'])->endOfDay();

        	$range = [$from, $to];
        	$query->whereBetween( 'invoices.issue_date', $range );
        }
	}

	protected function isDatable(array $params)
    {
        return $params['from'] and $params['to'];
    }

    public function getFullInvoiceAttribute()
    {
        return $this->attributes['serial'] . '-' . $this->attributes['number'];
    }

}
