<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MortgageLoan;
use App\Models\OpenedMortgageLoan;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class MortgageLoanController extends Controller
{
    public function index()
    {
        $mortgage_features = MortgageLoan::select('*')
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $mortgage_features,
            'message'=> "Mortgage Loan Features data fetched successfully"
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'ph_no' => 'required|digits:10'
        ]);

        $account = OpenedMortgageLoan::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully',
            'data' => $account
        ]);
    }


    // +++++++++++++++++++++++++++++++ code added on 14th July,2026 by Anirban Ghosh ++++++++++++++++++++++++++++++ \\
    public function getOpenedMortgageLoanAccounts(){
        $mortgage_loan_accounts = OpenedMortgageLoan::select(
            '*'
        )->where('status','Y')
        ->get();

        return response()->json([
            'success' => true,
            'data' => $mortgage_loan_accounts,
            'message'=> "Mortgage Loan Accounts data fetched successfully"
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


        $account = OpenedMortgageLoan::find($id);


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

    // +++++++++++++++++++++++++++++ CODE ADDED BY Anirban GHOSH ON 21st july,2026 ++++++++++++++++++++++++++++++++ \\
    
    public function destroy($id)
    {
        $account = OpenedMortgageLoan::find($id);

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
                    return OpenedMortgageLoan::where('status', 'Y')
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
            'Mortgage_Accounts.xlsx'
        );
    }
}
