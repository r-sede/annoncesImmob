<?php

use Illuminate\Database\Seeder;
use App\Logement;

class LogementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Logement::truncate();
        $faker = \Faker\Factory::create('fr_FR');
        $limit = 20;

        for ($i = 0; $i < $limit; $i++) {
        	Logement::create([
        		'n_rue' => $faker->buildingNumber(),
        		'rue' => $faker->streetName(),
        		'code_postal' => $faker->postcode(),
        		'ville' => $faker->city(),
        		'superficie' => $faker->numberBetween($min=10, $max=300),
        		'fk_type_logements' => $faker->numberBetween($min=0, $max=9),
        		'meuble' => $faker->boolean,
        		'tarif' => $faker->numberBetween($min=400, $max=10000),
        		'fk_modalite' => $faker->numberBetween($min=0, $max=2),
        		'etage' => $faker->numberBetween($min=0, $max=10),
        		'fk_type_parking' => $faker->numberBetween($min=0, $max=2),
        		'n_chambre' => $faker->numberBetween($min=0, $max=5),
        		'description' => $faker->text($maxNbrChars = 200),

        		'classe_energie' => 'A',
        		'classe_gesc' => 'A'
        	]);
        }

    }
}
