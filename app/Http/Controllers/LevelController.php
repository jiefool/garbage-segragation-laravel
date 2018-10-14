<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;

use App\Sent;

class LevelController extends Controller
{
    
    public function store(){


           
              $config = Configuration::getDefaultConfiguration();
              $config->setApiKey('Authorization','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTUzOTQ4NzQ4MiwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjYyNjUxLCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.yWx_v_lUyN-9PwgqhBFHoiMEXx2EWCe2oXzndgQG470');
              $apiClient = new ApiClient($config);
                  $messageClient = new MessageApi($apiClient);


            
            $level = request('level');
            $centi = 0;
            if($level == 1){

            $centi = rand(15,20);
            }
            elseif ($level == 2) {
            $centi = rand(35,40);
            
            }
            elseif ($level == 3) {
            $centi = rand(55,60);
            
            }
            elseif ($level == 4) {
            $centi = rand(75,80);


            $contactList = \App\Contact::all();
            $contacts = [];

            foreach ($contactList as $contact) {
                  $msg = 'Ang tubig ning aksyon na ug saka pag bantay bantay namo';
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
            elseif ($level == 5) {
            $centi = rand(95,100);

            $contactList = \App\Contact::all();
            $contacts = [];

            foreach ($contactList as $contact) {

              $msg = 'Palihug uli na inyong balay kay hapit na mobaha';
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
            $centi = rand(110,200);
            $contactList = \App\Contact::all();
            $contacts = [];

            foreach ($contactList as $contact) {
                $msg = 'Pahibalo dagan namo kay ang tubig ning nasaka na!';
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
            $data->centimeter = $centi;
            $data->save();

            return $data;


    }
}
