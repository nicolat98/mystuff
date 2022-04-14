<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    protected $table = 'cart';
    protected $fillable =['creation_date','confirm_date', 'id_user'];
    public $timestamps = false;
    
    public function cart_lines(){
        return $this->hasMany(CartLine::class);
    }
    
    public function user(){ //inserire il riferimento nella classe user
        return $this->belongsTo(User::class,'id_user');
    }
    
    public function shipments(){
        return $this->hasMany(Shipment::class);
    }
}
