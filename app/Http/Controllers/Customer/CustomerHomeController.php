<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;

class CustomerHomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = ProductCategory::orderBy('name')->get();

        $productQuery = Product::query() -> with(['category', 'images']) ->latest();

        if ($request->filled('category')) {
            $productQuery->where('product_category_id', $request->category);
        }

        $products = $productQuery->paginate(12)->withQueryString();

        return view('customer.home', compact('categories', 'products'));
    }
}
