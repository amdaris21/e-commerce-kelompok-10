<aside class="w-64 bg-white border-r border-gray-100 min-h-screen hidden sm:block">
    <div class="h-16 flex items-center justify-center border-b border-gray-100">
        <a href="{{ route('seller.dashboard') }}">
             <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
        </a>
    </div>

    <div class="py-4 px-3 space-y-1">
        <x-nav-link :href="route('seller.dashboard')" :active="request()->routeIs('seller.dashboard')" class="block w-full text-left pl-3 pr-4 py-2 border-l-4">
            {{ __('Dashboard') }}
        </x-nav-link>

        <x-nav-link :href="route('seller.store.manage')" :active="request()->routeIs('seller.store.*')" class="block w-full text-left pl-3 pr-4 py-2 border-l-4">
            {{ __('Profil Toko') }}
        </x-nav-link>

        <x-nav-link :href="route('seller.products.index')" :active="request()->routeIs('seller.products.*')" class="block w-full text-left pl-3 pr-4 py-2 border-l-4">
            {{ __('Produk Saya') }}
        </x-nav-link>

        <x-nav-link :href="route('seller.orders.index')" :active="request()->routeIs('seller.orders.*')" class="block w-full text-left pl-3 pr-4 py-2 border-l-4">
            {{ __('Pesanan') }}
        </x-nav-link>

        <x-nav-link :href="route('seller.balance.index')" :active="request()->routeIs('seller.balance.*')" class="block w-full text-left pl-3 pr-4 py-2 border-l-4">
            {{ __('Saldo Toko') }}
        </x-nav-link>

        <x-nav-link :href="route('seller.withdraw.index')" :active="request()->routeIs('seller.withdraw.*')" class="block w-full text-left pl-3 pr-4 py-2 border-l-4">
            {{ __('Penarikan Dana') }}
        </x-nav-link>
    </div>
</aside>
