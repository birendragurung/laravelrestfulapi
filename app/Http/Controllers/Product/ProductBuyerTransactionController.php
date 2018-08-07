<?php

namespace App\Http\Controllers\Product;

use App\Product;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductBuyerTransactionController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Product $product
	 * @param \App\User $buyer
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request , Product $product , User $buyer)
	{
		if ($buyer->id === $product->id){
			return $this->errorResponse("The buyer must be different from seller" , 409);
		}

		if (!$buyer->isVerified()){
			return $this->errorResponse('The buyer is not verified' , 409);
		}

		if (!$product->seller->isVerified()){
			return $this->errorResponse('The seller must be verified',409);
		}

		if (!$product->isAvailable()){
			return $this->errorResponse('The product is not currently available' , 409);
		}

		if ($product->quantity < $request->quantity){
			return $this->errorResponse('The product does not have enough units for this transactions' , 409);
		}

		return DB::transaction(function() use ($request , $product , $buyer){
			$product->quantity -= $request->quantity;
			$product->save();

			$transaction = Transaction::create([
				'quantity' => $request->quantity ,
				'buyer_id' => $buyer->id ,
				'product_id' => $product->id
			]);

			return $this->showOne($transaction , 201);
		});
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Product $product
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show(Product $product)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Product $product
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Product $product)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Product $product
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request , Product $product)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Product $product
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Product $product)
	{
		//
	}
}
