@extends('layouts.app')

@section('title', 'Potensi')

@section('content')
    <!-- Hero Section -->
    <div class="relative h-96">
        <div class="absolute inset-0">
            <img src="{{ asset('images/1.png') }}" alt="Potensi Kampung Skouw Yambe" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 h-full flex items-center">
            <div class="text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Potensi Kampung Skouw Yambe</h1>
                <p class="text-xl">Menggali kekayaan alam dan budaya yang tersembunyi</p>
            </div>
        </div>
    </div>

    <!-- Potensi Wisata Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-900">Potensi Wisata</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Pantai -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative h-64">
                        <img src="{{ asset('images/2.png') }}" alt="Pantai Skouw Yambe" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-6 text-white">
                            <h3 class="text-2xl font-semibold mb-2">Pantai Berpasir Hitam</h3>
                            <p class="text-sm">Sejauh 5 Km dengan pemandangan Samudera Pasifik</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-800 mb-4">
                            Pantai berpasir hitam sepanjang 5 kilometer yang menghadap langsung ke Samudera Pasifik. 
                            Menjadi lokasi ideal untuk menikmati matahari terbit dan terbenam yang spektakuler.
                        </p>
                        <div class="flex items-center text-green-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Lokasi: Pesisir Utara Kampung Skouw Yambe</span>
                        </div>
                    </div>
                </div>

                <!-- Konservasi Penyu -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative h-64">
                        <img src="{{ asset('images/penyu.png') }}" alt="Konservasi Penyu" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-6 text-white">
                            <h3 class="text-2xl font-semibold mb-2">Konservasi Penyu</h3>
                            <p class="text-sm">Pelestarian habitat penyu dan edukasi lingkungan</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-800 mb-4">
                            Program konservasi penyu yang tidak hanya melindungi spesies langka, 
                            tetapi juga memberikan edukasi tentang pentingnya pelestarian lingkungan.
                        </p>
                        <div class="flex items-center text-green-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            <span>Program Edukasi Lingkungan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Potensi Ekonomi Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-900">Potensi Ekonomi</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Kelapa -->
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Perkebunan Kelapa</h3>
                    <p class="text-gray-800">
                        Kampung Skouw Yambe merupakan penghasil kelapa utama dengan kualitas terbaik. 
                        Produk kelapa menjadi komoditas unggulan yang mendukung perekonomian masyarakat.
                    </p>
                </div>

                <!-- UMKM -->
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">UMKM Lokal</h3>
                    <p class="text-gray-800">
                        Berkembangnya usaha mikro, kecil, dan menengah yang memanfaatkan potensi lokal 
                        seperti kerajinan tangan dan produk olahan kelapa.
                    </p>
                </div>

                <!-- Wisata -->
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Desa Wisata</h3>
                    <p class="text-gray-800">
                        Sebagai Desa Wisata Tetang Pe yang masuk 500 besar ADWI 2024, 
                        mendorong pertumbuhan ekonomi melalui sektor pariwisata.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Budaya Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-900">Potensi Budaya</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <div class="bg-gray-50 p-6 rounded-xl shadow-lg">
                        <h3 class="text-xl font-semibold mb-4 text-gray-900">Rumah Adat Tangfa</h3>
                        <p class="text-gray-800 mb-4">
                            Rumah adat Tangfa merupakan objek pemajuan kebudayaan yang menjadi pusat 
                            aktivitas adat dan budaya masyarakat Skouw Yambe.
                        </p>
                        <div class="flex items-center text-green-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            <span>Pusat Aktivitas Adat</span>
                        </div>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-xl shadow-lg">
                        <h3 class="text-xl font-semibold mb-4 text-gray-900">Budaya Lokal</h3>
                        <p class="text-gray-800 mb-4">
                            Masyarakat Skouw Yambe terdiri dari lima suku asli yang menggunakan bahasa Skouw. 
                            Budaya seperti penggunaan Knambut (slit drum) dalam upacara adat masih dilestarikan.
                        </p>
                        <div class="flex items-center text-green-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                            </svg>
                            <span>Warisan Budaya</span>
                        </div>
                    </div>
                </div>
                <div class="relative h-[500px] rounded-xl overflow-hidden shadow-lg">
                    <img src="{{ asset('images/4.png') }}" alt="Budaya Skouw Yambe" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 text-white">
                        <h3 class="text-2xl font-semibold mb-2">Warisan Budaya</h3>
                        <p class="text-sm">Melestarikan tradisi dan budaya lokal</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection 