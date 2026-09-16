<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyDeposit;
use App\Models\OpenDailyDeposit;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DailyDepositController extends Controller
{
    public function index()
    {
        $daily_dep_data = DailyDeposit::select(
            '*'
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $daily_dep_data,
            'message'=> "Daily Deposit data fetched successfully"
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'ph_no' => 'required|digits:10'
        ]);

        $account = OpenDailyDeposit::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully',
            'data' => $account
        ]);
    }

    // +++++++++++++++++++++++++++++++++++ code added by Anirban Ghosh on 14th JULY,2026 ++++++++++++++++++++++++++++ \\

    public function getOpenedDailyDepositAccounts(){
        $opened_daily_dep_data = OpenDailyDeposit::select(
            '*'
        )->where('status','Y')->get();

        return response()->json([
            'success' => true,
            'data' => $opened_daily_dep_data,
            'message'=> "Daily Deposit data fetched successfully"
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


        $account = OpenDailyDeposit::find($id);


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

    // +++++++++++++++++++++++++++++++++ CODE ADDED BY ANIRBAN GHOSH ON 19TH JULY,2026 ++++++++++++++++++++++++++++++ \\

    public function destroy($id)
    {
        $account = OpenDailyDeposit::find($id);

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
                    return OpenDailyDeposit::where('status', 'Y')
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
            'Term_Deposit_Accounts.xlsx'
        );
    }
}
