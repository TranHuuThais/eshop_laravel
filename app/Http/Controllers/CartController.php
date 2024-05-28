<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $cart = session()->get('cart', []);

    // Dump the cart to debug
    // dd($cart);

    // Calculate total quantity of items in the cart
    $totalQuantity = 0;
    foreach ($cart as $item) {
        $totalQuantity += $item['quantity'];
    }

    return view('cart.index', [
        'cart' => $cart,
        'totalQuantity' => $totalQuantity,
    ]);
}
    /**
     * Add a product to the cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
    
        $product = Product::findOrFail($product_id);
    
        $cart = session()->get('cart', []);
    
        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] += $quantity;
        } else {
            $cart[$product_id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'img' => $product->img // Ensure the img key is set here
            ];
        }
    
        session()->put('cart', $cart);
    
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }

  
    // Other methods like edit, update, destroy, and getItemCount can be defined here

    public function destroy($id)
{
    $cart = session()->get('cart', []);

    if(isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully!');
}

    public function update(Request $request, $id)
    {
        $quantity = $request->input('quantity');
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
        }

        return redirect()->route('cart.index')->with('error', 'Product not found in cart!');
    }

}


