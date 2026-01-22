<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function add($id) {
        $product = \App\Models\Product::findOrFail($id);
        $cart = session()->get('cart', []);
        $cart[$id] = [
            "name" => $product->name,
            "price" => $product->price,
            "image" => $product->image,
            "quantity" => ($cart[$id]['quantity'] ?? 0) + 1
        ];
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan!');
    }
    public function update(Request $request, $id) {
    $cart = session()->get('cart', []);
    if(isset($cart[$id])) {
        if($request->action == 'increase') {
            $cart[$id]['quantity']++;
        } elseif($request->action == 'decrease' && $cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
        } elseif($request->action == 'remove') {
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
    }
    return redirect()->back();
}
}
