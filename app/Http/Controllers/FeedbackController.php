<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mobile' => 'required|digits:10',
            'websiteSatisfaction' => 'required|string',
            'serviceSatisfaction' => 'required|string',
            'suggestions' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $feedback = Feedback::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'website_satisfaction' => $request->websiteSatisfaction,
            'service_satisfaction' => $request->serviceSatisfaction,
            'suggestions' => $request->suggestions
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Feedback submitted successfully.',
            'data' => $feedback
        ], 201);
    }

    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Feedback::latest()->get()
        ]);
    }

   public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:500',
        'ph_no' => 'required|digits:10',
        'websiteSatisfaction' => 'required|string',
        'serviceSatisfaction' => 'required|string',
        'suggestions' => 'nullable|string',
    ]);

    $customer = Feedback::findOrFail($id);

    $customer->update([
        'name' => $request->name,
        'address' => $request->address,
        'ph_no' => $request->ph_no,
        'website_satisfaction' => $request->websiteSatisfaction,
        'service_satisfaction' => $request->serviceSatisfaction,
        'suggestions' => $request->suggestions,
    ]);

    return response()->json([
        'status' => true,
        'message' => 'Feedback updated successfully.',
        'data' => $customer,
    ]);

}
}