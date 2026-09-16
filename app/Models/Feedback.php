<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'given_feedback';

    protected $fillable = [
        'name',
        'mobile',
        'website_satisfaction',
        'service_satisfaction',
        'suggestions'
    ];
}