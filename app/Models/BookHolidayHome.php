<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookHolidayHome extends Model
{
    

    protected $table = 'book_holiday_homes';

    protected $fillable = [
        'name',
        'address',
        'ph_no'
    ];
}
