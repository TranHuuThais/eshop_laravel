<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItems;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    // Lấy ngày hôm nay
    $today = Carbon::today();
    // Lấy số lượng đơn hàng và tổng doanh thu cho ngày hôm nay
    $totalOrdersToday = Order::whereDate('created_at', $today)->count();
    $totalRevenueToday = Order::whereDate('created_at', $today)->sum('total');
    // Lấy ngày đầu tiên của tháng hiện tại
    $startOfMonth = Carbon::now()->startOfMonth();
    // Lấy ngày cuối cùng của tháng hiện tại
    $endOfMonth = Carbon::now()->endOfMonth();
    // Lấy số lượng đơn hàng và tổng doanh thu trong tháng
    $totalOrdersThisMonth = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
    $totalRevenueThisMonth = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('total');
    // Lấy tổng số lượng đơn hàng và tổng doanh thu của tất cả các đơn hàng
    $totalOrders = Order::count();
    $totalRevenue = Order::sum('total');

    // Lấy 10 mục đơn hàng gần nhất
    $orderItems = OrderItems::latest()->take(10)->get();

    return view('admin.home.index', compact('orderItems', 'totalOrdersToday', 'totalRevenueToday', 'totalOrdersThisMonth', 'totalRevenueThisMonth', 'totalOrders', 'totalRevenue'));
  }
}
