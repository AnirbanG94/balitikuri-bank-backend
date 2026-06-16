<?php

namespace App\Http\Controllers;

use App\Models\HomePageCard;

class HomePageCardController extends Controller
{
    public function index()
    {
        $cards = HomePageCard::select(
            'id',
            'title',
            'content',
            'old_site',
            'old_to_new',
            'new_site',
            'redirection_logic'
        )
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'data' => $cards,
            'message'=> "Home page data fetched successfully"
        ]);
    }
}