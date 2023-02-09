<?php

namespace Database\Seeders;



use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

use User\Models\User;
use User\Models\UserProfile;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
			'username' => 'admin',
			'password' => bcrypt('admin'),
			'email' => 'admin@sandbox.co.th',
			'is_active' => true,
			'verified' => true,
			'verified_at' => now(),
			'api_token' => Str::uuid(),
			'created_at' => now(),
			'updated_at' => now(),
		]);

		UserProfile::create([
			'user_id' => $user->id,
			'prefix_id' => 1,
			'first_name' => 'Admin',
			'last_name' => 'Sandbox',
			'gender_id' => 1,
			'birthday' => Carbon::create(1990, 1, 1),
			'phone' => '0812345678',
			'created_at' => now(),
			'updated_at' => now(),
		]);
    }
}
