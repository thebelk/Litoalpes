
<?php

class Workorder extends Eloquent {

    protected $table = 'workorders';
    protected $fillable = array(
        'id',
        'tipo_orden', //'1' => 'Seleccionar', '2' => 'Digital', '3' => 'Litográfica','4' => 'Gigantografia' ,'5' => 'Sello','6' => 'Mater','7' => 'Plancha'
        'no_orden',
        'clase_trabajo',
        'fecha_entrega',
        'detalles_trabajo',
        'valor_trabajo',
        'abono',
        'saldo',
        'pago',
        'iva',
        'no_factura',
        'vendedor',
        'estado_trabajo', //1. diseño  2.impresion 3.acabados 4.disponible 6.entregado 7.por realizar                      
        'diseñador',
        'tipo_realizado', //'1' => 'Seleccionar ','2' => 'Identidad Corporativa', '3' => 'Arte','4' => 'Correcion'
        'tipo_elaborado', //'1' => 'Seleccionar', '2' => 'primera vez', '3' => 'igual al anterior','4' => 'segun muestra'
        'tipo_impresion', //'1' => 'Seleccionar', '2' => 'Digital', '3' => 'Litográfica','4' => 'Gigantografia' ,'5' => 'Sello','6' => 'Mater','7' => 'Plancha'
        'no_dian',
        'fecha_dian',
        'habilitado_dian',
        'observacion_diseño',
        'fecha_reporte_diseño',
        'autorizado_diseño',
        'maquina',
        'clase_material',
        'cantidad_material',
        'cantidad_trabajo',
        'tamano',
        'corte',
        'emblocado',
        'no_inicial',
        'no_final',
        'color_tinta',
        'no_tintas', // 1. una tinta 2.dos tintas 3. tres tintas 4.poligromia 
        'tinta_especial',
        'color_material',
        'no_copia', // 0. Ninguno 1.una copia  2.dos copias 3.tres copias 4.cuatro copias                      
        'copia1', // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco                     
        'copia2', // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco                     
        'copia3', // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
        'copia4', // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
        'original_todas', //1.Si 0.No
        'tiro_retiro',
        'observacion_impresion',
        'fechadereporte_reporte_impresion',
        'autorizado_impresion',
        'levante',  //1.si 0.no
        'perforado', //1.si 0.no
        'laminado',  //1.si 0.no
        'corte_refile', //1.Si 0.No
        'engomado', //1.si 0.no
        'estampado', //1.Si 0.No
        'argollado',
        'engrapado', //1.si 0.no 						
        'sublimacion',
        'plastificadomate', //1.Si 0.No
        'plastificadoreserva',
        'plastificadouv',  //1.si 0.no
        'otro_acabados', //0. Ninguno 1.Por la cabeza 2.lado izquierdo 3.lado derecho 
        'recomendaciones',
        'observacion_acabados',
        'fechadereporte_reporte_acabados',
        'autorizado_acabados',
        'customers_id'
    );

    public function customers() {
        return $this->belongsTo('Customer');
    }

    public function users() {
        return $this->belongsTo('User');
    }

}
