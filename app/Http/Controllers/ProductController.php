<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class ProductController extends Controller
{
    public function edit(Request $request): Response|ResponseFactory
    {
        $products = Product::get();

        return inertia('Products', compact('products'));
    }

    public function update(Request $request)
    {
        $products = Product::get();

        return back();
    }
}
