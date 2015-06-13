<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomer extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('nit_cc');
                        $table->string('cliente');
                        $table->string('representante');
                        $table->integer('dependencia'); //1.directo  2.intermediario
                        $table->string('direccion');
                        $table->string('ciudad');
                        $table->string('pais');
                        $table->string('telefono');
                        $table->string('celular');
                        $table->string('email')->unique();
                        $table->integer('users_id')->unsigned();
                        $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::drop('costomers');
	}

}
