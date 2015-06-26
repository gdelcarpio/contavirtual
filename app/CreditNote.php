<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditNote extends Model {

    protected $guarded = ['id', 'created_at', 'updated_at'];

	public function invoice()
	{
		return $this->belongsTo('App\Invoice');
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
        	$query->whereBetween( 'credit_notes.date', $range );
        }
	}

	protected function isDatable(array $params)
    {
        return $params['from'] and $params['to'];
    }

}
