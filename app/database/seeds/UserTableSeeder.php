<?php

class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->delete();

        User::create(array(
            'id' => 1,
            'nit_cc' => '73153114-3',
            'razon_social' => 'litoalpes',
            'direccion' => 'cra 7 No.38 - 23',
            'barrio' => 'los alpes ',
            'ciudad' => 'cartagena',
            'pais' => 'colombia',
            'telefono' => '663441',
            'celular' => '3185672919',
            'email' => 'litoalpes6677@hotmail.com',
            'confiremail' => 'litoalpes6677@hotmail.com',
            'password' => Hash::make('Lito663441'),
            'confirpassword' => Hash::make('Lito663441')
        ));
    }

    public function down() {
        Schema::drop('users');
    }

}
