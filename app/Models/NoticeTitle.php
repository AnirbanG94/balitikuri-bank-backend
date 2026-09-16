<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeTitle extends Model
{
    protected $table = 'notice_titles';

    protected $fillable = [
        'title',
        'notice_date'
    ];
}
