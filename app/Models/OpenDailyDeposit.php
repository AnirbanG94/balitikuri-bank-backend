<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenDailyDeposit extends Model
{
    

    protected $table = 'open_daily_deposits';
    protected $fillable = [
        'name',
        'address',
        'ph_no'
    ];
}
