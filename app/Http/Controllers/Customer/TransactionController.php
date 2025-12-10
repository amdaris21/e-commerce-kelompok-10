<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function show($id) // Checkout Page for specific product
    {
        $product = Product::with('store')->findOrFail($id);
        return view('Customer.transaction', compact('product'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'shipping_type' => 'required',
            'fullname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
        ]);

        $user = auth()->user();
        $buyer = Buyer::firstOrCreate(['user_id' => $user->id]);

        $product = Product::findOrFail($request->product_id);
        $shippingCost = 0;
        
        switch ($request->shipping_type) {
            case 'reguler': $shippingCost = 10000; break;
            case 'express': $shippingCost = 25000; break;
            case 'same_day': $shippingCost = 50000; break;
        }

        $price = $product->price * $request->quantity;
        $serviceFee = 2000;
        $grandTotal = $price + $shippingCost + $serviceFee;

        DB::beginTransaction();
        try {
            $transaction = Transaction::create([
                'code' => 'TRX-' . strtoupper(Str::random(8)),
                'buyer_id' => $buyer->id,
                'store_id' => $product->store_id,
                'address' => $request->address,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'shipping_type' => $request->shipping_type,
                'shipping_cost' => $shippingCost,
                'tax' => 0, // Simplified
                'grand_total' => $grandTotal,
                'payment_status' => 'unpaid',
            ]);

            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $product->id,
                'qty' => $request->quantity,
                'subtotal' => $price,
            ]);

            DB::commit();
            
            return redirect()->route('transaction.detail', $transaction->id)->with('success', 'Pesanan berhasil dibuat!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function detail(Transaction $transaction)
    {
        // Ensure user owns this transaction
        $user = auth()->user();
        if ($transaction->buyer->user_id !== $user->id) {
            abort(403);
        }

        $transaction->load(['transactionDetails.product', 'store']);
        return view('Customer.transaction_detail', compact('transaction'));
    }

    public function confirm(Transaction $transaction)
    {
        $user = auth()->user();
        if ($transaction->buyer->user_id !== $user->id) {
            abort(403);
        }

        $transaction->update(['payment_status' => 'paid']);
        
        return redirect()->route('transaction.history')->with('success', 'Pembayaran berhasil dikonfirmasi!');
    }

    public function history()
    {
        $user = auth()->user();
        $buyer = Buyer::where('user_id', $user->id)->first();

        if (!$buyer) {
            $transactions = collect();
        } else {
            $transactions = Transaction::where('buyer_id', $buyer->id)
                                ->with(['transactionDetails.product', 'store'])
                                ->latest()
                                ->paginate(10);
        }

        return view('Customer.transaction_history', compact('transactions'));
    }
}
