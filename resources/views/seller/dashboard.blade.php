<x-seller-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome Banner -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col md:flex-row justify-between items-center">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                        Selamat datang kembali, {{ Auth::user()->name }}!
                        <span class="text-2xl">👋</span>
                    </h3>
                    <p class="mt-1 text-gray-600">
                        Anda masuk sebagai
                        <span class="{{ $isVerified ? 'text-green-600 font-bold' : 'text-red-500 font-bold' }}">
                            {{ $isVerified ? 'Penjual Terverifikasi' : 'Belum Diverifikasi' }}
                        </span>
                    </p>
                </div>
                <div class="mt-4 md:mt-0 text-sm text-gray-500 bg-gray-50 px-4 py-2 rounded-full border border-gray-200">
                    {{ now()->format('l, d F Y') }}
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Total Pesanan -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 relative">
                    <div class="z-10 relative">
                        <div class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Total Pesanan</div>
                        <div class="text-3xl font-bold text-gray-900 mb-2">{{ $totalOrders }}</div>
                        <a href="{{ route('seller.orders.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium inline-flex items-center">
                            Lihat Pesanan
                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                     <div class="absolute top-0 right-0 -mt-2 -mr-2 w-24 h-24 bg-blue-50 rounded-full opacity-50 blur-xl"></div>
                </div>

                <!-- Total Produk -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 relative">
                    <div class="z-10 relative">
                        <div class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Total Produk</div>
                        <div class="text-3xl font-bold text-gray-900 mb-2">{{ $totalProducts }}</div>
                        <a href="{{ route('seller.products.index') }}" class="text-sm text-red-600 hover:text-red-800 font-medium inline-flex items-center">
                            Kelola Produk
                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                     <div class="absolute top-0 right-0 -mt-2 -mr-2 w-24 h-24 bg-red-50 rounded-full opacity-50 blur-xl"></div>
                </div>

                <!-- Saldo Aktif -->
                 <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 relative">
                    <div class="z-10 relative">
                        <div class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Total Pendapatan</div>
                        <div class="text-3xl font-bold text-gray-900 mb-2">Rp {{ number_format($totalSales, 0, ',', '.') }}</div>
                        <a href="{{ route('seller.balance.index') }}" class="text-sm text-green-600 hover:text-green-800 font-medium inline-flex items-center">
                            Lihat Detail
                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                    <div class="absolute top-0 right-0 -mt-2 -mr-2 w-24 h-24 bg-green-50 rounded-full opacity-50 blur-xl"></div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div>
                <h3 class="text-lg font-bold text-gray-900 mb-4">Aksi Cepat</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <!-- Tambah Produk -->
                    <a href="{{ route('seller.products.create') }}" class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow flex flex-col items-center justify-center text-center group">
                        <div class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center text-gray-400 group-hover:bg-blue-50 group-hover:text-blue-600 transition-colors mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Tambah Produk</span>
                    </a>

                    <!-- Tambah Kategori -->
                    <a href="{{ route('seller.categories.create') }}" class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow flex flex-col items-center justify-center text-center group">
                         <div class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center text-gray-400 group-hover:bg-indigo-50 group-hover:text-indigo-600 transition-colors mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Tambah Kategori</span>
                    </a>

                     <!-- Tarik Dana (Placeholder route) -->
                     <a href="{{ route('seller.withdraw.index') }}" class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow flex flex-col items-center justify-center text-center group">
                         <div class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center text-gray-400 group-hover:bg-green-50 group-hover:text-green-600 transition-colors mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Tarik Dana</span>
                    </a>

                    <!-- Pengaturan Toko -->
                     <a href="{{ route('seller.store.manage') }}" class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow flex flex-col items-center justify-center text-center group">
                         <div class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center text-gray-400 group-hover:bg-gray-100 group-hover:text-gray-600 transition-colors mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Pengaturan Toko</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-seller-layout>
