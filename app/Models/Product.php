<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // model relationship 
    function category(){
        return $this->belongsTo(Category::class);
    }
    function orderItems(){
        return $this->hasMany(Order_Items::class);
    }
}
