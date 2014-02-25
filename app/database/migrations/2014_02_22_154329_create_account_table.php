<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		// Create Account Master Table
    Schema::create("account",function($table){
      $table->increments('id')->unsigned();    
      $table->string('account')->unique();
      $table->integer('priviledge_level');
      $table->string('status','3');
      $table->timestamps();
      $table->softDeletes();



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
		Schema::drop('account');
	}

}
