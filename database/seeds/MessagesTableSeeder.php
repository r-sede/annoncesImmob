<?php

use Illuminate\Database\Seeder;
use App\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = \Faker\Factory::create('fr_FR');
    	Message::truncate();

    	for($i=0; $i < 20; $i++) {
	    	Message::insert([
	    		'content' => $faker->text(),
	    		'email' => $faker->email(),
	    		'fk_user' => $faker->numberBetween($min=1, $max=20),
	    	]);
    	}
    }
}
