<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
        //Call P4Seeder.php in app/database/seeds/
		$this->call('P4Seeder');
        $this->command->info("Users and Feeds tables seeded...");
	}

}
