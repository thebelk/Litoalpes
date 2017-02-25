<?php

class Customer extends Eloquent {

    protected $table = 'customers';
    protected $fillable = array(
        'id',
        'correo_empre',
        'contraseña_empre',
        'conficontraseña', 
        'val_iva',                        
        'users_id'
    );

    

}
