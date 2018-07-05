<?php

use App\Http\Controllers\Buyer\BuyerTransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user' , function(Request $request){
	return $request->user();
});*/
Route::resource('buyers' , 'Buyer\BuyerController' , [
	'only' => [
		'index' ,
		'show' ,
	] ,
]);
Route::resource('buyers.transactions' , "Buyer\BuyerTransactionController")
	->only([
		'index' ,
	]);
Route::resource('buyers.products' , "Buyer\BuyerProductController")
	->only('index');
Route::resource('buyers.sellers' , 'Buyer\BuyerSellerController')
	->only('index');
Route::resource('buyers.categories' , 'Buyer\BuyerCategoryController')
	->only('index');

Route::resource('sellers' , 'Seller\SellerController' , [
	'except' => [
		'create' ,
		'edit' ,
	] ,
]);
Route::resource('categories' , 'Category\CategoryController' , [
	'only' => [
		'index' ,
		'show' ,
		'store' ,
		'update' ,
		'destroy' ,
	] ,
]);
Route::resource('categories.products' , 'Category\CategoryProductController' , ['only' => 'index']);
Route::resource('products' , 'Product\ProductController' , [
	'only' => [
		'index' ,
		'show' ,
	] ,
]);
Route::resource('transactions' , 'Transaction\TransactionController' , [
	'only' => [
		'index' ,
		'show' ,
	] ,
]);
Route::resource('transactions.categories' , "Transaction\TransactionCategoryController")
	->only(["index" , "show"]);
Route::resource('transactions.sellers' , "Transaction\TransactionSellerController")
	->only(["index" , "show"]);

Route::resource('users' , 'User\UserController' , [
	'except' => [
		'create' ,
		'edit' ,
	] ,
]);
