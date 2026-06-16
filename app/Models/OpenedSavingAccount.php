<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenedSavingAccount extends Model
{
    protected $fillable = [
        'name',
        'address',
        'ph_no'
    ];
}