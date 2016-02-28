<?php

class Customer extends Eloquent {

    protected $table = 'customers';
    protected $fillable = array(
        'id',
        'cliente',
        'cel_contacto',
        'tipo_cliente', //1.Directo   2.Servicio
        'nit_cc',                        
        'empresa',
        'telefono',
        'direccion',
        'ciudad',
        'pais',                        
        'email',
        'pagina_web',
        'otro',                        
        'users_id'
    );

    public function workorders() {
        return $this->hasMany('Workorder');
    }

    public function users() {
        return $this->belongsTo('User');
    }

}
