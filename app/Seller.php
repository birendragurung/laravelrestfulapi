<?php

namespace App;

use App\Scopes\SellerScope;
use Illuminate\Database\Eloquent\Model;

class Seller extends User
{
	protected $hidden = [
		'password' ,
		'remember_token' ,
		'verification_token' ,
		'cart_session_id' ,
		'pivot' ,
	];
	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new SellerScope());
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
