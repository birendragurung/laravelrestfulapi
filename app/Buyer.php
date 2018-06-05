<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $transactions
 */
class Buyer extends User
{

	public function transactions()
	{
		return $this->hasMany(Transaction::class);
    }
}
