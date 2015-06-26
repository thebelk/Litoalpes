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
        'empresa'
    );

    public function users() {
        return $this->belongsTo('User');
    }

}
