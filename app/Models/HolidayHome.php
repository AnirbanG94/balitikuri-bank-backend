<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class HolidayHome extends Model
{
    

    protected $table = 'holiday_homes';

    protected $fillable = [
        'name',
        'address',
        'ph_no'
    ];
}
