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
    Schema::create("user",function($table){
      $table->bigIncrements('id')->unsigned();      
      $table->string('name','50');
      $table->string('email')->unique();
      $table->string('avatar_url','120');
      $table->string('password','100'); // At Least 100, since it is used to store hash value
      $table->string('facebook_name','50');     
      $table->string('facebook_username','50');     
      $table->string('facebook_token','100');     
      $table->date('facebook_est_expired');  
      $table->string('location','50');   
      $table->float('latitude');   
      $table->float('longitude'); 
      $table->boolean('is_email_activated')  ;
      $table->boolean('is_social_connected');
      $table->boolean('is_facebook_linked');
      $table->string('profile_url','120');
      $table->string('gender','1');
      $table->string('status','3');
      $table->smallInteger('points');
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

    Schema::drop('user');

  }

}
