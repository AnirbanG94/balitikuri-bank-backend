<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TermDepositRequirements;
use App\Models\OpenTermDeposits;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TermDepositController extends Controller
{

    public function index()
    {
        $term_account_doc = TermDepositRequirements::select(
            'id',
            'header',
            'fixed_deposit',
            'monthly_income_scheme',
            'cash_certificate',
            'recurring_deposit_account',
            'nitya_nidhi'
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $term_account_doc,
            'message'=> "Term Account data fetched successfully"
        ]);
    }
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'ph_no' => 'required|digits:10'
        ]);

        $account = OpenTermDeposits::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully',
            'data' => $account
        ]);
    }

    // +++++++++++++++++++++++++++++++++++ Code added by Anirban Ghosh on 18th July,2026 +++++++++++++++++++++++ \\

    public function getOpenedTermAccounts(){
        $term_deposits = OpenTermDeposits::select('*')->where('status','Y')->get();
        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully',
            'data' => $term_deposits
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


        $account = OpenTermDeposits::find($id);


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
        $account = OpenTermDeposits::find($id);

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
                    return OpenTermDeposits::where('status', 'Y')
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
            'Term_Accounts.xlsx'
        );
    }
}
