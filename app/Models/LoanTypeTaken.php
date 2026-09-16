<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanTypeTaken extends Model
{
    protected $table = 'loan_type_taken';

    protected $fillable = [
        'name',
        'address',
        'ph_no'
    ];
}
