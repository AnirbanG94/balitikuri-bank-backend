<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanInterestRates;

class LoanInterestRatesController extends Controller
{
    public function index()
    {
        $loan_rates = LoanInterestRates::select(
            'id',
            'type_of_loan',
            'interest_rates'
        )
        ->get();

        return response()->json([
            'success' => true,
            'data' => $loan_rates,
            'message'=> "Loan Interest Rates data fetched successfully"
        ]);
    }

    // ++++++++++++++++++++++++++++ code added by Anirban Ghosh on 22nd July,2026 ++++++++++++++++++++++++++++++++ \\

    public function updateLoanInterestRates(Request $request, $id){
        $validated = $request->validate([

                    'type_of_loan' => 'required',

                    'interest_rates' => 'required',

                ]);


        $account = LoanInterestRates::find($id);

        if(!$account){

            return response()->json([
                'status'=>false,
                'message'=>'Account not found'
            ],404);

        }

        return response()->json([

            'status'=>true,

            'message'=>'Account updated successfully',

            'data'=>$account

        ]);

    }

    public function destroy($id)
        {
            $account = LoanInterestRates::find($id);

            if (!$account) {
                return response()->json([
                    'status' => false,
                    'message' => 'Record not found.'
                ], 404);
            }

            $account->status = 'N';
            $account->save();

            return response()->json([
                'status' => true,
                'message' => 'Record deleted successfully.'
            ]);
        }
}
