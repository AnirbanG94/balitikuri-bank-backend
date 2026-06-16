<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocReqSavingAccount;
use App\Models\ValidAndAcceptableDocForSavingsAcc;
// **** newly added feature *****

class SavingAccountDocController extends Controller
{
   public function index()
    {
        $saving_account_doc = DocReqSavingAccount::select(
            'id',
            'identity_proof',
            'address_proof',
            'stamp_size_photo' 
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $saving_account_doc,
            'message'=> "Saving Account Doc data fetched successfully"
        ]);
    }

    public function validDocs(){
        $validdoc = ValidAndAcceptableDocForSavingsAcc::select(
            'id',
            'pan_card',
            'aadhar_card'
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $validdoc,
            'message'=> "Valid Doc data fetched successfully"
        ]);
    }
}
