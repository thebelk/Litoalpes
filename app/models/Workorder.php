
<?php

class Workorder extends Eloquent {

    protected $table = 'workorders';
    protected $fillable = array(
        'id',
        'tipo_orden', //'1' => 'Seleccionar', '2' => 'Servicio','3' => 'Producto'
		'no_orden',
		'clase_trabajo',
		'fecha_entrega',
		'encuadernado',
		'tipo_encuadernado',
		'sublimaciones',
		'tipo_sublimacion',
		'sello',
		'tipo_sello',
		'gigantografia',
		'tipo_gigantografia',			
		'impresiones',
		'tipo_impresiones', 
		'servicio_numerado',  //1.si 0.no
		'servicio_perforado', //1.si 0.no
		'servicio_levante',  //1.si 0.no
		'servicio_engrapado', //1.si 0.no
		'servicio_grafado',  //1.si 0.no 
		'servicio_laminado',  //1.si 0.no
		'servicio_otro', //1.si 0.no		
		'servicio_engomado', //1.si 0.no
		'servicio_corte', //1.Si 0.No    
		'servicio_refile', //1.Si 0.No 
		'servicio_repuje', //1.Si 0.No         
		'detalles_trabajo',
		'valor_trabajo',
		'abono',
		'saldo',
		'subtotal',			
		'iva',
		'no_factura',
		'total',
		'vendedor',
		'estado_trabajo', //1. diseño  2.impresion 3.acabados 4.disponible 6.entregado 7.por realizar                      
		'diseñador',
		'tipo_realizado', // '1' => 'Seleccionar ','2' => 'Diseño Nuevo','3' => 'Corrección','4' => 'Quema de Master','5' => 'Diseño según Muestra','6' => 'Identidad Corporativa'
		'tipo_impresion', //'1' => 'Seleccionar', '2' => 'Digital', '3' => 'Litográfica','4' => 'Gigantografia' ,'5' => 'Sello','6' => 'Plancha / Mater'                      
		'plancha',
		'tipo_plancha', //'1' => 'Seleccionar', '2' => 'Ctp 52', '3' => 'M.Doble Carta'
		'master',
		'tipo_master', //'1' => 'Seleccionar', '2' => 'Medio Master', '3' => 'Master Entero'
		'no_dian',
		'fecha_dian',
		'habilitado_dian',
		'observacion_diseño',
		'fecha_reporte_diseño',
		'revisado_diseño',
		'autorizado_diseño',
		'maquina',
		'clase_material',
		'cantidad_trabajo',
		'tamano',
		'cantidad_material',  
		'corte_material', 			
		'emblocado',
		'no_inicial',
		'no_final',
		'no_tintas', // 1. una tinta 2.dos tintas 3. tres tintas 4.poligromia 
		'color_tinta',            
		'tinta_especial',
		'color_material',
		'no_copia', // 0. Ninguno 1.una copia  2.dos copias 3.tres copias 4.cuatro copias                      
		'copia1', // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco                     
		'copia2', // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco                     
		'copia3', // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
		'copia4', // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
		'numerado', //1.Si 0.No
		'numeradoras', //'1' => 'Cat.Numeradoras ', '2 ' => '1 Numeradora', '3' => '2 Numeradoras', '4' => '3 Numeradoras','5' => '4 Numeradoras'
		'original_todas', //1.Si 0.No
		'original_copia',
		'tiro_retiro',
		'observacion_impresion',
		'fecha_reporte_impresion',
		'autorizado_impresion',
		'levante',  //1.si 0.no
		'engrapado', //1.si 0.no             
		'laminado',  //1.si 0.no
		'plastificadouv',  //1.si 0.no
		'engomado', //1.si 0.no
		'corte', //1.Si 0.No            
		'refile', //1.Si 0.No
		'plastificadomate', //1.Si 0.No
		'perforado', //1.si 0.no
		'argollado',            						
		'grafado', 
		'plastificadoreserva',
		'empastado', //1.Si 0.No
		'tapaclinto', //1.Si 0.No
		'tapanormal', //1.Si 0.No
		'hojassueltas', //1.Si 0.No                        
		'otro_acabados', //0. Ninguno 1.Por la cabeza 2.lado izquierdo 3.lado derecho 
		'recomendaciones',
		'observacion_acabados',
		'fecha_reporte_acabados',
		'autorizado_acabados',
        'customers_id',
        'users_id'
    );

    public function customers() {
        return $this->belongsTo('Customer');
    }

    public function users() {
        return $this->belongsTo('User');
    }

}
