<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class watchController extends Controller
{
    public function index() {

        $dl = new DataLayer();
        
        $feedbacks = $dl->getFeedbacksByCategory(3);
        //$reviews =array();
        
        if(count($feedbacks) === 0){
            $total_score = 0;
            $reviews = null;
            $num=0;
        }else{
            $sum = 0;
            $num = count($feedbacks);
            
            foreach($feedbacks as $feedback){
                  $sum = $sum + $feedback->score;  
                  //array_push($reviews, $feedback->comment);
            }
            
            $total_score = $sum / $num;
        }
        
        if (Auth::user() !== null) {
            $cart_lines = $dl->getCartLinesNotConfirmed(Auth::user()->id);
            return view('product.watch')
                    ->with('total_score', number_format($total_score,1))
                    ->with('feedbacks', $feedbacks)
                    ->with('numFeedbacks', $num)
                    ->with('num_cart_lines', count($cart_lines));
        }else{
            return view('product.watch')
                    ->with('total_score', number_format($total_score,1))
                    ->with('numFeedbacks', $num)
                    ->with('feedbacks', $feedbacks);
        }
    }
    
    public function store(Request $request){
        $name = $request->input('inputNameWA');
        $price = $request->input('inputPriceWA');
        $category = $request->input('inputCategoryWA');
        $capacity = $request->input('inputCapacityWA');
        $model = $request->input('inputModelWA');
        $assurance = $request->input('inputAssuranceWA');
        $color = $request->input('inputColorWA');
        $quantity = $request->input('inputQuantityWA');
        
        $dl = new DataLayer();
        
        $product = $dl->getProduct($color, $model, $assurance, $capacity,3);
        
        //print_r($quantity);
        
        if($product === null){
            $dl->addProduct($name, $price, $category,$capacity,$model,$assurance,$color);
            $product = $dl->getProduct($color, $model, $assurance, $capacity,3);
        }
        
        //ottengo l'utente e il relativo carrello
        $id_user = Auth::user()->id;
        $cart = $dl->getCartNotConfirmed($id_user);
        
        //aggiungo una riga al carrello
        $dl->addCartLine($product->{'price'}*$quantity, $cart->{'id'}, $product->{'id'}, $quantity, date("Y/m/d"));
        
        return Redirect::to(route('cart.index'));
        //return;
    }
}
