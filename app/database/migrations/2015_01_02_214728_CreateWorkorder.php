<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkorder extends Migration {

    /**
     * Run the migrations.
     *
     * @return void 

     */
    public function up() {
        Schema::create('workorders', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_orden')->default(0); //'1' => 'Seleccionar', '2' => 'Digital', '3' => 'Litográfica','4' => 'Gigantografia' ,'5' => 'Sello','6' => 'Mater','7' => 'Plancha'
            $table->string('no_orden')->default("");
            $table->string('clase_trabajo');
            $table->date('fecha_entrega');
            $table->string('detalles_trabajo')->default("");
            $table->float('valor_trabajo');
            $table->float('abono');
            $table->float('saldo');
            $table->float('pago')->default(0);
            $table->integer('iva')->default(0);
            $table->integer('no_factura')->default("");
            $table->string('vendedor');
            $table->integer('estado_trabajo'); //1. diseño  2.impresion 3.acabados 4.disponible 6.entregado 7.por realizar                      
            $table->string('diseñador')->default("");
            $table->integer('tipo_realizado')->default(0); //'1' => 'Seleccionar ','2' => 'Identidad Corporativa', '3' => 'Arte','4' => 'Correcion'
            $table->integer('tipo_elaborado')->default(0); //'1' => 'Seleccionar', '2' => 'primera vez', '3' => 'igual al anterior','4' => 'segun muestra'
            $table->integer('tipo_impresion')->default(0); //'1' => 'Seleccionar', '2' => 'Digital', '3' => 'Litográfica','4' => 'Gigantografia' ,'5' => 'Sello','6' => 'Mater','7' => 'Plancha'
            $table->string('no_dian')->default("");
            $table->string('fecha_dian')->default("");
            $table->string('habilitado_dian')->default("");
            $table->string('observacion_diseño')->default("");
            $table->date('fecha_reporte_diseño')->default("");
            $table->string('autorizado_diseño')->default("");
            $table->string('maquina')->default("");
            $table->string('clase_material');
            $table->string('cantidad_material')->default("");
            $table->integer('cantidad_trabajo');
            $table->string('tamano');
            $table->string('corte');
            $table->string('emblocado')->default("");
            $table->string('no_inicial')->default("");
            $table->string('no_final')->default("");
            $table->string('color_tinta')->default("");
            $table->integer('no_tintas')->default(0); // 1. una tinta 2.dos tintas 3. tres tintas 4.poligromia 
            $table->string('tinta_especial')->default("");
            $table->string('color_material')->default("");
            $table->integer('no_copia')->default(0); // 0. Ninguno 1.una copia  2.dos copias 3.tres copias 4.cuatro copias                      
            $table->integer('copia1')->default(0); // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco                     
            $table->integer('copia2')->default(0); // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco                     
            $table->integer('copia3')->default(0); // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
            $table->integer('copia4')->default(0); // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
            $table->integer('original_todas')->default(0); //1.Si 0.No
            $table->integer('tiro_retiro')->default(0);
            $table->string('observacion_impresion')->default("");
            $table->date('fecha_reporte_impresion')->default("");
            $table->string('autorizado_impresion')->default("");
            $table->integer('levante')->default(0);  //1.si 0.no
            $table->integer('perforado')->default(0); //1.si 0.no
            $table->integer('laminado')->default(0);  //1.si 0.no
            $table->integer('corte_refile')->default(0); //1.Si 0.No
            $table->integer('engomado')->default(0); //1.si 0.no
            $table->integer('estampado')->default(0); //1.Si 0.No
            $table->integer('argollado')->default(0);
            $table->integer('engrapado')->default(0); //1.si 0.no 						
            $table->integer('sublimacion')->default(0);
            $table->integer('plastificadomate')->default(0); //1.Si 0.No
            $table->integer('plastificadoreserva')->default(0);
            $table->integer('plastificadouv')->default(0);  //1.si 0.no
            $table->integer('otro_acabados')->default(0); //0. Ninguno 1.Por la cabeza 2.lado izquierdo 3.lado derecho 
            $table->string('recomendaciones')->default("");
            $table->string('observacion_acabados')->default("");
            $table->date('fecha_reporte_acabados')->default("");
            $table->string('autorizado_acabados')->default("");
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
    public function down() {
        Schema::drop('workorders');
    }

}
