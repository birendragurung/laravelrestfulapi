<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property \Illuminate\Database\Eloquent\Collection $categories
 * @property \Illuminate\Database\Eloquent\Collection $transactions
 * @property \App\Seller $seller
 */
class Product extends Model
{

	use SoftDeletes;

	protected $hidden = [
		'pivot' ,
	];

	protected $dates = [
		'deleted_at' ,
	];

	const AVAILABLE_PRODUCT = 'available';

	const UNAVAILABLE_PRODUCT = 'unavailable';

	protected $fillable = [
		'name' ,
		'description' ,
		'quantity' ,
		'status' ,
		'image' ,
		'seller_id' ,
	];

	public function isAvailable()
	{
		return $this->status == Product::AVAILABLE_PRODUCT;
	}

	public function categories()
	{
		return $this->belongsToMany(Category::class);
	}

	public function seller()
	{
		return $this->belongsTo(Seller::class);
	}

	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}
}
