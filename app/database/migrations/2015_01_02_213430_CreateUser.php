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
                        $table->string('celular');
                        $table->string('ciudad');
                        $table->string('representante');
                        $table->string('pais');
                        $table->string('telefono');                                       
                        $table->string('email')->unique();                    
                        $table->string('password');						
                        $table->string('password_confirmation');
						$table->string('remember_token')->nullable(); 
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
