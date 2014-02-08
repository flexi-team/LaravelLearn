<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create User Table
		Schema::create("users",function($table){
			$table->bigIncrements('id');
			$table->string('email')->unique();
			$table->string('username','25')->unique();
			$table->string('password','25');
			$table->string('name');			
			$table->string('title','5');
			$table->string('gender','1');
			$table->smallInteger('points');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
