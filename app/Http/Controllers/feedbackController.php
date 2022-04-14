<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DataLayer;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;

class feedbackController extends Controller
{
    public function add(Request $request){
        $newScore = $request->input('newScoreForm');
        //print($request->input('newScoreForm'));
        $newReview = $request->input('review');
        
        if($newReview === null){
            $newReview = "";
        }
        
        
        
        $idCategory = $request->input('idCategoryForm');
        
        //print_r($newReview);
        //print_r($newScore);
        //print_r($idCategory);
        
        
        $id_user = Auth::user()->id;
        $date = date("Y/m/d");
        
        $dl = new DataLayer();
        
        $dl->addFeedback($id_user, $idCategory, $newScore, $newReview, $date);
        
        //print_r($idCategory);
        
        
        if($idCategory == 1){
            return Redirect::to(route('smartphone.index'));
        }else if($idCategory == 2){
            return Redirect::to(route('computer.index'));
        }else{
            return Redirect::to(route('watch.index'));
        }
    }
}
