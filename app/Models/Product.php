<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'product';
    protected $fillable = ['name','price','id_category','capacity','model','assurance','color']; 
    public $timestamps = false;
    
    public function category(){
        return $this->belongsTo(Category::class, 'id_category');
    }
    
    public function cart_lines(){
        return $this->hasMany(CartLine::class);
    }
    
    
}
