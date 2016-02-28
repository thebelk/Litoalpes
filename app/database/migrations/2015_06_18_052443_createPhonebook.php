<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonebook extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phonebooks', function(Blueprint $table)
		{
			$table->increments('id');                    
                        $table->string('nombre');
                        $table->string('empresa');
                        $table->string('nit');
                        $table->integer('tipo_actividad');
                        $table->string('descripcion_actividad');
                        $table->string('email');
                        $table->string('celular');
                        $table->string('telefono');
                        $table->string('direccion');
                        $table->string('ciudad');
                        $table->string('pais');
                        $table->integer('tipo_contacto');
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
		Schema::drop('phonebooks');
	}

}
