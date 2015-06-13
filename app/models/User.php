<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
    //use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $fillable = array(
        'id',
        'nit/cc',
        'razon_social',
        'direccion',
        'ciudad',
        'pais',
        'telefono',
        'celular',
        'email',
        'confirmemail',
        'password',
        'confirpassword'
    );

    public function customers() {
        return $this->hasMany('Customer ');
    }

    public function workorders() {
        return $this->hasMany('Workorder');
    }

    public function machines() {
        return $this->hasMany('Machine');
    }

    public function getAuthIdentifier() {
        
    }

    public function getAuthPassword() {
        
    }

    public function getRememberToken() {
        
    }

    public function getRememberTokenName() {
        
    }

    public function getReminderEmail() {
        
    }

    public function setRememberToken($value) {
        
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

}
