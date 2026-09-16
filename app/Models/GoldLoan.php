<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoldLoan extends Model
{
    

    protected $table = 'gold_loans';

    protected $fillable = [
        'name',
        'address',
        'ph_no'
    ];
}
