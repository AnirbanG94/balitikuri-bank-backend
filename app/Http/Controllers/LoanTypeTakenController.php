<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanTypeTaken;

class LoanTypeTakenController extends Controller
{
    public function store(Request $request)
    {
        $loan_type = new LoanTypeTaken();
        $loan_type->name = $request->name;
        
        $loan_type->address = $request->address;
        $loan_type->ph_no = $request->ph_no;
        $loan_type->loan_type = $request->loanType;
        

        $loan_type->save();

        return response()->json([
            'status' => true,
            'message' => 'Loan Type saved successfully.',
            'data' => $loan_type
        ]);
    }

    public function getOpenedLoanTakenAccounts(){
         $loan_type_taken = LoanTypeTaken::select(
            '*'
        )
        ->get();

        return response()->json([
            'success' => true,
            'data' => $loan_type_taken,
            'message'=> "Loan Type taken data fetched successfully"
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([

            'name' => 'required|string|max:255',

            'address' => 'required|string|max:500',

            'ph_no' => [
                'required',
                'digits:10'
            ]

        ]);


        $loan_type = LoanTypeTaken::find($id);
        $loan_type = new LoanTypeTaken();   
        $loan_type->name = $request->name;
        
        $loan_type->address = $request->address;
        $loan_type->ph_no = $request->ph_no;
        $loan_type->loan_type = $request->loanType;
        

        $loan_type->save();

        if(!$loan_type){

            return response()->json([
                'status'=>false,
                'message'=>'Account not found'
            ],404);

        }


        $loan_type->update($validated);


        return response()->json([

            'status'=>true,

            'message'=>'Account updated successfully',

            'data'=>$loan_type

        ]);

    }
}
