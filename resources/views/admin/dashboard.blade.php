<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-[#EDEDEC] leading-tight flex items-center gap-2">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#0a0a0a] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Row 1: Stats Overview & Pending Verification -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                <!-- Left: Stats Grid -->
                <div class="lg:col-span-2">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Total Users -->
                        <div class="bg-[#161616] rounded-2xl p-6 shadow-sm border border-white/10 relative overflow-hidden group">
                            <div class="flex justify-between items-start z-10 relative">
                                <div>
                                    <p class="text-xs font-medium text-gray-500 mb-1 uppercase tracking-wider">Total Users</p>
                                    <h3 class="text-3xl font-black text-[#EDEDEC] tracking-tight">
                                        {{ number_format($totalUsers, 0, ',', '.') }}
                                    </h3>
                                </div>
                                <div class="p-2 bg-white/5 rounded-lg text-white group-hover:bg-white/10 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                </div>
                            </div>
                        </div>

                        <!-- Total Sellers -->
                        <div class="bg-[#161616] rounded-2xl p-6 shadow-sm border border-white/10 relative overflow-hidden group">
                            <div class="flex justify-between items-start z-10 relative">
                                <div>
                                    <p class="text-xs font-medium text-gray-500 mb-1 uppercase tracking-wider">Total Sellers</p>
                                    <h3 class="text-3xl font-black text-[#EDEDEC] tracking-tight">
                                        {{ number_format($totalSellers, 0, ',', '.') }}
                                    </h3>
                                </div>
                                <div class="p-2 bg-white/5 rounded-lg text-white group-hover:bg-white/10 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                            </div>
                        </div>

                        <!-- Total Stores -->
                        <div class="bg-[#161616] rounded-2xl p-6 shadow-sm border border-white/10 relative overflow-hidden group">
                            <div class="flex justify-between items-start z-10 relative">
                                <div>
                                    <p class="text-xs font-medium text-gray-500 mb-1 uppercase tracking-wider">Total Toko</p>
                                    <h3 class="text-3xl font-black text-[#EDEDEC] tracking-tight">
                                        {{ number_format($totalStores, 0, ',', '.') }}
                                    </h3>
                                </div>
                                <div class="p-2 bg-white/5 rounded-lg text-white group-hover:bg-white/10 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Pending Verification -->
                <div>
                     <div class="bg-[#161616] rounded-2xl p-6 shadow-sm border border-white/10 relative overflow-hidden group h-full">
                        <div class="flex justify-between items-start z-10 relative">
                            <div>
                                <p class="text-xs font-medium text-gray-500 mb-1 uppercase tracking-wider">Menunggu Verifikasi</p>
                                <h3 class="text-3xl font-black text-[#EDEDEC] tracking-tight">
                                    {{ number_format($pendingStores, 0, ',', '.') }}
                                </h3>
                                @if($pendingStores > 0)
                                <div class="mt-2">
                                    <a href="{{ route('admin.verification') }}" class="text-xs text-white hover:text-gray-300 font-bold inline-flex items-center gap-1 transition-colors border-b border-white/20 pb-0.5 hover:border-white">
                                        REVIEW
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    </a>
                                </div>
                                @endif
                            </div>
                            <div class="p-2 bg-white/5 rounded-lg text-white group-hover:bg-white/10 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row 2: Chart & Recent Users -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                <!-- Left: Growth Chart -->
                <div class="lg:col-span-2">
                    <div class="bg-[#161616] rounded-2xl p-6 shadow-sm border border-white/10 h-full">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-bold text-[#EDEDEC]">Statistik Pertumbuhan</h3>
                            <div class="flex items-center gap-2">
                                <span class="px-2 py-1 bg-white/5 border border-white/10 rounded text-[10px] text-gray-400">6 Bulan Terakhir</span>
                            </div>
                        </div>
                        
                        <!-- Simple CSS Bar Chart -->
                        <div class="h-64 flex items-end justify-between gap-2 px-4 pb-4 border-l border-b border-white/10">
                            @foreach($monthlyStats['data'] as $index => $value)
                            <div class="w-full flex flex-col items-center gap-2 group">
                                <div class="w-full bg-white/5 rounded-t-sm relative h-full flex items-end overflow-hidden hover:bg-white/10 transition-colors">
                                    <div class="w-full bg-white group-hover:bg-gray-300 transition-all duration-500 ease-out" style="height: {{ ($value / 20) * 100 }}%"></div>
                                </div>
                                <span class="text-xs text-gray-500">{{ $monthlyStats['labels'][$index] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right: Recent Users -->
                <div>
                     <div class="bg-[#161616] rounded-2xl p-6 shadow-sm border border-white/10 h-full">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-bold text-[#EDEDEC]">Pengguna Baru</h3>
                            <a href="{{ route('admin.management') }}" class="text-[10px] uppercase font-bold text-gray-500 hover:text-white transition-colors">Lihat Semua</a>
                        </div>
                        <div class="space-y-4">
                            @foreach($latestUsers as $user)
                            <div class="flex items-center gap-3 p-3 rounded-xl bg-black/20 border border-white/5 hover:border-white/10 transition-colors group">
                                <div class="w-8 h-8 rounded-lg bg-white text-black font-bold flex items-center justify-center flex-shrink-0 text-xs">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold text-white truncate">{{ $user->name }}</p>
                                    <p class="text-[10px] text-gray-500 truncate font-mono">{{ $user->email }}</p>
                                </div>
                                <div class="text-[10px] text-gray-600">
                                    {{ $user->created_at->diffForHumans(null, true) }}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row 3: Recent Stores & Quick Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                 <!-- Left: Recent Stores -->
                <div class="lg:col-span-2">
                    <div class="bg-[#161616] rounded-2xl p-6 shadow-sm border border-white/10 h-full">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-bold text-[#EDEDEC]">Toko Terbaru</h3>
                        </div>
                        <div class="overflow-x-auto rounded-lg border border-white/5">
                            <table class="w-full text-sm text-left text-gray-400">
                                <thead class="text-xs text-gray-500 uppercase bg-[#0f0f0f]">
                                    <tr>
                                        <th class="px-4 py-3 font-medium">Nama Toko</th>
                                        <th class="px-4 py-3 font-medium">Pemilik</th>
                                        <th class="px-4 py-3 font-medium text-right">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/5 bg-[#161616]">
                                    @foreach($latestStores as $store)
                                    <tr class="hover:bg-white/5 transition-colors">
                                        <td class="px-4 py-3 font-medium text-white">{{ $store->name }}</td>
                                        <td class="px-4 py-3">{{ $store->user->name }}</td>
                                        <td class="px-4 py-3 text-right">
                                            @if($store->is_verified)
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-green-500/10 text-green-400 border border-green-500/20">
                                                    VERIFIED
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-yellow-500/10 text-yellow-400 border border-yellow-500/20">
                                                    PENDING
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Right: Quick Actions -->
                <div>
                     <div class="bg-gradient-to-br from-[#161616] to-[#0f0f0f] rounded-2xl p-6 shadow-sm border border-white/10 h-full">
                        <h3 class="text-lg font-bold text-[#EDEDEC] mb-4">Aksi Cepat</h3>
                        <div class="grid grid-cols-2 gap-3">
                            <a href="{{ route('admin.verification') }}" class="p-3 bg-white/5 border border-white/5 hover:border-white/20 rounded-xl text-center hover:bg-white/10 transition-all group">
                                <svg class="w-5 h-5 text-white mx-auto mb-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="text-[10px] uppercase font-bold text-gray-300 group-hover:text-white">Verifikasi</span>
                            </a>
                            <a href="{{ route('admin.management') }}" class="p-3 bg-white/5 border border-white/5 hover:border-white/20 rounded-xl text-center hover:bg-white/10 transition-all group">
                                <svg class="w-5 h-5 text-white mx-auto mb-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span class="text-[10px] uppercase font-bold text-gray-300 group-hover:text-white">Manajemen</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
