<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeLogementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_logement')->truncate();
        DB::table('type_logement')->insert([
        	['name' => 'maison'],
        	['name' => 'T1'],
        	['name' => 'T1bis'],
        	['name' => 'T2'],
        	['name' => 'T3'],
        	['name' => 'T4'],
        	['name' => 'garage/parking'],
        	['name' => 'terrain'],
        	['name' => 'local'],
        	['name' => 'autre'],
        ]);
    }
}
