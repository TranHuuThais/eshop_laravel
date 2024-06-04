<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // model relationship 
    protected $fillable =['img','name','description','price','quantity','category_id'];
    function category(){
        return $this->belongsTo(Category::class);
    }
    function orderItems(){
        return $this->hasMany(OrderItems::class);
    }


}
