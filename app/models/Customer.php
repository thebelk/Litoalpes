<?php

class Customer extends Eloquent {

    protected $table = 'customers';
    protected $fillable = array(
        'id',
        'nit_cc',
        'cliente',
        'representante',
        'dependencia',
        'direccion',
        'ciudad',
        'pais',
        'telefono',
        'celular',
        'email'
    );

    public function workorders() {
        return $this->hasMany('Workorder');
    }

    public function users() {
        return $this->belongsTo('User');
    }

}
