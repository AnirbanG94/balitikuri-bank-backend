<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DepositInterestRate;
use App\Models\CashCertificateNotes;

class DepositInterestRateController extends Controller
{
    public function index()
    {
        $deposit_interest_rates = DB::table('deposit_interest_rates')
        ->select(
        'id',
        'period_in_days',
        'interest_rate_general',
        'interest_rate_senior_citizen',
        'display_order',
        'is_header'
    )
    ->orderBy('display_order')
        ->get();

        return response()->json([
            'success' => true,
            'data' => $deposit_interest_rates,
            'message'=> "Deposit Interest Rate data fetched successfully"
        ]);
    }

    // ++++++++++++++++++ code added by Anirban Ghosh on 21st July,2026 ++++++++++++++++++++++++++++ \\

    public function getCashCertificatesNotes(){
        $cash_certificate_notes = CashCertificateNotes::select('*')->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $cash_certificate_notes,
            'message'=> "Cash Certificate data fetched successfully"
        ]);
    }

    public function update(Request $request,$id)
    {

        DB::table('cash_certificate_note_ones')
            ->where('id',$id)
            ->update([

                'note_one'=>$request->note_one,

                'cash_certificate_note_one_point_one'
                =>$request->cash_certificate_note_one_point_one,

                'cash_certificate_note_one_point_two'
                =>$request->cash_certificate_note_one_point_two,

                'updated_at'=>now()

            ]);


        return response()->json([
            'success'=>true,
            'message'=>'Updated successfully'
        ]);

    }

    public function destroy($id)
    {

        DB::table('cash_certificate_note_ones')
            ->where('id',$id)
            ->update([
                'status' => 'n'
            ]);


        return response()->json([
            'success'=>true,
            'message'=>'Deleted successfully'
        ]);

    }

    public function destroyDeposit($id)
    {
        DB::table('deposit_interest_rates')
            ->where('id', $id)
            ->update([
                'status' => 'n'
            ]);

        return response()->json([
            'success' => true,
            'message' => 'Deposit interest rate deleted successfully'
        ]);
    }

    public function updateDeposit(Request $request, $id)
    {
        // dd($request->all());
        DB::table('deposit_interest_rates')
            ->where('id', $id)
            ->update([

                'period_in_days' => $request->period_in_days,

                'interest_rate_general' => 
                    $request->interest_rate_general,

                'interest_rate_senior_citizen' =>
                    $request->interest_rate_senior_citizen,

                'updated_at' => now()

            ]);


        return response()->json([
            'success' => true,
            'message' => 'Deposit interest rate updated successfully'
        ]);

    }

}
