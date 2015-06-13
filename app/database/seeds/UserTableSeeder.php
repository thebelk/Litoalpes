<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
        'id' => 1,
        'nit_cc'=>'No.1143345481',
        'razon_social'=>'litoalpes',
        'direccion'=>'los alpes cra 7 No.38 - 23',
        'ciudad'=>'cartagena',
        'pais'=>'colombia',
        'telefono'=>'663441',
        'celular'=>'3185672919',
        'email'=>'litoalpes6677@hotmailcom',
        'confirmemail'=>'litoalpes6677@hotmail.com',
        'password'=>Hash::make('Lito663441'),
        'confirpassword'=>Hash::make('Lito663441'),       
        ));
    }

}


                       
                    