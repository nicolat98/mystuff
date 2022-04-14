<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;

class mailController extends Controller {

    public function index() {
        $dl = new DataLayer();
        $cart_lines = $dl->getCartLinesNotConfirmed(Auth::user()->id);
        return view('layouts.mail')->with('num_cart_lines', count($cart_lines));
    }

    public function send(Request $request) {

        $dl = new DataLayer();

        if (Auth::user() !== null) {
            $sender = Auth::user();
            $sender_email = $sender->email;
            $sender_name = $sender->name;
        }



        $receiver_email = "info@mystuff.com";
        $receiver_name = "myStuff";
        $subject = $request->input('subject');
        $message = $request->input('email');

        try {
            $client = new Client([
                // URI da contattare
                'base_uri' => 'http://localhost:8086',
                'timeout' => 60.0,
            ]);

            $response = $client->request('POST', '', [
                'form_params' => ['sender_email' => $sender_email, 'sender_name' => $sender_name, 'receiver_email' => $receiver_email, 'receiver_name' => $receiver_name, 'subject' => $subject, 'message' => $message],
                'headers' => ['source' => 'myStuff', 'content-type' => 'application/x-www-form-urlencoded', 'Accept' => 'application/json']
            ]);

            $result = json_decode($response->getBody());
            if ($result->result == "positive") {
                return Redirect::to(route('home'));
            } else {
                return Redirect::to(route('home'));
            }
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            return Redirect::to(route('home'));
        }
    }

}
