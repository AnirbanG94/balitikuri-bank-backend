<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GoldLoan;
use App\Models\OpenGoldLoan;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GoldLoanController extends Controller
{
    public function index()
    {
        $gold_loan_terms = GoldLoan::select(
            'id',
            'point_one',
            'point_two',
            'point_three',
            'point_four'
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $gold_loan_terms,
            'message'=> "Gold Loan Terms data fetched successfully"
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'ph_no' => 'required|digits:10'
        ]);

        $account = OpenGoldLoan::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully',
            'data' => $account
        ]);
    }

    // ++++++++++++++++++ code added on 8th July,2026 by Anirban Ghosh +++++++++++++++++++++++++ \\

    public function openedGoldLoanAcc(){
        $gold_loan_accounts = OpenGoldLoan::select(
            '*'
        )->where('status','Y')->get();

        return response()->json([
            'success' => true,
            'data' => $gold_loan_accounts,
            'message'=> "Gold Loan Accounts data fetched successfully"
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


        $account = OpenGoldLoan::find($id);


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

    // ++++++++++++++++++++++++++++++ code added by Anirban Ghosh on 19th July,2026 +++++++++++++++++++++++++++++ \\

    public function destroy($id)
        {
            $account = OpenGoldLoan::find($id);

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

    // ++++++++++++++++++++++++++++++++++++++ CODE ADDED BY ANIRBAN GHOSH ON 19TH JULY,2026 +++++++++++++++++++++++++++++++ \\

    public function export()
    {
        return Excel::download(
            new class implements FromCollection, WithHeadings {

                public function collection()
                {
                    return OpenGoldLoan::where('status', 'Y')
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
            'Gold_Loan_Accounts.xlsx'
        );
    }
}
