<?php


class CustomerTableSeeder extends Seeder {  
   
    public function run() {
        DB::table('customers')->delete();

        User::create(array(
            'id' => 1,
            'users_id' => 1,
            'nit_cc' => '7358688-1',
            'cliente' => 'AVESALUD IPS',
            'repsponsable' => 'Edwin Montoya',
            'tipo_cliente' => '1',
            'direccion' => 'M44 L6 ETP4',
            'barrio' => 'Blasdelezo',
            'ciudad' => 'Cartagena',
            'pais' => 'Colombia',
            'telefono' => '6673454',
            'contacto' => '3196535643',
            'otro' => 'www,avesalud.com',
            'email' => 'avesalud@gmail.com'
        ));
    }

    public function down() {
        Schema::drop('customers');
    }

}


