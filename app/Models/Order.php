<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // model relationship 
    protected $fillable =['user_id','code','status'];
    function user(){
        return $this->belongsTo(User::class);
    }
    function orderItems(){
        return $this->hasMany(Order_Items::class);
    }
}