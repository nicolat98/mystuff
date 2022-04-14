<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartLine extends Model
{
    use HasFactory;
    protected $table = 'cart_line';
    protected $fillable = ['id_cart','id_product', 'quantity', 'total_price','add_date'];
    public $timestamps = false;
    
    public function cart(){
        return $this->belongsTo(Cart::class, 'id_cart');
    }
    
    
    public function product(){
        return $this->belongsTo(Product::class,'id_product');
    }
}
