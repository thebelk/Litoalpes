<?php

class Workorder extends Eloquent {

    protected $fillable = array(
        'id',
        'no_orden',
        'clase_trabajo',
        'cantidad',
        'fecha_entrega',
        'valor_trabajo',
        'iva',
        'total',
        'abono',
        'saldo',
        'tipo_trabajo', //1.libreta 2.blocks 3.hojas 4.sobres 5.tarjetas 6.otros
        'tipo_elaboracion', //1.primera vez 2.igual al anterior 3. segun muestra
        'cantidad_material',
        'no_impresion',
        'emblocado',
        'no_tintas', // 1. una tinta 2.dos tintas 3. tres tintas 4.poligromia 
        'color_tinta',
        'color_basico', //1.negro 2.magenta 3.amarillo
        'color_preparado1', //1.azul pocess  2.verde  3.azul bronce
        'color_preparado2', //1.rojo  2.naranja  3.sepia
        'no_copia',
        'color_copia', // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
        'copia1', //orden de copias
        'copia2',
        'copia3',
        'copia4',
        'numeracion_inicial',
        'numeracion_final',
        'corte',
        'tamano',
        'original', //1.Si 2.No                                                
        'tipo_material',
        'numerado', //1.Si 2.No
        'tiro_retiro',
        'levante',
        'perforado',
        'quemado',
        'master_empresa', //1.Si 2.No
        'acabados', //1.Por la cabeza 2.lado izquierdo 3.lado derecho 
        'no_master',
        'observaciones',
        'daños', //1.Si 2.No
        'justificacion_daño',
        'nombre_recibe_pedido',
        'agrupados1',
        'cant_agrup1',
        'agrupados2',
        'cant_agrup2',
        'machines_id',
        'machines_id',
        'costomers_id',
        'costomers_id'
    );

    public function users() {
        return $this->belongsTo('User');
    }

    public function customers() {
        return $this->belongsTo('Customer');
    }

}
