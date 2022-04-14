<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ordersController extends Controller {

    public function index() {

        if (Auth::user()->name === "admin") {
            $dl = new DataLayer();

            $carts = $dl->getAllCartsConfirmed();

            if ($carts->isEmpty()) {
                //return Redirect::to(route('home')); //magari inserire messaggio
                $cart_lines_not = $dl->getCartLinesNotConfirmed(Auth::user()->id);
                return view('orders.orders')->with('orders', $carts)->with('num_cart_lines', count($cart_lines_not));
            } else {
                $cart_lines = $dl->getCartLinesConfirmed();
                $cart_lines_not = $dl->getCartLinesNotConfirmed(Auth::user()->id);
                $shipments = $dl->getAllShipments();
                return view('orders.orders')->with('orders_lines', $cart_lines)->with('shipments', $shipments)->with('orders', $carts)->with('num_cart_lines', count($cart_lines_not));
            }
        } else {
            $dl = new DataLayer();

            $carts = $dl->getCartConfirmedByUserID(Auth::user()->id);


            if ($carts->isEmpty()) {
                $cart_lines_not = $dl->getCartLinesNotConfirmed(Auth::user()->id);
                return view('orders.orders')->with('orders', null)->with('num_cart_lines', count($cart_lines_not));
            } else {
                $cart_lines = $dl->getCartLinesConfirmedByUserID(Auth::user()->id);
                $cart_lines_not = $dl->getCartLinesNotConfirmed(Auth::user()->id);
                $shipments = $dl->getShipmentByUserID(Auth::user()->id);
                return view('orders.orders')->with('orders_lines', $cart_lines)->with('shipments', $shipments)->with('orders', $carts)->with('num_cart_lines', count($cart_lines_not));
            }
        }
    }

    public function store(Request $request) {
        $dl = new DataLayer();

        $name = $request->input('nameInput');
        $surname = $request->input('surnameInput');
        $street = $request->input('streetInput');
        $city = $request->input('cityInput');
        $cap = $request->input('capInput');
        $province = $request->input('provinceInput');
        $country = $request->input('countryInput');
        $mail = $request->input('mailInput');
        $cellNumber = $request->input('cellNumberInput');
        $id_cart = $request->input('idCartInput');
        $namePay = $request->input('nameInputPay');
        $surnamePay = $request->input('surnameInputPay');
        $cardNumber = $request->input('cardNumberInput');
        $expiration = $request->input('expirationInput');
        $cvv = $request->input('cvvInput');


        //$mail = $dl->getMailByUserID(Auth::user()->id);
        //print_r($mail);

        $dl->addShipment(Auth::user()->id, $id_cart, $name, $surname, $street, $city, $cap, strtoupper($province), $country, $cellNumber);


        $cart = $dl->getCartByID($id_cart);

        $dl->updateCart($id_cart, \date("Y/m/d"));

        $user = $dl->getUserByIDCart($id_cart);


        //creo un nuovo carrello associato all'utente
        \App\Models\Cart::create([
            'creation_date' => date("Y/m/d"),
            'confirm_date' => null,
            'id_user' => $user->id,
        ]);

        return Redirect::to(route('cart.index'));
    }

    public function updateOrder(Request $request) {
        $dl = new DataLayer();
        $shipmentID = $request->input('shipment_id');
        $status = $request->input('status');

        $dl->updateOrder($shipmentID, $status);

        $response = array("done" => true, 'status' => $status);

        return response()->json($response);
    }

}
