<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HolidayHome;
use App\Models\BookHolidayHome;

class HolidayHomeController extends Controller
{
   public function index()
    {
        $holiday_home_details = HolidayHome::select(
            'id',
            'holiday_home_name',
            'branding',
            'no_of_rooms',
            'rooms_desc',
            'room_no',
            'room_type',
            'room_occupancy',
            'members_non_members',
            'contact_info_phone',
            'booking_add_one',
            'booking_add_two',
            'booking_add_three',
            'email',
            'website',
            'content_one',
            'content_two'
            )
        
        ->get();

        return response()->json([
            'success' => true,
            'data' => $holiday_home_details,
            'message'=> "Holiday Home Details fetched successfully"
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'ph_no' => 'required|digits:10'
        ]);

        $account = BookHolidayHome::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully',
            'data' => $account
        ]);
    }

    // +++++++++++++++++++++++++ code added by Anirban Ghosh on 10th July,2026 +++++++++++++++++++++++++ \\

    public function getBookedHolidayHomeDetails(){
        $booked_holiday_home_details = BookHolidayHome::select(
            '*'
            )
        
        ->get();

        return response()->json([
            'success' => true,
            'data' => $booked_holiday_home_details,
            'message'=> "Booked Holiday Home Details fetched successfully"
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


        $booked_holiday_home_details = BookHolidayHome::find($id);


        if(!$booked_holiday_home_details){

            return response()->json([
                'status'=>false,
                'message'=>'Account not found'
            ],404);

        }


        $booked_holiday_home_details->update($validated);


        return response()->json([

            'status'=>true,

            'message'=>'Holiday Home Details updated successfully',

            'data'=>$booked_holiday_home_details

        ]);

    }
}
