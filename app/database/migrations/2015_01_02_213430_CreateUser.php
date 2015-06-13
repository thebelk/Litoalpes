<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('nit_cc');
                        $table->string('razon_social');               
                        $table->string('direccion');
                        $table->string('ciudad');
                        $table->string('pais');
                        $table->string('telefono');
                        $table->string('celular');                
                        $table->string('email')->unique();
                        $table->string('confirmemail')->unique();
                        $table->string('password');
                        $table->string('confirpassword'); 
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
		Schema::drop('users');
	}

}
