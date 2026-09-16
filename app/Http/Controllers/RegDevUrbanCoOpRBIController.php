<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegDevUrbanCoOpRBI;

class RegDevUrbanCoOpRBIController extends Controller
{
    public function index()
    {
        $reg_dev_data = RegDevUrbanCoOpRBI::select('desc')
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $reg_dev_data,
            'message'=> "Regulation RBI Features data fetched successfully"
        ]);
    }
}
