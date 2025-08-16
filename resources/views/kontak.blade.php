@extends('layouts.app')

@section('title', 'Kontak')

@section('scripts')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Koordinat Kampung Skouw Yambe yang akurat
        const skouwYambe = [-2.612338, 140.850206];
        
        // Membuat peta dengan zoom level yang lebih dekat
        const map = L.map('map', {
            center: skouwYambe,
            zoom: 16,
            zoomControl: false
        });

        // Menambahkan tile layer satelit dari Google
        L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            attribution: '&copy; <a href="https://www.google.com/maps">Google Maps</a>',
            maxZoom: 20
        }).addTo(map);

        // Menambahkan marker dengan ikon kustom
        const marker = L.marker(skouwYambe, {
            title: "Kampung Skouw Yambe"
        }).addTo(map);

        // Menambahkan popup dengan informasi lebih detail
        marker.bindPopup(`
            <div class="p-2">
                <h3 class="font-bold text-lg">Kampung Skouw Yambe</h3>
                <p class="text-sm">Kampung Skouw Yambe, Muara Tami</p>
                <p class="text-sm">Jayapura, Papua</p>
                <p class="text-sm mt-2">Koordinat: 2°36'44.4"S 140°51'00.7"E</p>
                <a href="https://www.google.com/maps?q=-2.612338,140.850206" 
                   target="_blank" 
                   class="inline-block mt-2 px-3 py-1 bg-green-600 text-white text-sm rounded hover:bg-green-700 transition-colors">
                    Lihat di Google Maps
                </a>
            </div>
        `);

        // Menambahkan circle untuk area kampung dengan radius yang lebih sesuai
        const circle = L.circle(skouwYambe, {
            color: '#22c55e',
            fillColor: '#22c55e',
            fillOpacity: 0.1,
            radius: 300 // Radius disesuaikan dengan ukuran kampung
        }).addTo(map);

        // Menambahkan kontrol zoom
        L.control.zoom({
            position: 'bottomright'
        }).addTo(map);
    });
</script>
@endsection

