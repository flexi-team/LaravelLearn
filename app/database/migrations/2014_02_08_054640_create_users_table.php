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
			$table->bigIncrements('id')->unsigned();
			$table->string('email')->unique();
			$table->string('username','25')->unique();
			$table->string('password','100'); // At Least 100, since it is used to store hash value
			$table->string('name');			
			$table->string('title','5');
			$table->string('gender','1');
			$table->string('status_code','3');
			$table->smallInteger('points');
			$table->timestamps();

		});


		Schema::create("UserSetting",function($table){
			$table->bigIncrements('id')->unsigned();
			$table->boolean('allowNoti');
			$table->boolean('allowMsg');
			$table->timestamps();
		});

		// Create User Table - Profile 

		Schema::create("profiles",function($table){
			$table->bigInteger('id');
			$table->bigInteger('user_auth_id')->unsigned();
			$table->string('contact_address','200');
			$table->index('user_auth_id');
			$table->string('status_code','3');
			$table->foreign('user_auth_id')->references('id')->on('users');
			$table->timestamps();

			
		});

		// Create User Table - Auth
		Schema::create("users_auth",function($table){
			$table->bigIncrements('id');
			$table->bigInteger('user_auth_id')->unsigned();
			$table->string('auth_type','40');
			$table->string('auth_name','40');
			$table->string('token','100');
			$table->string('secret','100');
			$table->bigInteger('token_expired_on');
			$table->index('user_auth_id');
			$table->string('status_code','3');
			$table->foreign('user_auth_id')->references('id')->on('users');
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

		Schema::drop('users_auth');
		Schema::drop('profiles');
		Schema::drop('users');

	}

}
