<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
    protected $table = 'shipment';
    protected $fillable = ['id_user','id_cart','user_name','user_surname', 'address', 'city','province', 'CAP', 'country', 'shipment_date', 'telephone_number','status'];
    public $timestamps = false;
    
    public function cart(){
        return $this->belongsTo(Cart::class, 'id_cart');
    }
    
    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
}