@section('content')
    <!-- Hero Section -->
    <div class="relative h-screen overflow-hidden" id="hero">
        <div class="absolute inset-0">
            <img loading="lazy" src="{{ asset('images/4.jpg') }}" alt="Kontak Kampung Skouw Yambe" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 h-full flex items-center">
            <div class="text-white w-full text-center">
                <div class="mb-6">
                    <h1 class="text-5xl md:text-7xl font-extrabold mb-4 leading-tight">
                        <span class="block text-green-300">Hubungi Kami</span>
                        <span class="block bg-gradient-to-r from-white via-green-100 to-white bg-clip-text text-transparent">Kampung Skouw Yambe</span>
                    </h1>
                </div>
                <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto leading-relaxed text-gray-100 font-medium">
                    Kami siap membantu dan menjawab pertanyaan Anda. Jangan ragu untuk menghubungi kami untuk informasi lebih lanjut.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4 mb-8">
                    <a href="#contact-form" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300">
                        Kirim Pesan
                    </a>
                    <a href="#contact-info" class="border-2 border-white/30 hover:border-white text-white font-medium py-3 px-6 rounded-lg transition-all duration-300 hover:bg-white/10">
                        Informasi Kontak
                    </a>
                </div>
                <div class="flex justify-center">
                    <div class="flex items-center gap-6 text-sm text-gray-200">
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                            <span>24/7 Support</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse"></div>
                            <span>Respon Cepat</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse"></div>
                            <span>Pelayanan Ramah</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <section id="contact-form" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Kirim Pesan</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Isi form di bawah ini untuk mengirim pesan kepada kami. Tim kami akan segera merespon pesan Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-800 rounded-xl flex items-center">
                            <svg class="w-5 h-5 mr-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl flex items-center">
                            <svg class="w-5 h-5 mr-3 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ url('/kontak') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="name" class="text-sm font-semibold text-gray-700">Nama Lengkap</label>
                                <input type="text" 
                                       id="name" 
                                       name="name" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent @error('name') border-red-500 @enderror text-gray-900 transition-all duration-200" 
                                       value="{{ old('name') }}" 
                                       required
                                       placeholder="Masukkan nama lengkap Anda">
                                @error('name')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="space-y-2">
                                <label for="email" class="text-sm font-semibold text-gray-700">Email</label>
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent @error('email') border-red-500 @enderror text-gray-900 transition-all duration-200" 
                                       value="{{ old('email') }}" 
                                       required
                                       placeholder="contoh@email.com">
                                @error('email')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="space-y-2">
                            <label for="subject" class="text-sm font-semibold text-gray-700">Subjek</label>
                            <input type="text" 
                                   id="subject" 
                                   name="subject" 
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent @error('subject') border-red-500 @enderror text-gray-900 transition-all duration-200" 
                                   value="{{ old('subject') }}" 
                                   required
                                   placeholder="Apa yang ingin Anda tanyakan?">
                            @error('subject')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="space-y-2">
                            <label for="message" class="text-sm font-semibold text-gray-700">Pesan</label>
                            <textarea id="message" 
                                      name="message" 
                                      rows="5" 
                                      class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent @error('message') border-red-500 @enderror text-gray-900 transition-all duration-200 resize-none" 
                                      required
                                      placeholder="Tulis pesan Anda di sini...">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                Kirim Pesan
                            </span>
                        </button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div id="contact-info" class="space-y-8">
                    <!-- Main Contact Info -->
                    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                        <h3 class="text-2xl font-bold mb-6 text-gray-900">Informasi Kontak</h3>
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4 group">
                                <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-green-100 to-green-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-900 mb-1">Alamat</h4>
                                    <p class="text-gray-600 leading-relaxed">Kampung Skouw Yambe, Distrik Muara Tami, Kota Jayapura, Papua</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4 group">
                                <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-900 mb-1">Telepon</h4>
                                    <p class="text-gray-600">0822-5034-5977</p>
                                    <p class="text-sm text-gray-500">Senin - Jumat: 08:00 - 16:00</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4 group">
                                <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-purple-100 to-purple-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-900 mb-1">Email</h4>
                                    <p class="text-gray-600">kampungskouwyambe@gmail.com</p>
                                    <p class="text-sm text-gray-500">Respon dalam 24 jam</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                        <h3 class="text-2xl font-bold mb-6 text-gray-900">Media Sosial</h3>
                        <p class="text-gray-600 mb-6">Ikuti kami di media sosial untuk informasi terbaru</p>
                        <div class="grid grid-cols-2 gap-4">
                            <a href="#" class="flex items-center p-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 group">
                                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                                <span class="font-semibold">Facebook</span>
                            </a>
                            
                            <a href="#" class="flex items-center p-4 bg-gradient-to-r from-sky-400 to-sky-500 text-white rounded-xl hover:from-sky-500 hover:to-sky-600 transition-all duration-300 transform hover:scale-105 group">
                                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                                <span class="font-semibold">Twitter</span>
                            </a>
                            
                            <a href="#" class="flex items-center p-4 bg-gradient-to-r from-pink-500 to-pink-600 text-white rounded-xl hover:from-pink-600 hover:to-pink-700 transition-all duration-300 transform hover:scale-105 group">
                                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                                </svg>
                                <span class="font-semibold">Instagram</span>
                            </a>
                            
                            <a href="#" class="flex items-center p-4 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-300 transform hover:scale-105 group">
                                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                </svg>
                                <span class="font-semibold">YouTube</span>
                            </a>
                        </div>
                    </div>

                    <!-- Business Hours -->
                    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                        <h3 class="text-2xl font-bold mb-6 text-gray-900">Jam Layanan</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="font-medium text-gray-700">Senin - Jumat</span>
                                <span class="text-green-600 font-semibold">08:00 - 16:00</span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="font-medium text-gray-700">Sabtu</span>
                                <span class="text-blue-600 font-semibold">08:00 - 12:00</span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="font-medium text-gray-700">Minggu & Tanggal Merah</span>
                                <span class="text-red-600 font-semibold">Tutup</span>
                            </div>
                        </div>
                        <div class="mt-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                            <p class="text-sm text-green-800 text-center">
                                <strong>Catatan:</strong> Untuk urusan mendesak di luar jam kerja, silakan hubungi nomor darurat kami.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Lokasi Kami</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Kampung Skouw Yambe terletak di Distrik Muara Tami, Kota Jayapura, Papua. 
                    Berikut adalah peta lokasi yang akurat untuk memudahkan Anda menemukan kami.
                </p>
            </div>
            
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div id="map" class="w-full h-[500px] z-0"></div>
            </div>
            
            <div class="mt-8 text-center">
                <a href="https://www.google.com/maps?q=-2.612338,140.850206" 
                   target="_blank" 
                   class="inline-flex items-center px-6 py-3 bg-green-600 text-white font-semibold rounded-xl hover:bg-green-700 transition-all duration-300 transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    Buka di Google Maps
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Pertanyaan Umum</h2>
                <p class="text-lg text-gray-600">
                    Berikut adalah beberapa pertanyaan yang sering diajukan oleh pengunjung
                </p>
            </div>
            
            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Bagaimana cara menghubungi kampung untuk urusan resmi?</h3>
                    <p class="text-gray-600">Untuk urusan resmi, Anda dapat menghubungi kami melalui telepon, email, atau datang langsung ke kantor kampung pada jam kerja yang telah ditentukan.</p>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Apakah ada layanan online yang tersedia?</h3>
                    <p class="text-gray-600">Saat ini kami sedang mengembangkan layanan online untuk memudahkan masyarakat. Silakan pantau website ini untuk informasi terbaru.</p>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Bagaimana jika ada pertanyaan di luar jam kerja?</h3>
                    <p class="text-gray-600">Untuk pertanyaan mendesak di luar jam kerja, Anda dapat menghubungi nomor darurat yang tersedia atau mengirim email yang akan kami respon pada hari kerja berikutnya.</p>
                </div>
            </div>
        </div>
    </section>
@endsection 