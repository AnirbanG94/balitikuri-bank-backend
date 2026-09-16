<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminCredential extends Model
{

    protected $fillable = [

        'password'

    ];


    protected $hidden = [

        'password'

    ];

}