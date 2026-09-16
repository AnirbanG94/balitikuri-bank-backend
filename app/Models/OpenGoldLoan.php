<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenGoldLoan extends Model
{
    

    protected $table = 'open_gold_loans';
    protected $fillable = [
        'name',
        'address',
        'ph_no'
    ];
}
