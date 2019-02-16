<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;
use App\Http\Resources\LevelResource;
use App\Sent;

class LevelController extends Controller
{
    
    public function store(){


           
              $config = Configuration::getDefaultConfiguration();
              $config->setApiKey('Authorization','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTUzOTQ4NzQ4MiwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjYyNjUxLCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.yWx_v_lUyN-9PwgqhBFHoiMEXx2EWCe2oXzndgQG470');
              $apiClient = new ApiClient($config);
                  $messageClient = new MessageApi($apiClient);


            $area_id = 1;
            $level = request('level');

            if($level > 100){
              $area_id = 2;
              $level = $level - 100;
            }
            $centi = 0;
            if($level == 1){

            $centi = rand(0,4);
            }
            elseif ($level == 2) {
            $centi = rand(5,9);
            
            }
            elseif ($level == 3) {
            $centi = rand(10,14);
            
            }
            elseif ($level == 4) {
            $centi = rand(15,19);

            }
            elseif ($level == 5) {
            $centi = rand(20,24);

            $contactList = \App\Contact::all();
            $contacts = [];

            foreach ($contactList as $contact) {

              $msg = 'Pahibalo hapit na mapuno ang basurahan';
                   $send = new Sent;
                  $send->message = $msg;
                  $send->contact_id = $contact->id;
                  $send->save();
                  

                  $sendMessageRequest = new SendMessageRequest([
                      'phoneNumber' => $contact->contact,
                      'message' => $msg,
                      'deviceId' => 103567
                  ]);

                  array_push($contacts, $sendMessageRequest);

            }
            $sendMessages = $messageClient->sendMessages($contacts);

            
            }
            else{
            $centi = rand(25,30);
            $contactList = \App\Contact::all();
            $contacts = [];

            foreach ($contactList as $contact) {
                $msg = 'Palihug ug kuha sa basura sa basurahan kay puno na siya';
                  $send = new Sent;
                  $send->message = $msg;
                  $send->contact_id = $contact->id;
                  $send->save();
                  $sendMessageRequest = new SendMessageRequest([
                      'phoneNumber' => $contact->contact,
                      'message' => $msg,
                      'deviceId' => 103567
                  ]);

                  array_push($contacts, $sendMessageRequest);

            }
            $sendMessages = $messageClient->sendMessages($contacts);

            }

            $data = new \App\Level;
            $data->number = $level;
            $data->area_id = $area_id;
            $data->centimeter = $centi;
            $data->save();

            return new LevelResource($data);


    }
}
