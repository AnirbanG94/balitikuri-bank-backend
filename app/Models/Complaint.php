<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'account_no',
        'branch',
        'name',
        'address',
        'phone_no',
        'email',
        'complaint_type',
        'transaction_type',
        'debit_card_no',
        'reference_no',
        'transaction_date',
        'transaction_amount',
        'complaint_details',
    ];
}