<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppliedForMobileBanking extends Model
{
    protected $table = 'applied_for_mobile_bankings';

    protected $fillable=[

        'name',

        'address',

        'ph_no'

    ];
}