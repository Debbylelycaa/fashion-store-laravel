<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = \App\Models\Product::all();
        return view('index', compact('products'));
    }

    public function show($id) {
        $product = \App\Models\Product::findOrFail($id);
        return view('show', compact('product'));
    }
}
