<?php

class NotificationTableSeeder extends Seeder {

    public function run() {
        
		//DB::table('notifications')->delete();

        Notification::create(array(
            'id' => 1,
            'type' => '73153114-3',
            'user_id' => 1,
            'workorder_id' => 1,
            'subject'=> 'Notificacion de Prueba',
            'body' => 'texto de prueba',
            'is_read' => false
        ));
    }

    public function down() {
        Schema::drop('notifications');
    }

}
