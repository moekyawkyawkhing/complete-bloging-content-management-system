<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(TodoTableSeeder::class);

    	App\Setting::create([

    		'name' => 'laravel blog site',
    		'address' => 'myitkyina',
    		'contact_number' => '99877',
    		'contact_email' => 'moe@gmail.com'
    	]);

    }
}
