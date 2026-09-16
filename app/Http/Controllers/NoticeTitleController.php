<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoticeTitle;

class NoticeTitleController extends Controller
{
    public function getNoticeTitleDescriptions(){
        $notice_title_desc = NoticeTitle::select('*')->get();

        return response()->json([
            'success' => true,
            'data' => $notice_title_desc,
            'message'=> "Notice Title data fetched successfully"
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([

            'title' => 'required',

            'notice_date' => 'required',


        ]);


        $notice_title = NoticeTitle::find($id);
        // $notice_title = new NoticeTitle();   
        $notice_title->title = $request->title;
        
        $notice_title->notice_date = $request->notice_date;
       
        

        $notice_title->save();

        if(!$notice_title){

            return response()->json([
                'status'=>false,
                'message'=>'Account not found'
            ],404);

        }


        $notice_title->update($validated);


        return response()->json([

            'status'=>true,

            'message'=>'Account updated successfully',

            'data'=>$notice_title

        ]);

    }
}
