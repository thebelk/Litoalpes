<?php

class Quotation extends Eloquent {

    protected $table = 'quotations';
    protected $fillable = array(
        'id',
        'estado_cotizacion',
        'nombre_cliente',
        'clase_trabajo',
        'especificaciones',
        'cotizacion',
        'direccion',
        'barrio',
        'telefono',
        'celular',
        'email',
        'users_id'
    );

    public function users() {
        return $this->belongsTo('User');
    }

}
