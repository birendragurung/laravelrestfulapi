<?php
/**
 * Created by PhpStorm.
 * User: Birendra Gurung
 * Date: 6/9/2018
 * Time: 5:30 PM
 */

namespace App\Scopes;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class SellerScope implements Scope
{

	public function apply(Builder $builder , Model $model)
	{
		return $builder->has('products');
	}
}