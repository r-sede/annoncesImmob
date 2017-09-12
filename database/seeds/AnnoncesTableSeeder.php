<?php

use Illuminate\Database\Seeder;
use App\Annonce;

class AnnoncesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Annonce::truncate();
        $faker = \Faker\Factory::create();
        $limit = 20;
        $nn = time() + 8 * 24 * 3600;
        $today = new DateTime();
        $today->setTimestamp($nn);
        
        for ($i = 0; $i < $limit; $i++) {
        	Annonce::create([
        		'expire_at' => $today->format('Y-m-d H:i:s'), 
        		'fk_auteur' => $faker->numberBetween($min = 0, $max = 19 ),
        		'fk_logement' => $faker->numberBetween($min = 0, $max = 19 ),
        	]);


        }

    }
}
