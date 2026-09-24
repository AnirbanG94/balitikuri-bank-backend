<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplyDebitCardSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('apply_debit_cards')->insert([
            [
                'name'               => 'Anirban Ghosh',
                'address'            => 'Santragachi, Howrah',
                'ph_no'              => '7439335799',
                'country_id'         => 1,
                'state_id'           => 1,
                'city_id'            => 1,
                'employment_type'    => 'Salaried',
                'card_type'          => 'Platinum Visa',
                'account_balance'    => 55000.00,
                'charges_applicable' => 250.00,
                'created_at'         => now(),
                'updated_at'         => now(),
            ],
            [
                'name'               => 'Rohan Banerjee',
                'address'            => 'Salt Lake Sector V',
                'ph_no'              => '9830123456',
                'country_id'         => 1,
                'state_id'           => 1,
                'city_id'            => 2,
                'employment_type'    => 'Self-Employed',
                'card_type'          => 'Classic RuPay',
                'account_balance'    => 28500.50,
                'charges_applicable' => 100.00,
                'created_at'         => now(),
                'updated_at'         => now(),
            ],
            [
                'name'               => 'Priya Sharma',
                'address'            => 'Andheri East',
                'ph_no'              => '9123456789',
                'country_id'         => 1,
                'state_id'           => 2,
                'city_id'            => 3,
                'employment_type'    => 'Salaried',
                'card_type'          => 'Gold Mastercard',
                'account_balance'    => 120000.00,
                'charges_applicable' => 500.00,
                'created_at'         => now(),
                'updated_at'         => now(),
            ],
        ]);
    }
}