<?php

namespace App\Http\Controllers;


use App\Models\DebitCard;
use App\Models\ApplyDebitCard;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Support\Facades\DB;

class DebitCardController extends Controller
{
    public function index()
    {
        $debit_features = DebitCard::select(
            '*'
        )
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data' => $debit_features,
            'message' => "Debit Features data fetched successfully"
        ]);
    }

    public function store(Request $request)
    {
        // 1. Validate incoming data
        $request->validate([
            'name'               => 'required|string|max:255',
            'address'            => 'required|string',
            'ph_no'              => 'required|string',
            'country_id'         => 'required|integer',
            'state_id'           => 'required|integer',
            'city_id'            => 'required|integer',
            'employment_type'    => 'required|string',
            'card_type'          => 'required|string',
            'account_balance'    => 'required|numeric',
            'charges_applicable' => 'required|numeric',
            'applicant_image'    => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('applicant_image');

        // 2. Handle Image Upload
        if ($request->hasFile('applicant_image')) {
            // Stores file inside storage/app/public/applicant_images
            $filePath = $request->file('applicant_image')->store('applicant_images', 'public');
            $data['applicant_image'] = $filePath;
        }

        // 3. Create Record
        $debitCard = ApplyDebitCard::create($data);

        return response()->json([
            'status'  => true,
            'message' => 'Application submitted successfully',
            'data'    => $debitCard
        ], 201);
    }

    public function openedDebitCards()
    {
        $applied_debit_cards = ApplyDebitCard::select(
            '*'
        )
            ->get();

        return response()->json([
            'success' => true,
            'data' => $applied_debit_cards,
            'message' => "Applied Debit Cards data fetched successfully"
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


        $account = ApplyDebitCard::find($id);


        if (!$account) {

            return response()->json([
                'status' => false,
                'message' => 'Account not found'
            ], 404);
        }


        $account->update($validated);


        return response()->json([

            'status' => true,

            'message' => 'Account updated successfully',

            'data' => $account

        ]);
    }

    // +++++++++++++++++++++ code added by Anirban Ghosh on 18th July +++++++++++++++++++++++++++++ \\

    public function destroy($id)
    {
        $account = ApplyDebitCard::find($id);

        if (!$account) {
            return response()->json([
                'status' => false,
                'message' => 'Record not found.'
            ], 404);
        }

        $account->delete();

        return response()->json([
            'status' => true,
            'message' => 'Record deleted successfully.'
        ]);
    }

    public function getCountries()
    {
        try {
            $countries = DB::table('countries')
                ->select('id', 'name')
                ->orderBy('name', 'asc')
                ->get();

            return response()->json([
                'status'  => true,
                'code'    => 200,
                'message' => 'Countries retrieved successfully',
                'data'    => $countries
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status'  => false,
                'code'    => 500,
                'message' => 'Failed to fetch countries',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    public function getStates(Request $request)
    {
        try {
            $query = DB::table('states')->select('id', 'country_id', 'name');

            // Optional query parameter filtering: /api/states?country_id=1
            if ($request->has('country_id')) {
                $query->where('country_id', $request->query('country_id'));
            }

            $states = $query->orderBy('name', 'asc')->get();

            return response()->json([
                'status'  => true,
                'code'    => 200,
                'message' => 'States retrieved successfully',
                'data'    => $states
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status'  => false,
                'code'    => 500,
                'message' => 'Failed to fetch states',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    public function getCities(Request $request)
    {
        try {
            $query = DB::table('cities')->select('id', 'state_id', 'name');

            // Optional query parameter filtering: /api/cities?state_id=1
            if ($request->has('state_id')) {
                $query->where('state_id', $request->query('state_id'));
            }

            $cities = $query->orderBy('name', 'asc')->get();

            return response()->json([
                'status'  => true,
                'code'    => 200,
                'message' => 'Cities retrieved successfully',
                'data'    => $cities
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status'  => false,
                'code'    => 500,
                'message' => 'Failed to fetch cities',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
