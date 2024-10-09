<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AffiliationSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	*/
	public function run() {
		\DB::table('affiliations')->truncate();
		\DB::table('affiliations')->insert([
			[
				'name' => 'Public sector',
				 
			],
			[
				'name' => 'Private sector',
				 
			],
			[
				'name' => 'Civil society',
				 
			],
		]);
	}
}
