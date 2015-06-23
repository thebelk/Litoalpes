<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkorder extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('workorders', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->float('no_orden');
                        $table->string('clase_trabajo');
                        $table->float('valor_trabajo');                        
                        $table->integer('iva'); //1.si  2.no
                        $table->float('%iva');
                        $table->float('total');
                        $table->float('abono');
                        $table->float('saldo');
                        $table->float('pago');
                        $table->integer('cantidad');
                        $table->date('fecha_entrega');  
                        $table->integer('estado_trabajo'); //1. diseño 2.produccion 3.disponible 4.entregado 5.por realizar                      
                        $table->integer('tipo_elaborado');//1.primera vez 2.igual al anterior 3. segun muestra
                        $table->integer('diseño');//1.correcion 2.arte 3.ninguno
                        $table->string('diseñador');
                        $table->string('habilitado_dian');
                        $table->string('fecha_dian');
                        $table->integer('cantidad_material');
                        $table->string('tipo_material');
                        $table->string('atendido');                        
                        $table->string('emblocado');
                        $table->integer('no_tintas');// 1. una tinta 2.dos tintas 3. tres tintas 4.poligromia 
                        $table->integer('tipo_color'); //1.basico 2.preparado
                        $table->string('color1');
                        $table->string('color2');
                        $table->string('color3');                     
                        $table->integer('no_copia'); // 1.una copia  2.dos copias 3.tres copias 4.cuatro copias                      
                        $table->integer('copia1');// 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco                     
                        $table->integer('copia3');// 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
                        $table->integer('copia4');// 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
                        $table->float('no_inicial');
                        $table->float('no_final');                      
                        $table->integer('original_todas'); //1.Si 2.No                                               
                        $table->integer('numerado'); //1.Si 2.No
                        $table->integer('tiro_retiro');
                        $table->integer('levante'); 
                        $table->integer('perforado'); 
                        $table->integer('quemado');                        
                        $table->integer('acabados'); //1.Por la cabeza 2.lado izquierdo 3.lado derecho 
                        $table->integer('no_master');
                        $table->integer('no_plancha');
                        $table->integer('engomado'); //1.si 2.no
                        $table->integer('engrapado'); //1.si 2.no                        
                        $table->string('observaciones');
                        $table->string('maquina');
                        $table->string('deetalles');                        
                        $table->string('nombre_registro_pedido');                                                                
                        $table->integer('customers_id')->unsigned();
                        $table->foreign('customers_id')->references('id')->on('customers');
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
		Schema::drop('workorders');
	}

}
