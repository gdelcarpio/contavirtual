<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Payment extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'payments';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id', 'created_at', 'updated_at'];

	protected $dates = ['payment_date', 'payment_expiration_date', 'start_date', 'end_date'];

	public function user()
	{
		return $this->belongsTo('\App\User');
	}

	public function setPaymentDateAttribute($date)
	{
		$this->attributes['payment_date'] = Carbon::parse($date);
	}

	public function setPaymentExpirationDateAttribute($date)
	{
		$this->attributes['payment_expiration_date'] = Carbon::parse($date);
	}

	public function setStartDateAttribute($date)
	{
		$this->attributes['start_date'] = Carbon::parse($date);
	}

	public function setEndDateAttribute($date)
	{
		$this->attributes['end_date'] = Carbon::parse($date);
	}

	public function getPaymentDateAttribute()
	{
		if ( ! empty ( $this->attributes['payment_date'] ) ) {
			$payment_date = Carbon::createFromFormat('Y-m-d', $this->attributes['payment_date']);
			return $payment_date->format('d-m-Y');
		}

		return $this->attributes['payment_date'];
	}

	public function getPaymentExpirationDateAttribute()
	{
		if ( ! empty ( $this->attributes['payment_expiration_date'] ) ) {
			$payment_expiration_date = Carbon::createFromFormat('Y-m-d', $this->attributes['payment_expiration_date']);
			return $payment_expiration_date->format('d-m-Y');
		}

		return $this->attributes['payment_expiration_date'];
	}

	public function getEndDateAttribute()
	{
		if ( ! empty ( $this->attributes['end_date'] ) ) {
			$end_date = Carbon::createFromFormat('Y-m-d', $this->attributes['end_date']);
			return $end_date->format('d-m-Y');
		}

		return $this->attributes['end_date'];
	}

	public function getStartDateAttribute()
	{
		if ( ! empty ( $this->attributes['start_date'] ) ) {
			$start_date = Carbon::createFromFormat('Y-m-d', $this->attributes['start_date']);
			return $start_date->format('d-m-Y');
		}

		return $this->attributes['start_date'];
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
