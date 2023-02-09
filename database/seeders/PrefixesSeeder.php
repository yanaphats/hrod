<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrefixesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
			['th' => 'นาย', 'en' => 'Mr.', 'priority' => 1, 'is_active' => true],
			['th' => 'นาง', 'en' => 'Mrs.', 'priority' => 2, 'is_active' => true],
			['th' => 'นางสาว', 'en' => 'Miss', 'priority' => 3, 'is_active' => true],
		];

		foreach ($items as $item) {
			DB::table('prefixes')->insert([
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
