<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Product::with('colors')->orderBy('category')->get()
            ->groupBy('category');

        return view('products', [
            'categories' => $categories,
        ]);
    }
}
