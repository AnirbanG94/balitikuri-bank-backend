<?php

namespace App\Http\Controllers;

use App\Models\OpenedSavingAccount;
use Illuminate\Http\Request;

class OpenedSavingAccountController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'ph_no' => 'required|digits:10'
        ]);

        $account = OpenedSavingAccount::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully',
            'data' => $account
        ]);
    }
}