<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    // Hiển thị trang thanh toán
    public function index()
    {
        // Giả sử bạn có logic để lấy và tính tổng trong phương thức index của bạn
        $total = 0; // Tính tổng ở đây nếu cần
        $user = Auth::user();
        return view('home.checkout', compact('total', 'user'));
    }

    // Xử lý yêu cầu đặt hàng
    public function placeOrder(Request $request)
    {
        // Validate dữ liệu yêu cầu
        $validatedData = $request->validate([
            // Xác định các quy tắc xác thực cho dữ liệu đơn hàng
        ]);

        // Tạo một thể hiện đơn hàng mới
        $orders = new Order();
        $orders->user_id = Auth::id(); // Giả sử bạn đã cấu hình xác thực
        $orders->code = $request->input('code');
        $orders->status = $request->input('status'); // Lấy dữ liệu của trường 'status' từ yêu cầu
        // Thêm nhiều trường nếu cần

        // Lưu đơn hàng vào cơ sở dữ liệu
        $orders->save();

        // Kiểm tra xem phiên 'cart' có tồn tại và không trống không
        if ($request->session()->has('cart') && !empty($request->session()->get('cart'))) {
            // Bây giờ, lặp qua các mục trong giỏ hàng và lưu chúng như các mục đơn hàng
            foreach ($request->session()->get('cart') as $item) {
                // Kiểm tra xem khóa 'product_id' có tồn tại trong mảng $item không
                if (is_array($item) && isset($item['product_id'])) {
                    $orderItem = new Order_items(); // Tên mô hình đã cập nhật
                    $orderItem->order_id = $orders->id; // Gán ID đơn hàng cho mục đơn hàng
                    $orderItem->product_id = $item['product_id']; // Truy cập vào khóa 'product_id'
                    $orderItem->quantity = $item['quantity'];
                    $orderItem->price = $item['price'];
                    // Thêm nhiều trường nếu cần
                    $orderItem->save();
                } else {
                    // Xử lý trường hợp khóa 'product_id' không tồn tại
                    // Điều này có thể là ghi log lỗi hoặc bỏ qua mục này
                    // Bạn cũng có thể muốn thêm xử lý lỗi cho các khóa bắt buộc khác
                    // Ví dụ: 'quantity', 'price', v.v.
                }
            }
            // Xóa phiên giỏ hàng sau khi đặt hàng
            $request->session()->forget('cart');

            // Chuyển hướng người dùng sau khi đặt hàng thành công
            return redirect()->route('home.checkout')->with('success', 'Đặt hàng thành công!');
        } else {
            // Xử lý trường hợp phiên 'cart' trống hoặc không được đặt
            // Bạn có thể muốn chuyển hướng người dùng trở lại trang thanh toán với thông báo lỗi
            return redirect()->route('home.checkout')->with('error', 'Không có sản phẩm trong giỏ hàng.');
        }
    }


}
