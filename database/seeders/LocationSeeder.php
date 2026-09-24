<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        // Sample Country
        DB::table('countries')->updateOrInsert(
            ['id' => 1],
            ['name' => 'India', 'created_at' => now(), 'updated_at' => now()]
        );

        // Sample States
        DB::table('states')->updateOrInsert(
            ['id' => 1],
            ['country_id' => 1, 'name' => 'West Bengal', 'created_at' => now(), 'updated_at' => now()]
        );
        DB::table('states')->updateOrInsert(
            ['id' => 2],
            ['country_id' => 1, 'name' => 'Maharashtra', 'created_at' => now(), 'updated_at' => now()]
        );

        // Sample Cities
        DB::table('cities')->updateOrInsert(
            ['id' => 1],
            ['state_id' => 1, 'name' => 'Howrah', 'created_at' => now(), 'updated_at' => now()]
        );
        DB::table('cities')->updateOrInsert(
            ['id' => 2],
            ['state_id' => 1, 'name' => 'Kolkata', 'created_at' => now(), 'updated_at' => now()]
        );
        DB::table('cities')->updateOrInsert(
            ['id' => 3],
            ['state_id' => 2, 'name' => 'Mumbai', 'created_at' => now(), 'updated_at' => now()]
        );
    }
}