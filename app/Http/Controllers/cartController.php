<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller {

    public function index() {
        $dl = new DataLayer();

        $cart_lines = $dl->getCartLinesNotConfirmed(Auth::user()->id);
        //print_r($cart_lines);

        $cart_lines = $dl->getCartLinesNotConfirmed(Auth::user()->id);
        return view('cart.cart')
                        ->with('cartLines', $cart_lines);
    }

    //aggiunge la data di creazione e crea un nuovo carrello (vuoto) all'utente
    public function order(Request $request) {

        $dl = new DataLayer();
        $id_cart = $request->input('id_cart');
        $cart = $dl->getCartByID($id_cart);

        $dl->updateCart($id_cart, \date("Y/m/d"));

        $user = $dl->getUserByIDCart($id_cart);

        //creo un nuovo carrello associato all'utente
        \App\Models\Cart::create([
            'creation_date' => date("Y/m/d"),
            'confirm_date' => null,
            'id_user' => $user->id,
        ]);

        $response = array("done" => true);

        return response()->json($response);
    }

    public function removeLine(Request $request) {
        $dl = new DataLayer();

        $cart_line = $dl->getCartLineByID($request->input('cart_line_id'));

        $id_cart = $cart_line->id_cart;

        $dl->removeCartLineById($request->input('cart_line_id'));

        $total_price = $dl->totalPriceByCartId($id_cart);

        $cart_lines = $dl->getCartLinesByCartID($id_cart);

        $response = array("done" => true, 'total_price' => $total_price, 'num_cart_lines' => count($cart_lines));

        return response()->json($response);
    }

    public function showPurchase($id_cart) {
        $dl = new DataLayer();

        $cart_lines = $dl->getCartLinesNotConfirmed(Auth::user()->id);
        return view('cart.purchase')->with("id_cart", $id_cart)->with('cart_lines', $cart_lines);
    }

}
