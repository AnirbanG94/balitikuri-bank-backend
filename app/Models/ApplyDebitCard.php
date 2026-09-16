<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplyDebitCard extends Model
{
    

    protected $table = 'apply_debit_cards';

    protected $fillable=[

        'name',

        'address',

        'ph_no'

    ];

   
}
