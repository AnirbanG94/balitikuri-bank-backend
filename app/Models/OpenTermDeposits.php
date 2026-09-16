<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenTermDeposits extends Model
{


    
    protected $table = 'open_term_deposits';
    protected $fillable = [
        'name',
        'address',
        'ph_no'
    ];
}
