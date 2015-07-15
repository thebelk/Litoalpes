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
                        $table->string('repsponsable');
                        $table->integer('tipo_cliente'); //1.directo  2.intermediario
                        $table->string('direccion');
                        $table->string('barrio');
                        $table->string('ciudad');
                        $table->string('pais');
                        $table->string('telefono');
                        $table->string('contacto');
                        $table->string('otro');
                        $table->string('email');
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
		Schema::drop('customers');
	}

}
