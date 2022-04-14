<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataLayer extends Model {

    public function getCategories() {
        return Category::get();
    }

    public function getProducts() {
        return Product::get();
    }

    public function getUsers() {
        return User::get();
    }

    public function getProductsByCategory($category) {
        return Product::where('id_category', $category)->orderBy('id')->get();
    }

    public function getProduct($color, $model, $assurance, $capacity, $id_category) {
        return DB::table("product")->where('color', $color)
                        ->where('model', $model)
                        ->where('assurance', $assurance)
                        ->where('capacity', $capacity)
                        ->where('id_category', $id_category)
                        ->get()->first();
    }

    public function getProductByID($id_product) {
        $product = Product::where('id', $id_product)->get();
        return $product[0];
    }

    public function addCart($creation_date, $confirm_date, $id_user) {
        $cart = new Cart;
        $cart->creation_date = $creation_date;
        $cart->confirm_date = $confirm_date;
        $cart->id_user = $id_user;
        $cart->save();
    }

    public function addCartLine($total_price, $id_cart, $id_product, $quantity, $add_date) {
        $cartLine = new CartLine;
        $cartLine->total_price = $total_price;
        $cartLine->id_cart = $id_cart;
        $cartLine->id_product = $id_product;
        $cartLine->quantity = $quantity;
        $cartLine->add_date = $add_date;
        $cartLine->save();
    }

    public function addFeedback($id_user, $id_category, $score, $comment, $date) {
        $feedback = new Feedback();
        $feedback->id_user = $id_user;
        $feedback->id_category = $id_category;
        $feedback->score = $score;
        $feedback->comment = $comment;
        $feedback->date = $date;
        $feedback->save();
    }

    public function getFeedbacksByCategory($id_category) {
        $feedbacks = Feedback::where('id_category', $id_category)->get();

        return $feedbacks;
    }

    public function addProduct($name, $price, $id_category, $capacity, $model, $assurance, $color) {
        $product = new Product();
        $product->name = $name;
        $product->price = $price;
        $product->id_category = $id_category;
        $product->capacity = $capacity;
        $product->model = $model;
        $product->assurance = $assurance;
        $product->color = $color;
        $product->save();
    }
    
    public function addShipment($id_user,$id_cart, $name, $surname, $street, $city, $cap, $province, $country, $cellNumber){
        $shipment = new Shipment();
        $shipment->id_user = $id_user;
        $shipment->id_cart = $id_cart;
        $shipment->user_name = $name;
        $shipment->user_surname = $surname;
        $shipment->address = $street;
        $shipment->city = $city;
        $shipment->province = $province;
        $shipment->country = $country;
        $shipment->CAP = $cap;
        $shipment->id_user = $id_user;
        $shipment->telephone_number = $cellNumber;
        $shipment->status = 0;
        $shipment->save();
        
    }

    public function getUserID($name) {
        $users = User::where('name', $name)->get(['id']);
        return $users[0]->id;
    }

    public function getCartNotConfirmed($id_user) {
        $cart = Cart::where('id_user', $id_user)->where('confirm_date', null)->get();
        return $cart[0];
    }

    public function getCartConfirmedByUserID($id_user) {
        $carts = Cart::where('id_user', $id_user)->where('confirm_date', '!=', null)->get();
        return $carts;
    }

    public function getAllCartsConfirmed() {
        $carts = Cart::where('confirm_date', '!=', null)->get();
        return $carts;
    }

    public function getCart($id_user) {
        $cart = Cart::where('id_user', $id_user)->get();
        return $cart[0];
    }

    public function getCartByID($id_cart) {
        $cart = Cart::where('id', $id_cart)->get();
        return $cart[0];
    }

    public function getCartLinesNotConfirmed($id_user) {
        $dl = new DataLayer();

        $cart = $dl->getCartNotConfirmed($id_user);

        $cart_lines = CartLine::where('id_cart', $cart->id)->get();
        return $cart_lines;
    }

    public function getCartLinesConfirmed() {
        $dl = new DataLayer();

        $carts = $dl->getAllCartsConfirmed();

        $cart_lines = CartLine::where('id_cart', $carts[0]->id)->get();

        if (count($carts) > 1) {
            for ($i = 1; $i < count($carts); $i++) {
                $linesToAdd = CartLine::where('id_cart', $carts[$i]->id)->get();

                foreach ($linesToAdd as $line) {
                    $cart_lines->push($line);
                }
            }
        }


        return $cart_lines;
    }

    public function getCartLinesConfirmedByUserID($id_user) {
        $dl = new DataLayer();

        $carts = $dl->getCartConfirmedByUserID($id_user);

        $cart_lines = CartLine::where('id_cart', $carts[0]->id)->get();
        if (count($carts) > 1) {
            for ($i = 1; $i < count($carts); $i++) {
                $linesToAdd = CartLine::where('id_cart', $carts[$i]->id)->get();

                foreach ($linesToAdd as $line) {
                    $cart_lines->push($line);
                }
            }
        }


        return $cart_lines;
    }

    public function getCartLineByID($id) {
        $cart_line = CartLine::where('id', $id)->get();
        return $cart_line[0];
    }

    public function getCartLineByCartID($id_cart) {
        $cart_line = CartLine::where('id_cart', $id_cart)->get();
        return $cart_line[0];
    }

    public function getCartLinesByCartID($id_cart) {
        $cart_lines = CartLine::where('id_cart', $id_cart)->get();
        return $cart_lines;
    }

    public function getUserByIDCart($id_cart) {
        $cart = Cart::where('id', $id_cart)->get();
        $id_user = $cart[0]->id_user;

        //print_r($id_user);

        $user = User::find($id_user);

        //print_r($user->id);
        return $user;
    }

    public function removeCartLineById($id) {
        CartLine::find($id)->delete();
    }

    public function updateCart($id_cart, $confirm_date) {
        $cart = Cart::find($id_cart);

        $cart->confirm_date = $confirm_date;
        $cart->save();
    }

    public function totalPriceByCartId($id_cart) {
        $dl = new DataLayer();

        $cartLines = $dl->getCartLinesByCartID($id_cart);
        $total_price = 0;
        foreach ($cartLines as $line) {
            $total_price = $total_price + $line->total_price;
        }
        return number_format($total_price, 2, '.', '');
    }
    
    public function getMailByUserID($userID){
        $users = User::where('id', $userID)->get();
        return $users[0]->email;
    }
    
    public function getShipmentByUserID($user_id){
        $shipments = Shipment::where('id_user', $user_id)->get();
        return $shipments;
    }
    
    public function getAllShipments(){
        $shipments = Shipment::get();
        return $shipments;
    }
    
    public function updateOrder($shipment_id, $new_status){
        $shipment = Shipment::where('id', $shipment_id)->get();
        $shipment[0]->status = $new_status;
        if($new_status > 1){
            $shipment[0]->shipment_date = \date("Y/m/d");
        }
        
        $shipment[0]->save();
    }

}
