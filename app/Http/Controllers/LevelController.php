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


                  $sendMessageRequest = new SendMessageRequest([
                      'phoneNumber' => $contact->contact,
                      'message' => 'Ang tubig ning aksyon na ug saka pag bantay bantay namo',
                      'deviceId' => 96102
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


                  $sendMessageRequest = new SendMessageRequest([
                      'phoneNumber' => $contact->contact,
                      'message' => 'Palihug uli na inyong balay kay hapit na mobaha',
                      'deviceId' => 96102
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
