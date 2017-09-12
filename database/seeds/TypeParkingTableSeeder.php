<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeParkingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('type_parking')->truncate();
		DB::table('type_parking')->insert([
			['name' => 'parking'],
			['name' => 'garage'],
			['name' => 'box_individuel'],
		]);
    }
}
