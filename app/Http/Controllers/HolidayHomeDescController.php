<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HolidayHomeDesc;

class HolidayHomeDescController extends Controller
{
    public function holidayHomeDesc()
    {
        $holiday_home_desc = HolidayHomeDesc::select(
            '*')
        ->get();

        return response()->json([
            'success' => true,
            'data' => $holiday_home_desc,
            'message'=> "Holiday Home Description fetched successfully"
        ]);
    }
}
