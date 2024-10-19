<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsUpdateRequest;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
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

    public function update(ProductsUpdateRequest $request): RedirectResponse
    {
        $idsToDelete = Product::pluck('id')->diff(array_column($request->validated('products'), 'id'));
        Product::whereIn('id', $idsToDelete)->delete();
        Product::upsert($request->validated('products'), 'id');

        return back()->with('success', 'Сохранено');
    }
}
