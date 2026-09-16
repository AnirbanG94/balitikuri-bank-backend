<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerAwareness;

class CustomerAwarenessController extends Controller
{
    public function index()
    {
        $cust_awareness_data = CustomerAwareness::select(
            'id',
            'point_one',
            'point_two',
            'point_three',
            'point_four',
            'point_five',
            'point_six',
            'point_seven'
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $cust_awareness_data,
            'message'=> "Customer Awareness data fetched successfully"
        ]);
    }
}
