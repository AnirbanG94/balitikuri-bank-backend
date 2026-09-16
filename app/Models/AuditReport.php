<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditReport extends Model
{
    protected $fillable=[

        'audit_year',

        'report_name',

        'pdf_path'

    ];
}