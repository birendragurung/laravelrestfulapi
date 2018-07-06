<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property \Carbon\Carbon $deleted_at
 */
class Category extends Model
{

	use SoftDeletes;

	protected $hidden = [
		'pivot' ,
	];

	protected $dates = [
		'deleted_at' ,
	];

	protected $fillable = [
		'name' ,
		'description' ,
	];

	public function products()
	{
		return $this->belongsToMany(Product::class);
	}
}
