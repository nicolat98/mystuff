<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller {

    public function getHome() {
        $dl = new DataLayer();

        if (Auth::user() !== null) {
            $cart_lines = $dl->getCartLinesNotConfirmed(Auth::user()->id);
            $num_cart_lines = count($cart_lines);
            return view('index')->with('num_cart_lines', $num_cart_lines);
        } else {

            return view('index');
        }
    }
    
    

}
