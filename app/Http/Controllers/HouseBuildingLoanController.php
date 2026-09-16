<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HouseBuildingLoan;
use App\Models\OpenedHouseBuildingAcc;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HouseBuildingLoanController extends Controller
{
    public function index()
    {
        $house_building_det = HouseBuildingLoan::select(
            'id',
            'desc',
            'eligibility',
            'purpose_point_one',
            'purpose_point_two',
            'max_amt_loan_point_one',
            'max_amt_loan_point_two',
            'processing_fee',
            'processing_fee_repayment'
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $house_building_det,
            'message'=> "House Building Loan data fetched successfully"
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'ph_no' => 'required|digits:10'
        ]);

        $account = OpenedHouseBuildingAcc::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully',
            'data' => $account
        ]);
    }

    // +++++++++++++++++++++++ code added by Anirban Ghosh on 07.07.2026 ++++++++++++++++++++++++++++++ \\

    public function openedHouseBuildingLoanAcc(){
        $opened_house_building_accs = OpenedHouseBuildingAcc::select(
            '*'
        )->where('status','Y')->get();

        return response()->json([
            'success' => true,
            'data' => $opened_house_building_accs,
            'message'=> "Opened House Building Loan data fetched successfully"
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


        $account = OpenedHouseBuildingAcc::find($id);


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

    // ++++++++++++++++++++++++++++++++++++ code added by Anirban Ghosh on 21st July,2026 ++++++++++++++++++++++++++++++ \\

    public function destroy($id)
        {
            $account = OpenedHouseBuildingAcc::find($id);

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
                    return OpenedHouseBuildingAcc::where('status', 'Y')
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
            'House_Building_Loan_Accounts.xlsx'
        );
    }
    
}
