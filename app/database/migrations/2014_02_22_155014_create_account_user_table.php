<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//

		// Create Account of User Table
    Schema::create("account-user",function($table){
      $table->integer('account_id')->unsigned();    
      $table->bigInteger('user_id')->unsigned();
      $table->string('status','3');
      $table->timestamps();
      $table->softDeletes();

      // Constraint
      $table->foreign('user_id')->references('id')->on('user');
      $table->foreign('account_id')->references('id')->on('account');
      $table->primary(array('account_id', 'user_id'));

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

		Schema::drop('account-user');
	}

}
