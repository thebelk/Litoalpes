<?php

class Configuration extends Eloquent {

   /*-- protected $table = 'configuration';*/
    protected $fillable = array(
        'id',
        'correo_empre',
        'contraseña_empre',
        'confi_contraseña', 
        'val_iva',                        
        'users_id'
    );

    

}
