<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property \Carbon\Carbon $deleted_at
 * @property \App\Product product
 * @property \App\Buyer $buyer
 */
class Transaction extends Model
{

	use SoftDeletes;

	protected $hidden = [
		'pivot' ,
	];

	protected $dates = [
		'deleted_at' ,
	];

	protected $fillable = [
		'quantity' ,
		'buyer_id' ,
		'product_id' ,
	];

	public function buyer()
	{
		return $this->belongsTo(Buyer::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

}
