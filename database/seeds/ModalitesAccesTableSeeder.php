<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalitesAccesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('modalite_acces')->truncate();
		DB::table('modalite_acces')->insert([
			['name' => 'location'],
			['name' => 'vente'],
			['name' => 'co_location'],
		]);
	}
}
