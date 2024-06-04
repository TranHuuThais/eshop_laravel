<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Hiển thị trang thanh toán
    public function index()
    {
        $total = $this->calculateCartTotal(); // Tính tổng ở đây nếu cần
        $user = Auth::user();
        return view('home.checkout', compact('total', 'user'));
    }

    // Xử lý yêu cầu đặt hàng
    public function placeOrder(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Add required validation for the name field
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'status' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'code' => 'required|string|max:50',
        ], [
            'name.required' => 'Vui lòng nhập tên của bạn.', // Custom error message for the name field
            'email.required' => 'Vui lòng nhập email của bạn.', // Custom error message for the name field
        ]);

        // Kiểm tra người dùng đã đăng nhập
        if (Auth::check()) {
            // Tạo một thể hiện đơn hàng mới
            $orders = new Order();
            $orders->user_id = Auth::id();
            $orders->code = $request->input('code');
            $orders->email = $request->input('email');
            $orders->phone = $request->input('phone');
            $orders->total = $this->calculateCartTotal();
            $orders->status = $request->input('status');
            // Thêm nhiều trường nếu cần

            // Lưu đơn hàng vào cơ sở dữ liệu
            $orders->save();

            // Kiểm tra xem phiên 'cart' có tồn tại và không trống không
            if ($request->session()->has('cart') && !empty($request->session()->get('cart'))) {
                // Lặp qua các mục trong giỏ hàng và lưu chúng như các mục đơn hàng
                foreach ($request->session()->get('cart') as $item) {
                    if (is_array($item) && isset($item['product_id'])) {
                        $orderItem = new OrderItems();
                        $orderItem->order_id = $orders->id;
                        $orderItem->product_id = $item['product_id'];
                        $orderItem->quantity = $item['quantity'];
                        $orderItem->price = $item['price'];
                        $orderItem->save();
                    } else {
                        // Xử lý trường hợp khóa 'product_id' không tồn tại
                    }
                }
                // Xóa phiên giỏ hàng sau khi đặt hàng
                $request->session()->forget('cart');

                // Chuyển hướng người dùng sau khi đặt hàng thành công
                return redirect()->route('home.checkout')->with('success', 'Đặt hàng thành công!');
            } else {
                return redirect()->route('home.checkout')->with('error', 'Không có sản phẩm trong giỏ hàng.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để đặt hàng.');
        }
    }

    private function calculateCartTotal()
    {
        $total = 0;
        if (session('cart')) {
            foreach (session('cart') as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }
        return $total;
    }
}
