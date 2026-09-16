<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpenDailyDeposit;

class OpenDailyDepositController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'ph_no' => 'required|digits:10'
        ]);

        $account = OpenDailyDeposit::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully',
            'data' => $account
        ]);
    }
}
