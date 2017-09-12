<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(TypeLogementTableSeeder::class);
        $this->call(TypeParkingTableSeeder::class);
        $this->call(ModalitesAccesTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(LogementsTableSeeder::class);
        $this->call(AnnoncesTableSeeder::class);
    }
}
