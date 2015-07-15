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
                        $table->string('no_orden')->default("");
						
						$table->date('fecha_entrega');  
						$table->integer('estado_trabajo'); //1. diseño 2.produccion 3.disponible 4.entregado 5.por realizar                      
                        $table->string('atendido');                        
						$table->string('clase_trabajo');
						$table->string('tipo_material');
						$table->integer('cantidad');
						
						$table->string('tamano');
						
                        $table->float('valor_trabajo');                        
                        $table->integer('iva')->default(2); //1.si  2.no
                        $table->float('iva2')->default(0);
                        $table->float('total');
                        $table->float('abono');
                        $table->float('saldo');
                        $table->float('pago')->default(0);
                        
                        $table->string('deetalles')->default("");                        
                        
						
						
                        $table->integer('diseño')->default(1);//1.ninguno 2.correcion 3.arte 
						$table->string('diseñador')->default("");
                        $table->integer('tipo_elaborado')->default(1);//1.Ninguno 2.primera vez 3.igual al anterior 4. segun muestra
                        $table->integer('original_todas')->default(0); //1.Si 0.No
                        $table->integer('no_copia')->default(0); // 0. Ninguno 1.una copia  2.dos copias 3.tres copias 4.cuatro copias                      
						$table->integer('copia1')->default(0);// 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco                     
						$table->integer('copia2')->default(0);// 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco                     
                        $table->integer('copia3')->default(0);// 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
                        $table->integer('copia4')->default(0);// 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
                        $table->integer('no_tintas')->default(0);// 1. una tinta 2.dos tintas 3. tres tintas 4.poligromia 
                        $table->integer('tipo_color')->default(1); // 1. ninguno 2.basico 3.preparado
                        $table->string('color1')->default("");
                        $table->string('color2')->default("");
                        $table->string('color3')->default("");
						$table->integer('numerado')->default(0); //1.Si 0.No
						$table->string('no_inicial')->default("");
                        $table->string('no_final')->default("");                      						
                        $table->string('habilitado_dian')->default("");
                        $table->string('fecha_dian')->default("");
                        $table->string('emblocado')->default("");
                        $table->integer('quemado')->default(0);                        						
                        $table->integer('tiro_retiro')->default(0);
						//$table->integer('no_plancha')->default(0);
						$table->string('no_plancha')->default("");
						//$table->integer('no_master')->default(0);
						$table->string('no_master')->default("");
                        $table->integer('engomado')->default(0); //1.si 0.no
                        $table->integer('perforado')->default(0);//1.si 0.no 
						$table->integer('levante')->default(0);  //1.si 0.no
                        $table->integer('engrapado')->default(0); //1.si 0.no 						
                        $table->integer('acabados')->default(0); //0. Ninguno 1.Por la cabeza 2.lado izquierdo 3.lado derecho 
                        $table->string('cantidad_material')->default("");
                        $table->string('maquina')->default("");
                        $table->string('observaciones')->default("");                        
						
                        $table->string('nombre_registro_pedido')->default("");                                                                
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
