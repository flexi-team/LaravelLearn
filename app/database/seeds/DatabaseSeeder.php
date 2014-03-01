<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		// Add or Uncomment this line
		$this->call('AccountTableSeeder');
    $this->call('UserTableSeeder');
    
    $this->call('AccountUserTableSeeder');
	}

}