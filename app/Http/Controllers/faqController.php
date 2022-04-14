<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;

class faqController extends Controller
{
    public function index(){
        $dl = new DataLayer();
        if(Auth::user()){
           $cart_lines = $dl->getCartLinesNotConfirmed(Auth::user()->id);
           $num = count($cart_lines);
        }else{
            $num = 0;
        }
        
        return view('layouts.faq')->with('num_cart_lines', $num);
    }
}
