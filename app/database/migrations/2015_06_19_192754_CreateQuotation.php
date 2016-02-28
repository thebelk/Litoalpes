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
                        $table->string('cliente');
                        $table->string('cel_contacto');
                        $table->integer('tipo_cliente'); //1.Directo   2.Servicio
                        $table->string('nit_cc');                        
                        $table->string('empresa');
                        $table->string('telefono');
                        $table->string('direccion');
                        $table->string('ciudad');
                        $table->string('pais');                        
                        $table->string('email');
                        $table->string('pagina_web');
                        $table->string('otro');
                        $table->string('clase_trabajo');                        
                        $table->integer('estado_cotizacion'); // 1.espera 2.elaborada 3.enviado 4.autorizado 
                        $table->string('especificaciones');
                        $table->string('cotizacion');                      
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
