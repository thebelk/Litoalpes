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
                        $table->string('cliente');
                        $table->string('cel_contacto');
                        $table->integer('tipo_cliente'); //1.Directo   2.Servicio
                        $table->string('nit_cc')->unique();                         
                        $table->string('empresa');
                        $table->string('telefono');
                        $table->string('direccion');
                        $table->string('ciudad');
                        $table->string('pais');                        
                        $table->string('email');
                        $table->string('pagina_web');
                        $table->string('otro');                        
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
