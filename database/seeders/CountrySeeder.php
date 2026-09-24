<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('countries')->insertOrIgnore([
            ['id' => 1, 'name' => 'India', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'United States', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'United Kingdom', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}