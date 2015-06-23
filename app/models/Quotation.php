<?php

class Quotation extends Eloquent {

    protected $table = 'quotation';
    protected $fillable = array(
        'id',
        'estado_cotizacion',
        'nombre_cliente',
        'clase trabajo',
        'especificaciones',
        'cotizacion',
        'direccion',
        'barrio',
        'telefono',
        'celular',
        'email'
    );

    public function users() {
        return $this->belongsTo('User');
    }

}
