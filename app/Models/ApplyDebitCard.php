<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplyDebitCard extends Model
{
    

    protected $table = 'apply_debit_cards';

    protected $fillable = [
        'name',
        'address',
        'ph_no',
        'country_id',
        'state_id',
        'city_id',
        'employment_type',
        'card_type',
        'account_balance',
        'charges_applicable',
        'applicant_image' // Must be included
    ];

   
}
