<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpenFeedBackForm;

class OpenFeedBackFormController extends Controller
{
        public function store(Request $request)
        {
            $feedback = OpenFeedBackForm::create([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'web_satisfaction' => $request->websiteSatisfaction,
                'service_satisfaction' => $request->serviceSatisfaction,
                'suggestions' => $request->suggestions,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Application submitted successfully',
                'data' => $feedback
            ]);
        }
}
