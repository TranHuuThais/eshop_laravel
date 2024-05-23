<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $orderList = Order::all();
      return view('Admin.orders.index',['orderList' => $orderList]);
    }

 
}
