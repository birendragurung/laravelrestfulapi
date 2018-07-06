<?php

namespace App\Http\Controllers\Seller;

use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerTransactionController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Seller $seller)
	{
		dd($seller->products());
		$transactions = $seller
			//->products
		//()
			//->whereHas('transactions')
			//->with('transactions.buyer')
			//->get()
			//->pluck('transactions')
			//->collapse()
			//->pluck('buyer')
			//->unique('id')
			//->values()
		;

		return $this->showAll($transactions);
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
