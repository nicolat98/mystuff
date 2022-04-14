<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    
    protected $table = 'feedback';
    protected $fillable = ['id_user','id_category','score','comment','date'];
    public $timestamps = false;
    
    public function user(){ //inserire anche nella classe user il riferimento
        return $this->belongsTo(User::class, 'id_user');
    }
    
    public function category(){
        return $this->belongsTo(Category::class, 'id_category');
    }
}
