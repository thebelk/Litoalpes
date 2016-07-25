<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotification extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// CREAR ESQUEMA!!!!
		Schema::create('notifications', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('type');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
			$table->integer('workorder_id')->unsigned();
            $table->foreign('workorder_id')->references('id')->on('workorders');            
            $table->string('subject');
            $table->string('body');
            $table->boolean('is_read');            
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
		Schema::drop('notifications');
	}

}
