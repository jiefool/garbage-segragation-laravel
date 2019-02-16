<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(){
        $labels = array();
        $values = array();
        $current = new Level;
        $levels = Level::whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->orderBy('created_at', 'ASC')->get();
        $levelsA = [];
        $levelsB = [];        
        $labelsA = [];
        $labelsB = [];
        $valuesA = [];
        $valuesB = [];
        foreach ($levels as $level) {
            array_push($labels, $level->created_at->format('H:i A'));
            array_push($values, $level->centimeter);
            if($level->area_id == 1){
                array_push($levelsB, $level);
                array_push($labelsA, $level->created_at->format('h:i A'));
                array_push($valuesA, $level->centimeter);
            }else{
                array_push($levelsB, $level);
                array_push($labelsB, $level->created_at->format('h:i A'));
                array_push($valuesB, $level->centimeter);
            }
        }

        $currentA = Level::where('area_id', 1)->orderBy('created_at', 'DESC')->first();
        $currentB = Level::where('area_id', 2)->orderBy('created_at', 'DESC')->first();


        $current_movement = Level::orderBy('created_at', 'DESC')->take(2)->get()->toArray();

        $cur_movement = $current_movement[0]['centimeter'] ? $current_movement[0]['centimeter'] : 1;
        $current_avg = (1 - $current_movement[1]['centimeter'] / $cur_movement) * 100;
        $current_label = 'Increased';

        if ($current_movement[1]['centimeter'] > $current_movement[0]['centimeter']) {
            $current_label = 'Decreased';
        }

        $daily_avg = Level::whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->avg('centimeter');
        $yesterday_avg = Level::whereDay('created_at', Carbon::yesterday()->format('d'))->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->avg('centimeter');

        $daily_label = 'Increased';

        $day_avg = (1 - $yesterday_avg / $daily_avg) * 100;

        if ($daily_avg < $yesterday_avg) {
            $daily_label = 'Decreased';
        }

        // $hour = Level::whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('created_at', '>=', Carbon::now()->subHour())->avg('centimeter');
        // dd($hour);

        return view('index', compact('labels', 'values', 'currentA', 'currentB', 'current_avg', 'current_label', 'daily_avg', 'daily_label', 'day_avg', 'current'));
    }
    public function index()
    {
        $levels = Level::whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->orderBy('created_at', 'ASC')->get();
        $levelsA = [];
        $levelsB = [];        
        $labelsA = [];
        $labelsB = [];
        $valuesA = [];
        $valuesB = [];
        foreach ($levels as $level) {
            if($level->area_id == 1){
                array_push($levelsB, $level);
                array_push($labelsA, $level->created_at->format('h:i A'));
                array_push($valuesA, $level->centimeter);
            }else{
                array_push($levelsB, $level);
                array_push($labelsB, $level->created_at->format('h:i A'));
                array_push($valuesB, $level->centimeter);
            }
        }


        
        $currentA = Level::where('area_id', 1)->orderBy('created_at', 'DESC')->first();
        $currentB = Level::where('area_id', 2)->orderBy('created_at', 'DESC')->first();

        $current_movementA = Level::where('area_id', 1)->orderBy('created_at', 'DESC')->take(2)->get()->toArray();
        $current_movementB = Level::where('area_id', 2)->orderBy('created_at', 'DESC')->take(2)->get()->toArray();


        $current_avgA = (1 - $current_movementA[1]['centimeter'] / $current_movementA[0]['centimeter']) * 100;
        $current_avgB = (1 - $current_movementB[1]['centimeter'] / $current_movementB[0]['centimeter']) * 100;
        $current_labelA = 'Increased';
        $current_labelB = 'Increased';


        if ($current_movementA[1]['centimeter'] > $current_movementA[0]['centimeter']) {
            $current_labelA = 'Decreased';
        }
        if ($current_movementB[1]['centimeter'] > $current_movementB[0]['centimeter']) {
            $current_labelB = 'Decreased';
        }

        $daily_avgA = Level::where('area_id', 1)->whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->avg('centimeter');
        $daily_avgB = Level::where('area_id', 2)->whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->avg('centimeter');

        $yesterday_avgA = Level::where('area_id', 1)->whereDay('created_at', Carbon::yesterday()->format('d'))->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->avg('centimeter');

        $yesterday_avgB = Level::where('area_id', 1)->whereDay('created_at', Carbon::yesterday()->format('d'))->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->avg('centimeter');

        $daily_labelA = 'Increased';
        $daily_labelB = 'Increased';

        $day_avgA = (1 - $yesterday_avgA / $daily_avgB) * 100;
        $day_avgB = (1 - $yesterday_avgA / $daily_avgB) * 100;


        if ($daily_avgA < $yesterday_avgA) {
            $daily_labelA = 'Decreased';
        }

        if ($daily_avgB < $yesterday_avgB) {
            $daily_labelB = 'Decreased';
        }

        // $hour = Level::whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('created_at', '>=', Carbon::now()->subHour())->avg('centimeter');
        // dd($hour);

        return view('home', compact('labelsA', 'valuesA', 'labelsB', 'valuesB','currentA', 'currentB', 'current_avgA','current_avgB','current_labelA','current_labelB', 'daily_avgA', 'daily_avgB', 'daily_labelA', 'daily_labelB', 'day_avgA', 'day_avgB'));
    }
}
