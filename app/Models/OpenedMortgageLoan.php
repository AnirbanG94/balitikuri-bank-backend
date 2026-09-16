<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenedMortgageLoan extends Model
{
    
    protected $table = 'opened_mortgage_loans';
    protected $fillable = [
        'name',
        'address',
        'ph_no'
    ];
}
