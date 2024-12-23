<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index()
    {
        // Retrieve cart items from session (you can store it in the session or a database)
        $cartItems = session()->get('cart', []); // Assuming cart items are stored in session
    $totalPrice = 0;

    foreach ($cartItems as $item) {
        $totalPrice += $item['price'] * $item['quantity']; // Assuming price and quantity exist
    }

        return view('student.cart', compact('cartItems', 'totalPrice'));
    }
    public function add($id)
{
    $product = Product::findOrFail($id);
    $cart = session()->get('cart', []);

    $cart[$id] = [
        'name' => $product->name,
        'quantity' => 1,
        'price' => $product->price,
        'image' => $product->image
    ];

    session()->put('cart', $cart);
    return redirect()->route('cart');
}
public function remove($id)
{
    // Logic to remove the item from the cart
    $cart = session()->get('cart', []);
    
    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect()->route('cart')->with('success', 'Item removed from cart!');
}


}
