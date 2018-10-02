<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {	
    	$month = date('m');
                            $year = date('Y');
                            if(request('month') != null){
                            $month = request('month');
                             }
                             if(request('year') != null){
                              $year = request('year');
                             }

    	$levels = Level::whereMonth('created_at',$month)->whereYear('created_at',$year)->orderBy('created_at', 'ASC')->get()
		    ->groupBy(function($date) {
		        return Carbon::parse($date->created_at)->format('d'); 
		    });

		if ($request->action == 'print') {
		   	return view('report.print', compact('levels'));
		}   
    	return view('report.index', compact('levels'));
    }

}
