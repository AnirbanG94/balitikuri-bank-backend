<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LockerAccount extends Model
{
    

    protected $table = 'locker_accounts';

    protected $fillable = [
        'name',
        'address',
        'ph_no'
    ];
}
