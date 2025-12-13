<x-seller-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight flex items-center gap-2">
            <a href="{{ route('seller.orders.index') }}" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            {{ __('Detail Pesanan: #') . $transaction->code }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Left Column: Order Items & Info -->
                <div class="md:col-span-2 space-y-6">
                    <!-- Order Items -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h3 class="text-lg font-bold mb-4">Produk yang Dipesan</h3>
                             <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($transaction->transactionDetails as $detail)
                                            <tr>
                                                <td class="py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="h-16 w-16 flex-shrink-0">
                                                            @if($detail->product->thumbnail && $detail->product->thumbnail->image)
                                                             <img class="h-16 w-16 rounded-md object-cover" src="{{ asset('storage/' . $detail->product->thumbnail->image) }}" alt="{{ $detail->product->name }}">
                                                            @else
                                                             <img class="h-16 w-16 rounded-md object-cover" src="{{ asset('images/default-product.png') }}" alt="{{ $detail->product->name }}">
                                                            @endif
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">{{ $detail->product->name }}</div>
                                                            <div class="text-sm text-gray-500">{{ $detail->qty }} x Rp {{ number_format($detail->product->price, 0, ',', '.') }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    Rp {{ number_format($detail->subtotal, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Info -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                         <div class="p-6 bg-white border-b border-gray-200">
                            <h3 class="text-lg font-bold mb-4">Informasi Pengiriman</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-500 uppercase font-bold">Penerima</p>
                                    <p class="font-medium">{{ optional($transaction->buyer->user)->name ?? 'Guest' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 uppercase font-bold">Email</p>
                                    <p class="font-medium">{{ optional($transaction->buyer->user)->email ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 uppercase font-bold">No. Telepon</p>
                                    <p class="font-medium">{{ optional($transaction->buyer)->phone_number ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 uppercase font-bold">Alamat</p>
                                    <p class="font-medium">{{ $transaction->address }}</p>
                                    <p>{{ $transaction->city }}, {{ $transaction->postal_code }}</p>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>

                <!-- Right Column: Summary & Actions -->
                <div class="md:col-span-1 space-y-6">
                    
                    <!-- Order Summary -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h3 class="text-lg font-bold mb-4">Ringkasan</h3>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Metode Pengiriman</span>
                                <span class="font-bold capitalize">{{ str_replace('_', ' ', $transaction->shipping_type) }}</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Ongkos Kirim</span>
                                <span>Rp {{ number_format($transaction->shipping_cost, 0, ',', '.') }}</span>
                            </div>
                             <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Pajak (11%)</span>
                                <span>Rp {{ number_format($transaction->tax, 0, ',', '.') }}</span>
                            </div>
                            <hr class="my-4">
                            <div class="flex justify-between text-lg font-bold">
                                <span>Total Bayar</span>
                                <span class="text-indigo-600">Rp {{ number_format($transaction->grand_total, 0, ',', '.') }}</span>
                            </div>
                             <div class="mt-4 space-y-2">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full {{ $transaction->payment_status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    Pembayaran: {{ ucfirst($transaction->payment_status) }}
                                </span>
                                <br>
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full {{ $transaction->delivery_status === 'shipped' ? 'bg-blue-100 text-blue-800' : ($transaction->delivery_status === 'delivered' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800') }}">
                                    Pengiriman: {{ ucfirst($transaction->delivery_status) }}
                                </span>
                            </div>
                        </div>
                    </div>

                     <!-- Actions / Tracking Number -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                         <div class="p-6 bg-white border-b border-gray-200">
                             
                             @if (session('success'))
                                <div class="mb-4 text-sm text-green-600 font-bold">
                                    {{ session('success') }}
                                </div>
                             @endif
                             
                             @if (session('error'))
                                <div class="mb-4 text-sm text-red-600 font-bold">
                                    {{ session('error') }}
                                </div>
                             @endif

                             @if($transaction->delivery_status === 'pending')
                                <h3 class="text-lg font-bold mb-4">Aksi Pesanan</h3>
                                <div class="flex flex-col gap-3">
                                    <form action="{{ route('seller.orders.confirm', $transaction->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" onclick="return confirm('Konfirmasi pesanan ini? Resi akan dibuat otomatis.')">
                                            Konfirmasi Pesanan
                                        </button>
                                    </form>
                                    
                                    <form action="{{ route('seller.orders.reject', $transaction->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="return confirm('Yakin ingin menolak pesanan ini?')">
                                            Tolak Pesanan
                                        </button>
                                    </form>
                                </div>

                             @elseif($transaction->delivery_status === 'canceled')
                                <div class="text-center p-4 bg-red-50 border border-red-200 rounded-md">
                                    <h3 class="text-lg font-bold text-red-700 mb-2">Pesanan Ditolak</h3>
                                    <p class="text-sm text-red-600">Pesanan ini telah dibatalkan/ditolak oleh toko.</p>
                                </div>

                             @else
                                 <h3 class="text-lg font-bold mb-4">Update Resi</h3>
                                 <form>
                                    <div class="mb-4">
                                        <label for="tracking_number" class="block text-sm font-medium text-gray-700">Nomor Resi</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" id="tracking_number" 
                                                   class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300 bg-gray-100 cursor-not-allowed"
                                                   value="{{ $transaction->tracking_number }}" readonly>
                                            <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                                Otomatis
                                            </span>
                                        </div>
                                        <p class="mt-2 text-xs text-gray-500">Resi dibuat otomatis oleh sistem.</p>
                                    </div>
                                 </form>
                             @endif
                         </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-seller-layout>
