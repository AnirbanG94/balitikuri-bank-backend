<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DebitCard;
use App\Models\ApplyDebitCard;

class DebitCardController extends Controller
{
    public function index()
    {
        $debit_features = DebitCard::select(
            '*'
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $debit_features,
            'message'=> "Debit Features data fetched successfully"
        ]);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'ph_no' => 'required|digits:10'
        ]);

        $account = ApplyDebitCard::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully',
            'data' => $account
        ]);
    }

    public function openedDebitCards()
    {
        $applied_debit_cards = ApplyDebitCard::select(
            '*'
        )
        ->get();

        return response()->json([
            'success' => true,
            'data' => $applied_debit_cards,
            'message'=> "Applied Debit Cards data fetched successfully"
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


        $account = ApplyDebitCard::find($id);


        if(!$account){

            return response()->json([
                'status'=>false,
                'message'=>'Account not found'
            ],404);

        }


        $account->update($validated);


        return response()->json([

            'status'=>true,

            'message'=>'Account updated successfully',

            'data'=>$account

        ]);

    }

    // +++++++++++++++++++++ code added by Anirban Ghosh on 18th July +++++++++++++++++++++++++++++ \\

    public function destroy($id)
    {
        $account = ApplyDebitCard::find($id);

        if (!$account) {
            return response()->json([
                'status' => false,
                'message' => 'Record not found.'
            ], 404);
        }

        $account->delete();

        return response()->json([
            'status' => true,
            'message' => 'Record deleted successfully.'
        ]);
    }
}
