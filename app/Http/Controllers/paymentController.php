<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class paymentController extends Controller
{
    public function checkPayment(Request $request){
       $cardNumber =  $request->input('cardNumber');
       $expiration =  $request->input('expiration');
       $cvv =  $request->input('cvv');
       
       
       try {
            $client = new Client([
                // URI da contattare
                'base_uri' => 'http://localhost:8086',
                'timeout' => 60.0,
            ]);

            $response = $client->request('POST', '', [
                'form_params' => ['cardNumber' => $cardNumber, 'expiration' => $expiration, 'cvv' => $cvv],
                'headers' => ['source' => 'myStuff', 'content-type' => 'application/x-www-form-urlencoded', 'Accept' => 'application/json']
            ]);

            $result = json_decode($response->getBody());
            
            if ($result->result == "positive") {
                $responseJson = array("done" => true);
            } else {
                $responseJson = array("done" => false);
            }
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            $responseJson = array("done" => false);
        }
        
        
       return response()->json($responseJson);
    }
}
