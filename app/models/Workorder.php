<?php

class Workorder extends Eloquent {

    protected $fillable = array(
        'id',
        'no_orden',
        'clase_trabajo',
        'valor_trabajo',
        'iva',
        '%iva',
        'total',
        'abono',
        'saldo',
        'pago',
        'cantidad',
        'fecha_entrega',
        'estado_trabajo',
        'tipo_elaborado',
        'diseño',
        'diseñador',
        'habilitado_dian',
        'fecha_dian',
        'cantidad_material',
        'tipo_material',
        'atendido',
        'emblocado',
        'no_tintas',
        'tipo_color',
        'color1',
        'color2',
        'color3',
        'no_copia',
        'copia1',
        'copia1',
        'copia3',
        'copia4',
        'no_inicial',
        'no_final',
        'original_todas',
        'numerado',
        'tiro_retiro',
        'levante',
        'perforado',
        'quemado',
        'acabados',
        'no_master',
        'no_plancha',
        'engomado',
        'engrapado',
        'observaciones',
        'maquina',
        'deetalles',        
        'nombre_registro_pedido'
    );

    public function users() {
        return $this->belongsTo('User');
    }

    public function customers() {
        return $this->belongsTo('Customer');
    }

}
