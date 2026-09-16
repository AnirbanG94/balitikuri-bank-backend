<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imps;

class ImpsController extends Controller
{
    public function index()
    {
        $imps_features = Imps::select(
            'id',
            'about_imps',
            'feature_one',
            'feature_two',
            'feature_three',
            'feature_four',
            'feature_five',
            'feature_six',
            'feature_seven',
            'trf_fund_imps_one',
            'trf_fund_imps_two',
            'trf_fund_imps_three',
            'trf_fund_imps_four',
            'trf_fund_imps_five',
            'trf_fund_imps_six',
            'trf_fund_imps_seven',
            'trf_fund_imps_eight'
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $imps_features,
            'message'=> "IMPS Features data fetched successfully"
        ]);
    }
}
