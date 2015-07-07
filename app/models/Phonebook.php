<?php

class Phonebook extends Eloquent {

    protected $table = 'phonebooks';
    protected $fillable = array(
        'id',
        'nombre',
        'ocupacion',
        'direccion',
        'ciudad',
        'pais',
        'telefono',
        'celular',
        'email',
        'empresa',
        'users_id'
    );

    public function users() {
        return $this->belongsTo('User');
    }

}
