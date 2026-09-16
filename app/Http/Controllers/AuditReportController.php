<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AuditReport;

class AuditReportController extends Controller
{

    public function index()
        {
            $reports = AuditReport::latest()->get();

            return response()->json([
                'status' => true,
                'data' => $reports->map(function ($report) {
                    return [
                        'id' => $report->id,
                        'audit_year' => $report->audit_year,
                        'report_name' => $report->report_name,
                        'pdf_url' => asset('storage/' . $report->pdf_path)
                    ];
                })
            ]);
        }
    public function upload(Request $request)
    {

        $request->validate([

            'audit_year'=>'required',

            'report_name'=>'required',

            'pdf'=>'required|mimes:pdf'

        ]);

        $path=$request
        ->file('pdf')
        ->store('audit_reports','public');

        $report=AuditReport::create([

            'audit_year'=>$request->audit_year,

            'report_name'=>$request->report_name,

            'pdf_path'=>$path

        ]);

        return response()->json([

            'message'=>'Uploaded',

            'data'=>$report

        ]);

    }

}