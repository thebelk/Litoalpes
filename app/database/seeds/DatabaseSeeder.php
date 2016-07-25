<?php

class DatabaseSeeder extends Seeder {

    public function run() {
        
    	$this->call('UserTableSeeder');
        $this->call('CustomerTableSeeder');
		$this->call('WorkorderTableSeeder');
        $this->call('NotificationTableSeeder');
        $this->command->info('Seeders OK!');
    }

}
