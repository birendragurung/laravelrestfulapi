<?php

namespace App\Http\Controllers\Seller;

use App\Product;
use App\Seller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerProductController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @param \App\Seller $seller
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Seller $seller)
	{
		$products = $seller->products;

		return $this->showAll($products);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request , User $seller)
	{
		$rules = [
			'name'        => 'required' ,
			'description' => 'required' ,
			'quantity'    => 'required|integer|min:1' ,
			'image'       => 'required|image' ,
		];

		$this->validate($request , $rules);

		$data = $request->all();

		$data['status']    = Product::UNAVAILABLE_PRODUCT;
		$data['image']     = '1.jpeg';
		$data['seller_id'] = $seller->id;

		$product = Product::create($data);

		return $this->showOne($product);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Seller $seller
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show(Seller $seller)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Seller $seller
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Seller $seller)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Seller $seller
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request , Seller $seller)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Seller $seller
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Seller $seller)
	{
		//
	}
}
