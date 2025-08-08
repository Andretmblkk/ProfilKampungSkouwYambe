@extends('layouts.app')

@section('title', 'Sejarah')

@section('content')
    <!-- Hero Section -->
    <div class="relative h-96">
        <div class="absolute inset-0">
            <img src="{{ asset('images/3.png') }}" alt="Sejarah Kampung Skouw Yambe" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 h-full flex items-center">
            <div class="text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Sejarah Kampung Skouw Yambe</h1>
                <p class="text-xl">Mengenal lebih dalam tentang asal-usul dan perjalanan kampung kami</p>
            </div>
        </div>
    </div>

    <!-- Sejarah Content -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
                <div class="space-y-6">
                    <div class="bg-gray-50 p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                        <h3 class="text-xl font-semibold mb-4 text-green-600">Lokasi dan Peran Strategis</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Kampung Skouw Yambe terletak di Distrik Muara Tami, Kota Jayapura, Papua. Berbatasan langsung dengan Samudera Pasifik di utara dan Papua Nugini di timur, menjadikannya lokasi strategis dalam berbagai peristiwa sejarah.
                        </p>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                        <h3 class="text-xl font-semibold mb-4 text-green-600">Asal Usul dan Kehidupan Adat</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Merupakan bagian dari wilayah Skouw yang terbagi menjadi tiga kampung adat: Skouw Mabo, Skouw Sae, dan Skouw Yambe. Di sini tinggal lima suku asli yang menggunakan bahasa Skouw yang unik. Masyarakatnya melestarikan budaya seperti penggunaan Knambut (slit drum) dalam upacara adat.
                        </p>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                        <h3 class="text-xl font-semibold mb-4 text-green-600">Jejak Sejarah Perang Dunia II</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Pada 10 Oktober 1943, tentara Jepang membangun lapangan terbang di kampung ini. Lokasi dipilih karena tanah datar dan terlindung perbukitan. Pada 26 April 1944, pasukan Amerika di bawah Jenderal Douglas MacArthur berhasil menguasai lapangan terbang ini.
                        </p>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                        <h3 class="text-xl font-semibold mb-4 text-green-600">Potensi dan Keunikan Masa Kini</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Saat ini, Kampung Skouw Yambe dikenal sebagai Desa Wisata Tetang Pe yang masuk 500 besar ADWI 2024. Memiliki pantai berpasir hitam sepanjang 5 Km, konservasi penyu, penghasil kelapa, dan rumah adat Tangfa. Keramahan masyarakat adat menjadi daya tarik utama bagi wisatawan.
                        </p>
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="relative rounded-xl overflow-hidden shadow-lg">
                        <img src="{{ asset('images/3.png') }}" alt="Sejarah Kampung" class="w-full h-[300px] object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-6 text-white">
                            <h3 class="text-xl font-semibold mb-2">Kampung Skouw Yambe</h3>
                            <p class="text-sm">Distrik Muara Tami, Kota Jayapura, Papua</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-xl shadow-lg">
                        <h3 class="text-xl font-semibold mb-4 text-green-600">Fakta Menarik</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-600 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Lapangan terbang peninggalan Jepang masih ada meski tertutup vegetasi</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-600 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Menjadi lokasi konservasi penyu dan penghasil kelapa utama</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-600 mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Memiliki rumah adat Tangfa sebagai objek pemajuan kebudayaan</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection 