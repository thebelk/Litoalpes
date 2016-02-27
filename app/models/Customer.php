<?php

class Customer extends Eloquent {

    protected $table = 'customers';
    protected $fillable = array(
        'id',
        'nit_cc',
        'cliente',
        'empresa',
        'tipo_cliente',
        'direccion',
        'pagina_web',
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
