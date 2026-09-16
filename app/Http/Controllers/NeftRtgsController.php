<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NeftRtgs;

class NeftRtgsController extends Controller
{
    // public function index()
    // {
    //     $neft_det = NeftRtgs::select(
    //         'id',
    //         'about_upi',
    //         'feature_one',
    //         'feature_two',
    //         'feature_three',
    //         'feature_four',
    //         'feature_five',
    //         'feature_six',
    //         'feature_seven',
    //         'feature_eight',
    //         'step_for_reg_one',
    //         'step_for_reg_two',
    //         'step_for_reg_three',
    //         'gen_upi_pin_one',
    //         'gen_upi_pin_two',
    //         'change_upi_pin_one',
    //         'change_upi_pin_two',
    //         'change_upi_pin_three',
    //         'change_upi_pin_four',
    //         'change_upi_pin_five',
    //         'change_upi_pin_six'
    //     )
    //     ->latest()
    //     ->get();

    //     return response()->json([
    //         'success' => true,
    //         'data' => $neft_det,
    //         'message'=> "NEFT data fetched successfully"
    //     ]);
    // }

    public function getNeftRtgsDescripson(){
        $neft_rtgs = NeftRtgs::select('*')->latest()->get();
        return response()->json([
                    'success' => true,
                    'data' => $neft_rtgs,
                    'message'=> "NEFT data fetched successfully"
                ]);
            }
}
