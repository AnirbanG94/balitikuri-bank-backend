<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\AdminCredential;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{


    public function login(Request $request)
    {


        $request->validate([

            'password'=>'required'

        ]);



        $admin =
        AdminCredential::first();



        if(!$admin ||
           !Hash::check($request->password,$admin->password))
        {


            return response()->json([

                'success'=>false,

                'message'=>'Invalid password'

            ],401);


        }



        return response()->json([

            'success'=>true,

            'isAdmin'=>true

        ]);

    }





    public function changePassword(Request $request)
    {


        $request->validate([

            'password'=>'required|min:6'

        ]);



        $admin =
        AdminCredential::first();



        $admin->update([

            'password'=>
            Hash::make($request->password)

        ]);



        return response()->json([

            'success'=>true,

            'message'=>'Password changed successfully'

        ]);


    }



}