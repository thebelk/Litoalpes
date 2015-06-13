<?php

class Machine extends Eloquent {

    protected $table = 'machines';
    protected $fillable = array(
        'id',
        'no_serie',
        'machine'
    );

    public function users() {
        return $this->belongsTo('User');
    }

}
