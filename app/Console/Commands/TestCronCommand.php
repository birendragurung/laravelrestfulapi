<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class TestCronCommand extends Command
{

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'testcron:show';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		tap(User::find(2) , function($user){
			$user->name = "birendra gurung";
			$user->verified = 1;
		})->save();
	}
}
