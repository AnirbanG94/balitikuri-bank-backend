<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('states')->insertOrIgnore([
            ['id' => 1, 'country_id' => 1, 'name' => 'West Bengal', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'country_id' => 1, 'name' => 'Maharashtra', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'country_id' => 1, 'name' => 'Karnataka', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'country_id' => 1, 'name' => 'Delhi', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'country_id' => 2, 'name' => 'California', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}