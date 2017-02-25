<?php

class Income extends Eloquent {
/*
    protected $table = 'incomes'*/
    protected $fillable = array(
        'id',
        'saldo_hoy',
		'iva_hoy',
        'saldo_ayer',
		'iva_ayer',
        'saldo_semana', 
		'iva_semana',
        'saldo_mes', 
		'iva_mes',
        'saldo_acual',
		'iva_acual',
        'saldo_pendiente',
		'iva_pendiente',
        'ingreso_final',                        
        'customers_id'
    );


}
