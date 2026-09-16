<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenedCashCreditLoan extends Model
{
    

    protected $table = 'opened_cash_credit_loans';
    protected $fillable = [
        'name',
        'address',
        'ph_no'
    ];
}
