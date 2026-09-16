<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmiCalculator;

class EmiCalculatorController extends Controller
{
    public function index()
    {
        $emi_det = EmiCalculator::select(
            '*'
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $emi_det,
            'message'=> "EMI Calculator Description data fetched successfully"
        ]);
    }
}
