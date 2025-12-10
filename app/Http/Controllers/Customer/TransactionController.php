<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function show(Product $product)
    {
        return view('customer.transaction', compact('product'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'shipping_type' => 'required|string|in:reguler,express,same_day',
            'store_id' => 'required|integer|exists:stores,id',
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $buyerId = Auth::user()->buyer->id ?? null;

        $transactionCode = 'TRX-' . Str::upper(Str::random(8));

        $shippingCosts = [
            'reguler' => 10000,
            'express' => 20000,
            'same_day' => 30000,
        ];

        $shippingCost = $shippingCosts[$request->shipping_type] ?? 0;

        
        $product = Product::findOrFail($request->product_id);
        $subtotal = $product->price * $request->quantity;

        $tax = 0; 

        $grandTotal = $subtotal + $shippingCost + $tax;

        $transaction = Transaction::create([
            'code' => $transactionCode,
            'buyer_id' => $buyerId,
            'store_id' => $request->store_id,
            'address' => $request->address,
            'address_id' => null,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'shipping' => $request->shipping_type,
            'shipping_type' => $request->shipping_type,
            'shipping_cost' => $shippingCost,
            'tracking_number' => null,
            'tax' => $tax,
            'grand_total' => $grandTotal,
            'payment_status' => 'pending',
        ]);

        TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'product_id' => $request->product_id,
            'qty' => $request->quantity,
            'subtotal' => $subtotal,
        ]);

        return redirect()->route('customer.home')->with('success', 'Transaksi berhasil diproses, kode transaksi: ' . $transactionCode);
    }
}
