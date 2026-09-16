<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminCredential;
use Illuminate\Support\Facades\Hash;


class AdminCredentialSeeder extends Seeder
{

    public function run()
    {

        AdminCredential::create([

            'password'=>Hash::make('Admin@123')

        ]);

    }

}