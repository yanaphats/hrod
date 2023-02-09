<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GendersSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$items = [
			['th' => 'ชาย', 'en' => 'Male', 'priority' => 1, 'is_active' => true],
			['th' => 'หญิง', 'en' => 'Female', 'priority' => 2, 'is_active' => true],
			['th' => 'ไม่ระบุ', 'en' => 'Not Specific', 'priority' => 3, 'is_active' => true],
		];

		foreach ($items as $item) {
			DB::table('genders')->insert([
				'th' => $item['th'],
				'en' => $item['en'],
				'priority' => $item['priority'],
				'is_active' => $item['is_active'],
				'created_at' => now(),
				'updated_at' => now(),
			]);
		}
	}
}
