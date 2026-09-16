<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\ComplaintStatus;

class ComplaintController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_no' => 'required|max:30',
            'branch' => 'required',
            'name' => 'required|max:255',
            'address' => 'required',
            'phone_no' => 'required|digits:10',
            'email' => 'nullable|email',
            'complaint_type' => 'required',
            'transaction_type'     => 'required',
            'debit_card_no'        => 'required',
            'reference_no'         => 'required',
            'transaction_date'     => 'required',
            'transaction_amount'   => 'required',
            'complaint_details'    => 'required',
        ]);

        $complaint = Complaint::create($validated);

        return response()->json([
            'status'=>true,
            'message'=>'Complaint saved successfully.',
            'data'=>$complaint
        ]);
    }

    // +++++++++++++++++++++ code added on 16th July by Anirban Ghosh ++++++++++++++++++++++++++++++++ \\

    public function getAppliedComplaintDetails(){
        $complaint_det = Complaint::select('*')->get();
         return response()->json([
            'success' => true,
            'data' => $complaint_det,
            'message'=> "Applied Complained data fetched successfully"
        ]);
    }

    public function updateComplaintForm(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);

        
        $complaint->name = $request->name;
        
        $complaint->address = $request->address;
        $complaint->phone_no = $request->phone_no;
        
        $complaintStatus = new ComplaintStatus();
        
        $complaintStatus->complaint_id = $complaint->id; 
        $complaintStatus->name = $complaint->name;
        $complaintStatus->address = $complaint->address;
        $complaintStatus->ph_no = $complaint->phone_no;
        $complaintStatus->status = 'Resolved';

        $complaintStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Complaint resolved successfully.',
            'data' => $complaint
        ]);
    }
}