<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Str;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	use SoftDeletes;

  	protected $dates = ['deleted_at'];
  	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	// protected $fillable = ['name', 'email', 'password'];
	protected $guarded = ['id', 'created_at', 'updated_at'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function roles()
	{
		return $this->belongsToMany('App\Role');
	}

	public function level()
	{
		return $this->belongsTo('App\Level');
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

	public function payments()
	{
		return $this->hasMany('App\Payment');
	}

	public function companies()
	{
		return $this->hasMany('App\Company');
	}

	public function setNameAttribute($value)
	{
		if ( ! empty ($value))
		{
			$this->attributes['name'] = Str::title(trim($value));
		}
	}

	public function setLastnameAttribute($value)
	{
		if ( ! empty ($value))
		{
			$this->attributes['lastname'] = Str::title(trim($value));
		}
	}

	public function setPasswordAttribute($value)
	{
		if ( ! empty ($value))
		{
		  	$this->attributes['password'] = \Hash::make($value);
		}
	}

	public function setBnAccountAttribute($value)
	{
		if ( ! empty ($value))
		{
		  	$this->attributes['bn_account'] = \Crypt::encrypt($value);
		}
	}

	public function getBnAccountAttribute()
	{
		if ( ! empty ( $this->attributes['bn_account'] ) ) {
			return \Crypt::decrypt($this->attributes['bn_account']);
		}

		return 'No ingresado';
		
	}

	public function scopeByRole($query, $id)
	{
		$query->whereHas('roles', function($q) use ($id)
				{
				    $q->where('role_id', '=', $id);

				});
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
