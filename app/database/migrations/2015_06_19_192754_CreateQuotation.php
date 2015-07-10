<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotation extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('quotations', function(Blueprint $table)
		{
			$table->increments('id');  
                        $table->integer('estado_cotizacion'); // 1.espera 2.elaborada 3.enviado 4.autorizado 
                        $table->string('nombre_cliente'); 
                        $table->string('clase_trabajo');
                        $table->string('especificaciones');
                        $table->string('cotizacion');
                        $table->string('direccion');
                        $table->string('barrio');                       
                        $table->string('telefono');                        
                        $table->string('celular');
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
            Schema::drop('quotations');
	}

}
