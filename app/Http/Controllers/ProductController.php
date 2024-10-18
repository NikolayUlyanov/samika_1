<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class ProductController extends Controller
{
    public function index(Request $request): Response|ResponseFactory
    {
        $products = Product::get();

        return inertia('Products', compact('products'));
    }
}
