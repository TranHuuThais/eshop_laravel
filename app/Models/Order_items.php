<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    use HasFactory;
    // model relationship 
    function product(){
        return $this->belongsTo(Product::class);
    }
    function order(){
        return $this->belongsTo(Order::class);
    }
}
