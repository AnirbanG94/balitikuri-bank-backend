<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LockerAccount;
use App\Models\LockerFeature;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LockerController extends Controller
{

    public function index()
    {
        $locker_features = LockerFeature::select(
            'id',
            'header_one',
            'point_one',
            'point_two',
            'point_three',
            'point_four',
            'point_five'
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $locker_features,
            'message'=> "Locker Features data fetched successfully"
        ]);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'ph_no' => 'required|digits:10'
        ]);

        $account = LockerAccount::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully',
            'data' => $account
        ]);
    }

    public function openedLockerAccounts(){
        $locker_accounts = LockerAccount::select(
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


        $account = LockerAccount::find($id);


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

    // +++++++++++++++++++++++++++++++++++ code added by Anirban Ghosh on 18th July,2026 ++++++++++++++++++++++++++++ \\
    public function destroy($id)
    {
        $account = LockerAccount::find($id);

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
                    return LockerAccount::where('status', 'Y')
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
            'Locker_Account.xlsx'
        );
    }
}
