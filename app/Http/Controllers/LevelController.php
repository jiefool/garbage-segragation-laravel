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
       	$config = Configuration::getDefaultConfiguration();
		  $config->setApiKey('Authorization','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTUzMTM2Njg5MywiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjU2NjUwLCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.vQruu6mozvzOLZZk6SdkQglx0tdolQrzup5em7EhYf8');
		$apiClient = new ApiClient($config);
		$messageClient = new MessageApi($apiClient);
		$contactList = \App\Contact::all();
		$contacts = [];

		foreach ($contactList as $contact) {


			$sendMessageRequest = new SendMessageRequest([
			    'phoneNumber' => $contact->contact,
			    'message' => 'Pahibalo dagan namo kay ang tubig ning nasaka na!',
			    'deviceId' => 96102
			]);

			array_push($contacts, $sendMessageRequest);

		}
		$sendMessages = $messageClient->sendMessages($contacts);

       	}

       	$data = new \App\Level;
       	$data->number = $level;
       	$data->centimeter = $centi;
       	$data->save();

       	return $data;


    }
}
