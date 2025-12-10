<x-seller-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight flex items-center gap-2">
            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            {{ __('Dashboard Overview') }}
        </h2>
    </x-slot>

    <!-- Chart.js Integration -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <!-- 1. Stats Overview Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Total Penjualan -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 relative overflow-hidden group">
                    <div class="flex justify-between items-start z-10 relative">
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">Total Pendapatan</p>
                            <h3 class="text-3xl font-black text-gray-900 tracking-tight">
                                Rp {{ number_format($totalSales, 0, ',', '.') }}
                            </h3>
                            <div class="mt-2 flex items-center text-sm">
                                <span class="text-green-600 bg-green-50 px-2 py-0.5 rounded-full font-bold flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                    +12.5%
                                </span>
                                <span class="text-gray-400 ml-2">vs bulan lalu</span>
                            </div>
                        </div>
                        <div class="p-3 bg-indigo-50 rounded-xl text-indigo-600 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Total Pesanan -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 relative overflow-hidden group">
                    <div class="flex justify-between items-start z-10 relative">
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">Total Pesanan</p>
                            <h3 class="text-3xl font-black text-gray-900 tracking-tight">
                                {{ $totalOrders }}
                            </h3>
                            <div class="mt-2 text-sm text-gray-500">
                                <a href="{{ route('seller.orders.index') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold inline-flex items-center">
                                    Lihat Semua Pesanan
                                    <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </a>
                            </div>
                        </div>
                        <div class="p-3 bg-orange-50 rounded-xl text-orange-600 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Total Produk -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 relative overflow-hidden group">
                    <div class="flex justify-between items-start z-10 relative">
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">Produk Aktif</p>
                            <h3 class="text-3xl font-black text-gray-900 tracking-tight">
                                {{ $totalProducts }}
                            </h3>
                             <div class="mt-2 text-sm text-gray-500">
                                <a href="{{ route('seller.products.index') }}" class="text-pink-600 hover:text-pink-800 font-semibold inline-flex items-center">
                                    Kelola Produk
                                    <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </a>
                            </div>
                        </div>
                        <div class="p-3 bg-pink-50 rounded-xl text-pink-600 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Chart & Command Center Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Chart Section (Spans 2 columns) -->
                <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-bold text-gray-900">Analitik Penjualan</h3>
                        <div class="flex gap-2">
                             <span class="text-xs font-medium px-3 py-1 bg-gray-100 rounded-full text-gray-600">Tahun Ini</span>
                        </div>
                    </div>
                    <div class="relative h-72 w-full">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>

                <!-- Command Center (Side Widget) -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col h-full">
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Aksi Cepat</h3>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('seller.products.create') }}" class="flex flex-col items-center justify-center p-4 bg-gray-50 border-2 border-dashed border-gray-200 rounded-xl hover:border-indigo-500 hover:bg-indigo-50 transition-all group">
                            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-indigo-600 shadow-sm mb-2 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            </div>
                            <span class="text-xs font-bold text-gray-700">Tambah Produk</span>
                        </a>

                        <a href="{{ route('seller.orders.index') }}" class="flex flex-col items-center justify-center p-4 bg-gray-50 border-2 border-dashed border-gray-200 rounded-xl hover:border-orange-500 hover:bg-orange-50 transition-all group">
                             <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-orange-600 shadow-sm mb-2 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                            </div>
                            <span class="text-xs font-bold text-gray-700">Cek Pesanan</span>
                        </a>

                        <a href="{{ route('seller.store.manage') }}" class="flex flex-col items-center justify-center p-4 bg-gray-50 border-2 border-dashed border-gray-200 rounded-xl hover:border-gray-500 hover:bg-gray-100 transition-all group col-span-2">
                             <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-gray-600 shadow-sm mb-2 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg>
                            </div>
                            <span class="text-xs font-bold text-gray-700">Pengaturan Toko</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 3. Recent Orders Table -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-900">Pesanan Terbaru</h3>
                    <a href="{{ route('seller.orders.index') }}" class="text-sm text-indigo-600 font-semibold hover:underline">Lihat Semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/50">
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">No. Pesanan</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Pelanggan</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Produk</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Total</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($recentOrders as $order)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm font-bold text-gray-900">#{{ $order->code ?? $order->id }}</span>
                                        <div class="text-xs text-gray-400">{{ $order->created_at->format('d M Y, H:i') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold text-gray-500 mr-3">
                                                {{ substr($order->buyer?->user?->name ?? 'User', 0, 1) }}
                                            </div>
                                            <div class="text-sm font-medium text-gray-900">{{ $order->buyer?->user?->name ?? 'Guest User' }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500 line-clamp-1 max-w-[200px]">
                                            @foreach($order->transactionDetails as $detail)
                                                {{ $detail->product->name }} (x{{ $detail->qty }})@if(!$loop->last), @endif
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-900">Rp {{ number_format($order->grand_total, 0, ',', '.') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($order->payment_status === 'paid')
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 border border-green-200">
                                                Lunas
                                            </span>
                                        @else
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 border border-yellow-200">
                                                Pending
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                                        Belum ada pesanan masuk.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Chart Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('salesChart').getContext('2d');
            
            // Gradient Data
            let gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(79, 70, 229, 0.2)'); // Indigo
            gradient.addColorStop(1, 'rgba(79, 70, 229, 0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($chartLabels) !!},
                    datasets: [{
                        label: 'Pendapatan (Rp)',
                        data: {!! json_encode($chartData) !!},
                        backgroundColor: gradient,
                        borderColor: '#4f46e5',
                        borderWidth: 2,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#4f46e5',
                        pointHoverBackgroundColor: '#4f46e5',
                        pointHoverBorderColor: '#ffffff',
                        fill: true,
                        tension: 0.4 // Curves the line
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#1f2937',
                            padding: 12,
                            titleFont: { size: 13 },
                            bodyFont: { size: 12 },
                            cornerRadius: 8,
                            displayColors: false,
                             callbacks: {
                                label: function(context) {
                                    return 'Rp ' + new Intl.NumberFormat('id-ID').format(context.raw);
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                borderDash: [4, 4],
                                color: '#f3f4f6'
                            },
                             ticks: {
                                callback: function(value) {
                                    return 'Rp ' + (value/1000000) + 'jt';
                                },
                                font: { size: 11 }
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { font: { size: 11 } }
                        }
                    }
                }
            });
        });
    </script>
</x-seller-layout>
