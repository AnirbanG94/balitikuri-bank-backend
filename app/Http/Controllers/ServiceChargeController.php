<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicesCharges;

class ServiceChargeController extends Controller
{
    public function index()
    {
        $service_charges = ServicesCharges::select(
            'id',
            'items',
            'charges'
        )
        ->get();

        return response()->json([
            'success' => true,
            'data' => $service_charges,
            'message'=> "Service Charges data fetched successfully"
        ]);
    }
}
