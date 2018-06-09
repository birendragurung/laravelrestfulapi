<?php
/**
 * Created by PhpStorm.
 * User: Birendra Gurung
 * Date: 6/9/2018
 * Time: 1:19 PM
 */

namespace App\Traits;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait ApiResponser
{

	private function successResponse($data, $code)
	{
		return response()->json($data , $code);
	}

	protected function errorResponse($message , $code)
	{
		return response()->json(['error' => $message ,'code' => $code ] , $code);
	}

	protected function showAll(Collection $collection,$code = 200)
	{
		return $this->successResponse(['data' => $collection] , $code);
	}

	protected function showOne(Model $model , $code = 200)
	{
		return $this->successResponse(['data' => $model] , $code);

	}
}