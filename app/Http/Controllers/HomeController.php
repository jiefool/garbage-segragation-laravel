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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->orderBy('created_at', 'ASC')->get();

        $labels = [];
        $values = [];

        foreach ($levels as $level) {
            array_push($labels, $level->created_at->format('H:i A'));
            array_push($values, $level->centimeter);
        }

        $current = Level::orderBy('created_at', 'DESC')->first();

        $current_movement = Level::orderBy('created_at', 'DESC')->take(2)->get()->toArray();

        $current_avg = (1 - $current_movement[1]['centimeter'] / $current_movement[0]['centimeter']) * 100;
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

        return view('home', compact('labels', 'values', 'current', 'current_avg', 'current_label', 'daily_avg', 'daily_label', 'day_avg'));
    }
}
