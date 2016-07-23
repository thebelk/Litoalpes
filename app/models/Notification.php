<?php

class Notification extends Eloquent
{
    protected $table = 'notifications';
	protected $fillable = array(
		'id',
		'type',
		'user_id',
		'workorder_id',
		'subject',
		'body',
		'is_read',
		'sent_at');
 
    public function getDates()
    {
        return ['created_at', 'updated_at', 'sent_at'];
    }
 
    public function user()
    {
        return $this->belongsTo('User');
    }
	
	public function workorder()
    {
        return $this->belongsTo('Workorder');
    }
	
}