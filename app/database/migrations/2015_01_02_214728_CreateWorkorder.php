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
            $table->integer('tipo_orden')->default(0); //'1' => 'Seleccionar', '2' => 'Servicio','3' => 'Producto'
            $table->string('no_orden')->unique() ->default("");
            $table->string('clase_trabajo');
            $table->date('fecha_entrega');
            $table->integer('encuadernado')->default(0);
            $table->integer('tipo_encuadernado')->default(0);
            $table->integer('sublimaciones')->default(0);
            $table->integer('tipo_sublimacion')->default(0);
            $table->integer('sello')->default(0);
            $table->integer('tipo_sello')->default(0);
            $table->integer('gigantografia')->default(0);
            $table->integer('tipo_gigantografia')->default(0);
            $table->integer('impresiones')->default(0);
            $table->integer('tipo_impresiones')->default(0);

            // Nuevos Atributos --------
            $table->integer('servicio_numerado')->default(0);  //1.si 0.no
            $table->integer('servicio_perforado')->default(0); //1.si 0.no
            $table->integer('servicio_repuje')->default(0); //1.Si 0.No
            $table->integer('servicio_levante')->default(0);  //1.si 0.no
            $table->integer('servicio_engrapado')->default(0); //1.si 0.no
            $table->integer('servicio_grafado')->default(0);  //1.si 0.no 
            $table->integer('servicio_laminado')->default(0);  //1.si 0.no
            $table->string('servicio_otro')->default(0); //1.si 0.no
            $table->integer('servicio_engomado')->default(0); //1.si 0.no
            $table->integer('servicio_corte')->default(0); //1.Si 0.No    
            $table->integer('servicio_refile')->default(0); //1.Si 0.No 
            //----------------            
            $table->string('detalles_trabajo')->default("");
            $table->float('valor_trabajo');
            $table->float('abono');
            $table->float('saldo');
            $table->float('subtotal')->default(0);
            $table->integer('iva')->default(0);
            $table->integer('no_factura')->unique() ->default(0);
            $table->float('total')->default(0);
            $table->string('vendedor');
            $table->integer('estado_trabajo'); //1. diseño  2.impresion 3.acabados 4.disponible 6.entregado 7.por realizar                      
            $table->string('diseñador')->default("");
            $table->integer('tipo_realizado')->default(0); // '1' => 'Seleccionar ','2' => 'Diseño Nuevo','3' => 'Corrección','4' => 'Quema de Master','5' => 'Diseño según Muestra','6' => 'Identidad Corporativa'
            $table->integer('tipo_impresion')->default(0); //'1' => 'Seleccionar', '2' => 'Digital', '3' => 'Litográfica','4' => 'Gigantografia' ,'5' => 'Sello','6' => 'Plancha / Mater'                      
            $table->integer('plancha')->default(0);
            $table->integer('tipo_plancha')->default(0); //'1' => 'Seleccionar', '2' => 'Ctp 52', '3' => 'M.Doble Carta'
            $table->integer('master')->default(0);
            $table->integer('tipo_master')->default(0); //'1' => 'Seleccionar', '2' => 'Medio Master', '3' => 'Master Entero'
            $table->string('no_dian')->default("");
            $table->string('fecha_dian')->default("");
            $table->string('habilitado_dian')->default("");
            $table->string('observacion_diseño')->default("");
            $table->date('fecha_reporte_diseño');
            $table->string('revisado_diseño')->default("");
            $table->string('autorizado_diseño')->default("");
            $table->string('maquina')->default("");
            $table->string('clase_material');
            $table->string('cantidad_trabajo');
            $table->string('tamano');
            $table->string('cantidad_material')->default("");
            $table->string('corte_material')->default("");
            $table->string('emblocado')->default("");
            $table->string('no_inicial')->default("");
            $table->string('no_final')->default("");
            $table->integer('no_tintas')->default(0); // 1. una tinta 2.dos tintas 3. tres tintas 4.poligromia 
            $table->string('color_tinta')->default("");
            $table->string('tinta_especial')->default("");
            $table->string('color_material')->default("");
            $table->integer('no_copia')->default(0); // 0. Ninguno 1.una copia  2.dos copias 3.tres copias 4.cuatro copias                      
            $table->integer('copia1')->default(0); // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco                     
            $table->integer('copia2')->default(0); // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco                     
            $table->integer('copia3')->default(0); // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
            $table->integer('copia4')->default(0); // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
            $table->integer('numerado')->default(0); //1.Si 0.No
            $table->integer('numeradoras')->default(0); //'1' => 'Cat.Numeradoras ', '2 ' => '1 Numeradora', '3' => '2 Numeradoras', '4' => '3 Numeradoras','5' => '4 Numeradoras'
            $table->integer('original_todas')->default(0); //1.Si 0.No
            $table->integer('original_copia')->default(0);
            $table->integer('tiro_retiro')->default(0);
            $table->string('observacion_impresion')->default("");
            $table->date('fecha_reporte_impresion');
            $table->string('autorizado_impresion')->default("");
            $table->integer('levante')->default(0);  //1.si 0.no
            $table->integer('engrapado')->default(0); //1.si 0.no             
            $table->integer('laminado')->default(0);  //1.si 0.no
            $table->integer('plastificadouv')->default(0);  //1.si 0.no
            $table->integer('engomado')->default(0); //1.si 0.no
            $table->integer('corte')->default(0); //1.Si 0.No            
            $table->integer('refile')->default(0); //1.Si 0.No
            $table->integer('plastificadomate')->default(0); //1.Si 0.No
            $table->integer('perforado')->default(0); //1.si 0.no
            $table->integer('argollado')->default(0);
            $table->integer('grafado')->default(0);
            $table->integer('plastificadoreserva')->default(0);
            $table->integer('empastado')->default(0); //1.Si 0.No
            $table->integer('tapaclinto')->default(0); //1.Si 0.No
            $table->integer('tapanormal')->default(0); //1.Si 0.No
            $table->integer('hojassueltas')->default(0); //1.Si 0.No                        
            $table->integer('otro_acabados')->default(0); //0. Ninguno 1.Por la cabeza 2.lado izquierdo 3.lado derecho 
            $table->string('recomendaciones')->default("");
            $table->string('observacion_acabados')->default("");
            $table->date('fecha_reporte_acabados');
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
