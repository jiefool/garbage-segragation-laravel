<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use DB;
use Carbon\Carbon;
use App\Sent;

class ReportController extends Controller
{
    public function index(Request $request)
    {	
        if(!$request->has('month')){
            return view('report.index');
        }
    	$month = date('m');
        $year = date('Y');
        if(request('month') != null){
        $month = request('month');
         }
         if(request('year') != null){
          $year = request('year');
         }


    	$levels = Level::whereMonth('created_at',$month)->whereYear('created_at',$year)->where('area_id',request('area')+1)->orderBy('created_at', 'ASC')->get()
		    ->groupBy(function($date) {
		        return Carbon::parse($date->created_at)->format('d'); 
		    });

		if($request->action == 'print') {
		   	return view('report.print', compact('levels'));
		}
        $area = request('area');
    	return view('report.index', compact('levels','area'));
    }

    public function message(Request $request){
        if(!$request->has('date')){
            $sents = Sent::get();
            $date = 'All';
            if($request->has('print')){
                return view('report.index.print',compact('sents','date'));
            }
        }else{
            $sents = Sent::whereDate('created_at',$request->date)
                        ->get();
            $date = $request->date;
            if($request->has('print')){
                return view('report.message.print',compact('sents','date'));
            }
        }
        $area = request('area');
        return view('report.message.index',compact('sents','date','area'));
    }

}
