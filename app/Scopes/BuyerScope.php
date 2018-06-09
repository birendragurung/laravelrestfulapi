<?php
/**
 * Created by PhpStorm.
 * User: Birendra Gurung
 * Date: 6/9/2018
 * Time: 5:30 PM
 */

namespace App\Scopes;


use App\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class BuyerScope implements Scope
{

	public function apply(Builder $builder , Model $model)
	{
		return $builder->has('transactions');
	}
}