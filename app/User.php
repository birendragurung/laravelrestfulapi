<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

/**
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 */
class User extends Authenticatable
{

	use Notifiable , SoftDeletes , HasApiTokens;

	protected $dates = [
		'deleted_at' ,
	];

	const VERIFIED_USER = "1";

	const UNVERIFIED_USER = "0";

	const ADMIN_USER = "true";

	const REGULAR_USER = "false";

	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name' ,
		'email' ,
		'password' ,
		'verified' ,
		'verification_token' ,
		'admin' ,
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password' ,
		'remember_token' ,
		'verification_token' ,
	];

	public function isVerified()
	{
		return $this->admin == User::VERIFIED_USER;
	}

	public function isAdmin()
	{
		return $this->admin == User::ADMIN_USER;
	}

	public static function generateVerificationCode()
	{
		return str_random(40);
	}

	/*****************************************
	 * Attribute mutators
	 *****************************************/
	public function setNameAttribute($name)
	{
		$this->attributes['name'] = strtolower($name);
	}

	public function getNameAttribute()
	{
		return ucwords($this->attributes['name']);
	}

	public function setEmailAttribute($email)
	{
		$this->attributes['email'] = $email;
	}

	public function getEmailAttribute($email)
	{
		$this->attributes['email'] = $email;
	}
}
