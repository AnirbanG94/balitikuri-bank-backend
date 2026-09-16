<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessWithUrbanCooperativeBank;

class BusinessWithUrbanCooperativeBankController extends Controller
{
    public function index()
    {
        $data = BusinessWithUrbanCooperativeBank::select(
            'id',
            'desc'
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $data,
            'message'=> "data fetched successfully"
        ]);
    }
}
