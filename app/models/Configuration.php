<?php

class Configuration extends Eloquent {

   /*-- protected $table = 'configuration';*/
    protected $fillable = array(
        'id',
        'correo_empre',
        'contrasena_empre',
        'confi_contrasena', 
        'val_iva',                        
        'users_id'
    );

    

}
