<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrentAccReqDoc;
use App\Models\OpenedCurrentAcc;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CurrentAccReqDocController extends Controller
{
    public function index()
    {
        $current_account_terms = CurrentAccReqDoc::select(
            'id',
            'trade_license',
            'prof_tax_enroll',
            'prof_tax_challan',
            'aadhar_card',
            'pan_card',
            'business_address_proof',
            'photograph',
            'partnership_deeds',
            'memorandum',
            'minimum_balance'
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $current_account_terms,
            'message'=> "Current Account Terms and Conditions data fetched successfully"
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'ph_no' => 'required|digits:10'
        ]);

        $account = OpenedCurrentAcc::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully',
            'data' => $account
        ]);
    }

    public function getOpenedCurrentAccounts(){
        $opened_current_accounts = OpenedCurrentAcc::select(
            '*'
        )->where('status','Y')->get();

        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully',
            'data' => $opened_current_accounts
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


        $account = OpenedCurrentAcc::find($id);


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

    // +++++++++++++++++++++++++++++++ Code added by Anirban Ghosh on 18th July,2026 ++++++++++++++++++++++++++++ \\
    public function destroy($id)
    {
        $account = OpenedCurrentAcc::find($id);

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

    public function export()
    {
        return Excel::download(
            new class implements FromCollection, WithHeadings {

                public function collection()
                {
                    return OpenedCurrentAcc::where('status', 'Y')
                        ->select('name', 'address', 'ph_no')
                        ->get();
                }

                public function headings(): array
                {
                    return [
                        'Name',
                        'Address',
                        'Phone Number'
                    ];
                }

            },
            'Current_Accounts.xlsx'
        );
    }
}
