<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dl = new DataLayer();
        
        $cart_lines = $dl->getCartLinesNotConfirmed(Auth::user()->id);
        
        $num_cart_lines = count($cart_lines);
        
        //print_r($num_cart_lines);
        
        //return view('index')->with('num_cart_lines', $num_cart_lines);
    }
}
