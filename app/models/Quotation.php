<?php

class Quotation extends Eloquent {

    protected $table = 'quotation';
    protected $fillable = array(
        'id',
        'estado_cotizacion',
        'nombre',
        'apellido',
        'direccion',
        'barrio',
        'telefono',
        'celular',
        'email',
        'cotizacion'
    );

    public function users() {
        return $this->belongsTo('User');
    }

}
