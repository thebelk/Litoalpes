<?php

class Quotation extends Eloquent {

    protected $table = 'quotations';
    protected $fillable = array(
        'id',
        'cliente' ,
        'cel_contacto' ,
        'tipo_cliente' , //1.Directo   2.Servicio
        'nit_cc' ,                        
        'empresa' ,
        'telefono' ,
        'direccion' ,
        'ciudad' ,
        'pais' ,                        
        'email' ,
        'pagina_web' ,
        'otro' ,
        'clase_trabajo' ,                        
        'estado_cotizacion' , // 1.espera 2.elaborada 3.enviado 4.autorizado 
        'especificaciones' ,
        'cotizacion' ,                      
        'users_id'
    );

    public function users() {
        return $this->belongsTo('User');
    }

}
