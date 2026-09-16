<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $privacy_policy = PrivacyPolicy::select(
            'id',
            'privacy_desc_one',
            'privacy_desc_two'
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $privacy_policy,
            'message'=> "privacy Policy data fetched successfully"
        ]);
    }
}
