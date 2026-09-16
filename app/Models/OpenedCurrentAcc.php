<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenedCurrentAcc extends Model
{
    protected $fillable = [
        'name',
        'address',
        'ph_no'
    ];
}
