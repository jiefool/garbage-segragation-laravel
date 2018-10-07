<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;


class LevelController extends Controller
{
    
    public function store(){




       	
       	$level = request('level');
       	$centi = 0;
       	if($level == 1){

       	$centi = rand(100,150);
       	}
       	elseif ($level == 2) {
       	$centi = rand(151,200);
       	
       	}
       	elseif ($level == 3) {
       	$centi = rand(201,250);
       	
       	}
       	elseif ($level == 4) {
       	$centi = rand(251,300);
       	
       	}
       	elseif ($level == 5) {
       	$centi = rand(301,400);
       	
       	}
       	else{
       	$centi = rand(401,700);
       	

       	}

       	$data = new \App\Level;
       	$data->number = $level;
       	$data->centimeter = $centi;
       	$data->save();

       	return $data;


    }
}
