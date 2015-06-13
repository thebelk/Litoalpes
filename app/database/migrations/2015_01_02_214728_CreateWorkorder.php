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
                        $table->integer('cantidad');
                        $table->date('fecha_entrega');
                        $table->float('valor_trabajo');
                        $table->float('iva');
                        $table->float('total');
                        $table->float('abono');
                        $table->float('saldo');
                        $table->integer('tipo_trabajo'); //1.libreta 2.blocks 3.hojas 4.sobres 5.tarjetas 6.otros
                        $table->integer('tipo_elaboracion');//1.primera vez 2.igual al anterior 3. segun muestra
                        $table->integer('cantidad_material');
                        $table->integer('no_impresion');
                        $table->string('emblocado');
                        $table->integer('no_tintas');// 1. una tinta 2.dos tintas 3. tres tintas 4.poligromia 
                        $table->string('color_tinta');
                        $table->integer('color_basico'); //1.negro 2.magenta 3.amarillo
                        $table->integer('color_preparado1'); //1.azul pocess  2.verde  3.azul bronce
                        $table->integer('color_preparado2'); //1.rojo  2.naranja  3.sepia
                        $table->integer('no_copia');
                        $table->integer('color_copia'); // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
                        $table->integer('copia1');//orden de copias
                        $table->integer('copia2');
                        $table->integer('copia3');
                        $table->integer('copia4');
                        $table->float('numeracion_inicial');
                        $table->float('numeracion_final');
                        $table->string('corte');
                        $table->string('tamano');
                        $table->integer('original'); //1.Si 2.No                                                
                        $table->string('tipo_material');
                        $table->integer('numerado'); //1.Si 2.No
                        $table->integer('tiro_retiro');
                        $table->integer('levante'); 
                        $table->integer('perforado'); 
                        $table->integer('quemado');
                        $table->integer('master_empresa');//1.Si 2.No
                        $table->integer('acabados'); //1.Por la cabeza 2.lado izquierdo 3.lado derecho 
                        $table->integer('no_master');
                        $table->string('observaciones');
                        $table->integer('daños');//1.Si 2.No
                        $table->string('justificacion_daño');
                        $table->string('nombre_recibe_pedido');
                        $table->integer('agrupados1');//1.pauetes  2.fajos 3.block
                        $table->integer('cant_agrup1');
                        $table->integer('agrupados2');//1.hojas cada uno  2.juegos cada uno
                        $table->integer('cant_agrup2');
                        $table->integer('machines_id')->unsigned();
                        $table->foreign('machines_id')->references('id')->on('machines');                     
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
