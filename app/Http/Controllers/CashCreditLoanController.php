<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashCreditLoan;
use App\Models\OpenedCashCreditLoan;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CashCreditLoanController extends Controller
{
    public function index()
    {
        $cash_credit_terms = CashCreditLoan::select(
            'id',
            'trade_license',
            'prof_tax',
            'current_electric_bill',
            'p_tax_challan',
            'rent_receipt',
            'pan_card',
            'gst_details',
            'sales_tax_no',
            'balance_sheet',
            'ssi_cert',
            'pollution_certificate',
            'machinery_dtl',
            'no_of_present_employee',
            'order_list_dtl',
            'income_tax_clr_cert',
            'goods_raw_mat',
            'insurance_of_stocks',
            'partnership_deeds',
            'condition_of_property'
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $cash_credit_terms,
            'message'=> "Cash Credit Loan Terms and Conditions data fetched successfully"
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'ph_no' => 'required|digits:10'
        ]);

        $account = OpenedCashCreditLoan::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully',
            'data' => $account
        ]);
    }

    // ++++++++++++++++++++++++++ code added on 8th July,2026 by Anirban Ghosh +++++++++++++++++++++++++++++++++ \\
    

    public function openedCashCreditAcc(){
        $cash_credit_accounts = OpenedCashCreditLoan::select(
            '*'
        )->where('status','Y')->get();
        

        return response()->json([
            'success' => true,
            'data' => $cash_credit_accounts,
            'message'=> "Cash Credit Loan Accounts data fetched successfully"
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


        $account = OpenedCashCreditLoan::find($id);


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

    // +++++++++++++++++++++++++++++++++ code added by Anirban Ghosh on 19th July,2026 ++++++++++++++++++++++++++++++++ \\
    public function destroy($id)
        {
            $account = OpenedCashCreditLoan::find($id);

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
                    return OpenedCashCreditLoan::where('status', 'Y')
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
            'Cash_Credit_Accounts.xlsx'
        );
    }

}
