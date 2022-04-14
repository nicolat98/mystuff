<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class purchaseController extends Controller
{
    public function index($id_cart){
        $dl = new DataLayer();
        
        $cart_lines = $dl->getCartLinesNotConfirmed(Auth::user()->id);
        return view('cart.purchase')->with("id_cart", $id_cart)->with('num_cart_lines', count($cart_lines));
    }
}
