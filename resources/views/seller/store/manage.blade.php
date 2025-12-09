<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Toko: ') . $store->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <p class="mb-4 text-sm text-gray-600">
                    Status Verifikasi:
                    @if ($store->is_verified)
                        <span class="text-green-600 font-bold">Terverifikasi</span>
                    @else
                        <span class="text-red-600 font-bold">Belum Diverifikasi (Menunggu Persetujuan Admin)</span>
                    @endif
                </p>

                <form method="POST" action="{{ route('seller.store.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <x-input-label for="name" :value="__('Nama Toko')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name', $store->name)" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="logo" :value="__('Logo Toko (Biarkan kosong jika tidak diubah)')" />
                        @if ($store->logo)
                            <div class="mt-2 mb-2">
                                <span class="text-sm text-gray-600">Logo saat ini:</span>
                                <img src="{{ asset($store->logo) }}" alt="Logo Toko"
                                    class="h-10 w-10 object-cover rounded-md">
                            </div>
                        @endif
                        <input id="logo"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none mt-1"
                            type="file" name="logo">
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="about" :value="__('Deskripsi Singkat Toko')" />
                        <textarea id="about"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                            name="about" rows="3">{{ old('about', $store->about) }}</textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="phone" :value="__('Nomor Telepon')" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                            :value="old('phone', $store->phone)" required />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="address" :value="__('Alamat Lengkap')" />
                        <textarea id="address"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                            name="address" rows="3" required>{{ old('address', $store->address) }}</textarea>
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <x-input-label for="city" :value="__('Kota')" />
                            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city"
                                :value="old('city', $store->city)" required />
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="postal_code" :value="__('Kode Pos')" />
                            <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code"
                                :value="old('postal_code', $store->postal_code)" required />
                            <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Perbarui Profil Toko') }}
                        </x-primary-button>
                    </div>
                </form>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-medium text-red-600">Hapus Toko</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Menghapus toko akan menghapus profil toko dan semua produk yang terkait.
                    </p>
                    <form method="POST" action="{{ route('seller.store.destroy') }}" class="mt-4"
                        onsubmit="return confirm('APAKAH ANDA YAKIN INGIN MENGHAPUS TOKO INI? Aksi ini tidak dapat dibatalkan.');">
                        @csrf
                        @method('DELETE')
                        <x-danger-button type="submit">
                            {{ __('Hapus Toko Permanen') }}
                        </x-danger-button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
