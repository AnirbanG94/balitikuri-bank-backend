<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MobileBanking;
use App\Models\AppliedForMobileBanking;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MobileBankingController extends Controller
{
    public function index()
    {
        $mobile_banking_features = MobileBanking::select(
            '*'
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $mobile_banking_features,
            'message'=> "Mobile Banking data fetched successfully"
        ]);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'ph_no' => 'required|digits:10'
        ]);

        $account = AppliedForMobileBanking::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully',
            'data' => $account
        ]);
    }

    public function getMobileBankingFeatures(){
        $locker_accounts = AppliedForMobileBanking::select(
            '*'
        )->where('status','Y')
        ->get();

        return response()->json([
            'success' => true,
            'data' => $locker_accounts,
            'message'=> "Locker Accounts data fetched successfully"
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


        $account = AppliedForMobileBanking::find($id);


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
        $account = AppliedForMobileBanking::find($id);

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
                    return AppliedForMobileBanking::where('status', 'Y')
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
            'Mobile_Banking_Accounts.xlsx'
        );
    }
}
