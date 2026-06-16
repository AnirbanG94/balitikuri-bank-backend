<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankProfile;

class BankProfileController extends Controller
{
    public function index()
    {
        $bank_profile = BankProfile::select(
            'id',
            'content',
            'location',
            'branch_timing',
            'commitment',
            'banking_services',
            'history',
            'infrastructure',
            'locker_facility',
            'deposits',
            'loan',
            'cheque_clearing',
            'neft_rtgs',
            'lpg_subsidy',
            'pay_order',
            'bank_guarantee',
            'gst_payment'
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $bank_profile,
            'message'=> "bank profile data fetched successfully"
        ]);
    }
}
