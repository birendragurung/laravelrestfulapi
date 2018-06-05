<?php

use App\Category;
use App\Product;
use App\Transaction;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		User::truncate();
		Category::truncate();
		Product::truncate();
		Transaction::truncate();
		DB::table('category_product')->truncate();

		$usersQuantity       = 300;
		$categoriesQuantity  = 30;
		$productsQuantity    = 1000;
		$transactionQuantity = 1000;
		factory(App\User::class , $usersQuantity)->create();
		factory(App\Category::class , $categoriesQuantity)->create();
		factory(App\Product::class , $productsQuantity)
			->create()
			->each(function($product){
				echo ".";
				$categories = Category::all()
					->random(mt_rand(1 , 5))
					->pluck('id');
				$product->categories()->attach($categories);
			});
		factory(App\Transaction::class , $transactionQuantity)->create();

		Model::reguard();

	}
}
