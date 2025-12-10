<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('Customer.transaction', compact('product'));
    }

    public function process(Request $request)
    {
        // TODO: Implement checkout logic
        return redirect()->route('customer.home')->with('success', 'Order processed successfully!');
    }
}
