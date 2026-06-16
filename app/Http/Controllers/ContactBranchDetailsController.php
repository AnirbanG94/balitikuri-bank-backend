<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactBranchDetails;

class ContactBranchDetailsController extends Controller
{
    public function index()
    {
        $contactbranchdetails = ContactBranchDetails::select(
            'id',
            'branch_name',
            'address',
            'contact_number',
            'office_email_id',
            'main_branch_email_id',
            'banking_hours',
            'weekday_timing',
            'sunday_timing',
            'map_url' 
        )
        // ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $contactbranchdetails,
            'message'=> "Contact page data fetched successfully"
        ]);
    }
}
