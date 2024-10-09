<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		DB::table('admins')->truncate();
		DB::table('admins')->insert([
			[
				'first_name' => 'Super',
				'last_name' => 'Admin',
				'email' => 'superadmin@lossdamage.com',
				'password' => Hash::make('Sup3r@dm!n'),
				'ip_address' => request()->ip(),
				'remember_me' => 1,
				'role_id' => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			]
		]);
	}
}
