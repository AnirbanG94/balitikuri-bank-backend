<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenFeedBackForm extends Model
{
    
    protected $table = 'open_feed_back_forms';
    protected $fillable = [
    'name',
    'mobile',
    'web_satisfaction',
    'service_satisfaction',
    'suggestions'
];
}
