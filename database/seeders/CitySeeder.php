<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->insertOrIgnore([
            // West Bengal Cities (state_id: 1)
            ['id' => 1, 'state_id' => 1, 'name' => 'Howrah', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'state_id' => 1, 'name' => 'Kolkata', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'state_id' => 1, 'name' => 'Durgapur', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'state_id' => 1, 'name' => 'Siliguri', 'created_at' => now(), 'updated_at' => now()],

            // Maharashtra Cities (state_id: 2)
            ['id' => 5, 'state_id' => 2, 'name' => 'Mumbai', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'state_id' => 2, 'name' => 'Pune', 'created_at' => now(), 'updated_at' => now()],

            // Karnataka Cities (state_id: 3)
            ['id' => 7, 'state_id' => 3, 'name' => 'Bengaluru', 'created_at' => now(), 'updated_at' => now()],

            // Delhi (state_id: 4)
            ['id' => 8, 'state_id' => 4, 'name' => 'New Delhi', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}