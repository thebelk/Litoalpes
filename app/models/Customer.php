<?php

class Customer extends Eloquent {

    protected $table = 'customers';
    protected $fillable = array(
        'id',
        'nit_cc',
        'cliente',
        'repsponsable',
        'tipo_cliente',
        'direccion',
        'barrio',
        'ciudad',
        'pais',
        'telefono',
        'contacto',
        'otro',
        'email',
        'users_id'
    );

    public function workorders() {
        return $this->hasMany('Workorder');
    }

    public function users() {
        return $this->belongsTo('User');
    }

}
