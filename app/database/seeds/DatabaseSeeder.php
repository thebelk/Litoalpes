<?php

class DatabaseSeeder extends Seeder {

    public function run() {
        
    	$this->call('UserTableSeeder');
        $this->call('CustomerTableSeeder');
        
        $this->command->info('User table seeded!');
    }

}
