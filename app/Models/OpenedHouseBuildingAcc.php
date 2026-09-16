<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenedHouseBuildingAcc extends Model
{
    

    protected $table = 'opened_house_building_accs';
    protected $fillable = [
        'name',
        'address',
        'ph_no'
    ];
}
