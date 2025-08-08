@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
    <!-- Hero Section -->
    <div class="relative h-96">
        <div class="absolute inset-0">
            <img src="{{ asset('images/1.png') }}" alt="Galeri Kampung Skouw Yambe" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 h-full flex items-center">
            <div class="text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Galeri Kampung Skouw Yambe</h1>
                <p class="text-xl">Kumpulan momen indah dan dokumentasi kampung kami</p>
            </div>
        </div>
    </div>

    <!-- Gallery Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <button type="button" onclick="filterItems('all')" class="filter-btn px-6 py-2 rounded-full bg-green-600 text-white hover:bg-green-700 transition-colors">
                    Semua
                </button>
                <button type="button" onclick="filterItems('wisata')" class="filter-btn px-6 py-2 rounded-full bg-gray-100 text-gray-800 hover:bg-gray-200 transition-colors">
                    Wisata
                </button>
                <button type="button" onclick="filterItems('budaya')" class="filter-btn px-6 py-2 rounded-full bg-gray-100 text-gray-800 hover:bg-gray-200 transition-colors">
                    Budaya
                </button>
                <button type="button" onclick="filterItems('video')" class="filter-btn px-6 py-2 rounded-full bg-gray-100 text-gray-800 hover:bg-gray-200 transition-colors">
                    Video
                </button>
            </div>

            <!-- Image Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Pantai -->
                <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition duration-300 gallery-item" data-category="wisata">
                    <img src="{{ asset('images/2.png') }}" alt="Pantai Skouw Yambe" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-0 left-0 p-6 text-white">
                            <h3 class="text-xl font-semibold mb-2">Pantai Berpasir Hitam</h3>
                            <p class="text-sm">Sejauh 5 Km dengan pemandangan Samudera Pasifik</p>
                        </div>
                    </div>
                </div>

                <!-- Konservasi Penyu -->
                <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition duration-300 gallery-item" data-category="wisata">
                    <img src="{{ asset('images/penyu.png') }}" alt="Konservasi Penyu" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-0 left-0 p-6 text-white">
                            <h3 class="text-xl font-semibold mb-2">Konservasi Penyu</h3>
                            <p class="text-sm">Program pelestarian habitat penyu</p>
                        </div>
                    </div>
                </div>

                <!-- Rumah Adat -->
                <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition duration-300 gallery-item" data-category="budaya">
                    <img src="{{ asset('images/4.png') }}" alt="Rumah Adat Tangfa" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-0 left-0 p-6 text-white">
                            <h3 class="text-xl font-semibold mb-2">Rumah Adat Tangfa</h3>
                            <p class="text-sm">Pusat aktivitas adat dan budaya</p>
                        </div>
                    </div>
                </div>

                <!-- Video Section -->
                <div class="col-span-full gallery-item" data-category="video">
                    <h2 class="text-3xl font-bold text-center mb-12 text-gray-900">Video Dokumentasi</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Video 1 -->
                        <div class="relative overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                            <div class="aspect-w-16 aspect-h-9">
                                <iframe 
                                    src="https://www.youtube.com/embed/HDg7AS-Fe6I" 
                                    title="Video Dokumentasi Kampung Skouw Yambe"
                                    class="w-full h-full"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                            <div class="p-6 bg-white">
                                <h3 class="text-xl font-semibold mb-2 text-gray-900">Kampung Skouw Yambe</h3>
                                <p class="text-gray-800">Dokumentasi lengkap tentang kehidupan dan budaya di Kampung Skouw Yambe</p>
                            </div>
                        </div>

                        <!-- Video 2 -->
                        <div class="relative overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                            <div class="aspect-w-16 aspect-h-9">
                                <iframe 
                                    src="https://www.youtube.com/embed/HzpN0LNeD-s" 
                                    title="Konservasi Penyu Skouw Yambe"
                                    class="w-full h-full"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                            <div class="p-6 bg-white">
                                <h3 class="text-xl font-semibold mb-2 text-gray-900">Konservasi Penyu</h3>
                                <p class="text-gray-800">Program konservasi penyu dan edukasi lingkungan di Kampung Skouw Yambe</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12">
                <button class="inline-flex items-center justify-center rounded-md bg-green-600 px-6 py-3 text-sm font-medium text-white shadow transition-colors hover:bg-green-700 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-green-500 disabled:pointer-events-none disabled:opacity-50">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                    Lihat Lebih Banyak
                </button>
            </div>
        </div>
    </section>

    <script>
        function filterItems(category) {
            // Get all items and buttons
            const items = document.getElementsByClassName('gallery-item');
            const buttons = document.getElementsByClassName('filter-btn');

            // Update button styles
            for (let button of buttons) {
                if (button.textContent.toLowerCase().includes(category) || (category === 'all' && button.textContent === 'Semua')) {
                    button.classList.remove('bg-gray-100', 'text-gray-800');
                    button.classList.add('bg-green-600', 'text-white');
                } else {
                    button.classList.remove('bg-green-600', 'text-white');
                    button.classList.add('bg-gray-100', 'text-gray-800');
                }
            }

            // Show/hide items
            for (let item of items) {
                if (category === 'all' || item.getAttribute('data-category') === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            }
        }
    </script>
@endsection 