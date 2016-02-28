<?php

class Phonebook extends Eloquent {

    protected $table = 'phonebooks';
    protected $fillable = array(
        'id',
        'nombre',
        'empresa',
        'nit',
        'tipo_actividad',
        'descripcion_actividad',
        'email',
        'celular',
        'telefono',
        'direccion',
        'ciudad',
        'pais',
        'tipo_contacto',
        'users_id'
    );

    public function users() {
        return $this->belongsTo('User');
    }

}
