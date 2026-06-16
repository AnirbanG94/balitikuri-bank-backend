<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChairmanSpeech;

class ChairmanSpeechController extends Controller
{
    public function index()
    {
        $chairman_speech = ChairmanSpeech::select(
            'id',
            'contents',
            'body_one',
            'body_two',
            'body_three',
            'body_four',
            'body_five',
            'body_six',
            'regards',
            'chairman_title',
            'chairman_name',
           
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $chairman_speech,
            'message'=> "Chairman Speech data fetched successfully"
        ]);
    }
}
