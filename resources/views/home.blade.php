@extends('layouts.app')

@section('title', 'Beranda')

@section('scripts')
<!-- FontAwesome CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    /* CSS untuk memastikan map tidak tertutup navbar */
    #map {
        z-index: 1 !important;
        position: relative !important;
    }
    
    .leaflet-container {
        z-index: 1 !important;
    }
    
    .leaflet-control-container {
        z-index: 1000 !important;
    }
    
    .leaflet-popup {
        z-index: 1001 !important;
    }
    
    /* Pastikan navbar tidak menutupi map */
    .navbar {
        z-index: 9999 !important;
    }
</style>
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Koordinat Kampung Skouw Yambe yang akurat
        const skouwYambe = [-2.612338, 140.850206];
        
        // Map untuk section Lokasi Kami
        setTimeout(function() {
            const mapElement = document.getElementById('map');
            if (!mapElement) {
                console.error('Map element not found');
                return;
            }
            
            const map = L.map('map', {
                zoomControl: false
            }).setView(skouwYambe, 15);

            L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                attribution: '&copy; <a href="https://www.google.com/maps">Google Maps</a>',
                maxZoom: 20
            }).addTo(map);

            const marker = L.marker(skouwYambe, {
                title: "Kampung Skouw Yambe"
            }).addTo(map);

            marker.bindPopup(`
                <div class="p-2">
                    <h3 class="font-bold text-lg">Kampung Skouw Yambe</h3>
                    <p class="text-sm">Muara Tami, Jayapura, Papua</p>
                    <p class="text-sm mt-2">Koordinat: 2°36'44.4"S 140°51'00.7"E</p>
                </div>
            `);

            const circle = L.circle(skouwYambe, {
                color: '#22c55e',
                fillColor: '#22c55e',
                fillOpacity: 0.1,
                radius: 300
            }).addTo(map);

            L.control.zoom({
                position: 'bottomright'
            }).addTo(map);

            map.invalidateSize();
            
        }, 100);
    });
</script>
@endsection

@section('content')
    <!-- Hero Carousel -->
<div class="relative h-screen overflow-hidden" id="hero">
    <!-- Carousel Wrapper -->
    <div class="absolute inset-0 flex transition-transform duration-700 ease-in-out" id="carousel-wrapper">
        <!-- Slide 1 -->
        <div class="relative w-full flex-shrink-0">
            <img loading="lazy" src="{{ asset('images/1.jpg') }}" alt="Kampung Skouw Yambe" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>
        <!-- Slide 2 -->
        <div class="relative w-full flex-shrink-0">
            <img loading="lazy" src="{{ asset('images/2.jpg') }}" alt="Kampung Skouw Yambe 2" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>
        <!-- Slide 3 -->
        <div class="relative w-full flex-shrink-0">
            <img loading="lazy" src="{{ asset('images/3.jpg') }}" alt="Kampung Skouw Yambe 3" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>
    </div>

    <!-- Hero Text -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 h-full flex items-center">
        <div class="text-white w-full text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Selamat Datang di Website Resmi Kampung Skouw Yambe, Kecamatan Muara Tami, Kota Jayapura, Papua
            </h1>
            <p class="text-base md:text-lg mb-6 max-w-2xl mx-auto">
                Kampung Skouw Yambe adalah salah satu kampung di Kecamatan Muara Tami, Kota Jayapura, Papua. Kampung ini dikenal dengan keindahan alam, kekayaan budaya, dan potensi UMKM yang berkembang.
            </p>
            <div class="flex justify-center gap-4">
                <a href="#jelajahi" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-md transition-colors duration-300">
                    Jelajahi Desa
                </a>
            </div>
        </div>
    </div>

    <!-- Navigation Buttons -->
    <button id="prev" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black/40 text-white p-2 rounded-full hover:bg-black/60">
        &#10094;
    </button>
    <button id="next" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black/40 text-white p-2 rounded-full hover:bg-black/60">
        &#10095;
    </button>
</div>

<script>
    const wrapper = document.getElementById('carousel-wrapper');
    const totalSlides = wrapper.children.length;
    let index = 0;

    function showSlide(i) {
        wrapper.style.transform = `translateX(-${i * 100}%)`;
    }

    document.getElementById('next').addEventListener('click', () => {
        index = (index + 1) % totalSlides;
        showSlide(index);
    });

    document.getElementById('prev').addEventListener('click', () => {
        index = (index - 1 + totalSlides) % totalSlides;
        showSlide(index);
    });

    // Auto-slide every 5 seconds
    setInterval(() => {
        index = (index + 1) % totalSlides;
        showSlide(index);
    }, 5000);
</script>


  

    <!-- Section Sambutan Kepala Kampung -->
    <section id="sambutan" class="py-20 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <div class="mx-auto w-32 h-32 rounded-full bg-green-100 flex items-center justify-center mb-6 shadow-lg">
                <i class="fas fa-crown text-green-600 text-4xl"></i>
            </div>
            <h2 class="text-2xl font-bold mb-2 text-green-700">Sambutan Kepala Kampung</h2>
            <p class="text-lg text-gray-700 mb-4">Assalamu'alaikum warahmatullahi wabarakatuh, Salam sejahtera untuk kita semua. Selamat datang di website resmi Kampung Skouw Yambe. Semoga website ini menjadi jendela informasi, komunikasi, dan pelayanan publik yang bermanfaat bagi seluruh warga dan pengunjung. Mari bersama membangun kampung yang maju, sejahtera, dan berbudaya.</p>
            <p class="font-semibold text-green-800">Marshelius Membilong<br><span class="text-sm text-gray-600">Kepala Kampung Skouw Yambe</span></p>
        </div>
    </section>

    <!-- Jeda Section -->
    <section class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Struktur Organisasi Kampung</h3>
            <p class="text-gray-600">Berikut adalah struktur organisasi pemerintahan Kampung Skouw Yambe yang terdiri dari Kepala Kampung, Sekretaris, Kepala Urusan, Kepala Seksi, dan Ketua RW.</p>
        </div>
    </section>
    
<section id="struktur" class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-center mb-12 text-gray-800">Struktur Organisasi Kampung</h2>

        <!-- Kepala Kampung -->
            <div class="flex justify-center mb-12">
                <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center w-48">
                    <div class="w-20 h-20 rounded-full mb-3 bg-green-100 flex items-center justify-center">
                        <i class="fas fa-crown text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-base font-bold text-gray-800 mb-1 text-center">Marshelius Membilong</h3>
                <p class="text-gray-600 text-sm text-center">Kepala Kampung</p>
            </div>
        </div>

        <!-- Sekretaris & Kaur -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
                <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full mb-3 bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-user-tie text-blue-600 text-lg"></i>
                    </div>
                    <h3 class="text-sm font-bold text-gray-800 mb-1 text-center">Yansen Pattipeme</h3>
                    <p class="text-gray-600 text-xs text-center">Sekretaris</p>
                </div>
                
                <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full mb-3 bg-green-100 flex items-center justify-center">
                        <i class="fas fa-calculator text-green-600 text-lg"></i>
            </div>
                    <h3 class="text-sm font-bold text-gray-800 mb-1 text-center">Eunike Pattipeme, SE</h3>
                    <p class="text-gray-600 text-xs text-center">Kepala Urusan Keuangan</p>
            </div>
                
                <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full mb-3 bg-purple-100 flex items-center justify-center">
                        <i class="fas fa-clipboard-list text-purple-600 text-lg"></i>
            </div>
                    <h3 class="text-sm font-bold text-gray-800 mb-1 text-center">George Pattipeme, S.IP</h3>
                    <p class="text-gray-600 text-xs text-center">Kepala Urusan Umum</p>
        </div>

                <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full mb-3 bg-orange-100 flex items-center justify-center">
                        <i class="fas fa-chart-line text-orange-600 text-lg"></i>
                    </div>
                    <h3 class="text-sm font-bold text-gray-800 mb-1 text-center">Dody P. Doleng, S.IP</h3>
                    <p class="text-gray-600 text-xs text-center">Kepala Perencanaan dan Pembangunan</p>
            </div>
        </div>

        <!-- Kasi -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full mb-3 bg-indigo-100 flex items-center justify-center">
                        <i class="fas fa-landmark text-indigo-600 text-lg"></i>
                    </div>
                    <h3 class="text-sm font-bold text-gray-800 mb-1 text-center">Christofel Rollo, S.IP</h3>
                    <p class="text-gray-600 text-xs text-center">Kepala Seksi Pemerintahan</p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full mb-3 bg-pink-100 flex items-center justify-center">
                        <i class="fas fa-heart text-pink-600 text-lg"></i>
                    </div>
                    <h3 class="text-sm font-bold text-gray-800 mb-1 text-center">Nelly P. Rumanasen</h3>
                    <p class="text-gray-600 text-xs text-center">Kepala Seksi Kesejahteraan Masyarakat</p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full mb-3 bg-teal-100 flex items-center justify-center">
                        <i class="fas fa-hands-helping text-teal-600 text-lg"></i>
                    </div>
                    <h3 class="text-sm font-bold text-gray-800 mb-1 text-center">Denisius Rollo</h3>
                    <p class="text-gray-600 text-xs text-center">Kepala Seksi Pelayanan</p>
            </div>
            </div>

                        <!-- Ketua RW -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full mb-3 bg-red-100 flex items-center justify-center">
                        <i class="fas fa-users text-red-600 text-lg"></i>
            </div>
                    <h3 class="text-sm font-bold text-gray-800 mb-1 text-center">Yehuda Pattipeme</h3>
                    <p class="text-gray-600 text-xs text-center">Ketua RW I</p>
        </div>

                <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full mb-3 bg-yellow-100 flex items-center justify-center">
                        <i class="fas fa-home text-yellow-600 text-lg"></i>
                    </div>
                    <h3 class="text-sm font-bold text-gray-800 mb-1 text-center">Yunita Ramela</h3>
                    <p class="text-gray-600 text-xs text-center">Ketua RW II</p>
                </div>
            </div>
    </div>
</section>

    <!-- Informasi Tambahan Struktur -->
    <section class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Tentang Struktur Organisasi</h3>
            <p class="text-gray-600 mb-6">
                Struktur organisasi Kampung Skouw Yambe mengikuti ketentuan perundang-undangan yang berlaku. 
                Setiap anggota memiliki tugas dan fungsi yang jelas dalam melayani masyarakat dan mengembangkan kampung.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="font-semibold text-green-700 mb-2">Kepala Kampung</h4>
                    <p class="text-sm text-gray-600">Memimpin dan mengkoordinasikan seluruh kegiatan pemerintahan kampung</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="font-semibold text-green-700 mb-2">Sekretaris & Kaur</h4>
                    <p class="text-sm text-gray-600">Membantu kepala kampung dalam administrasi dan urusan teknis</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="font-semibold text-green-700 mb-2">Kasi & RW</h4>
                    <p class="text-sm text-gray-600">Melaksanakan tugas di tingkat seksi dan rukun warga</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Section Administrasi Penduduk -->
    <section id="administrasi" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8 text-green-800">Administrasi Penduduk</h2>
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div class="bg-green-50 rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-bold text-green-700 mb-2">Jumlah Penduduk</h3>
                    <p class="text-3xl font-bold text-gray-900">{{ number_format($totalPendudukHome ?? 0) }}</p>
                    <p class="text-gray-600">Jiwa</p>
                </div>
                <div class="bg-green-50 rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-bold text-green-700 mb-2">Kepala Keluarga</h3>
                    <p class="text-3xl font-bold text-gray-900">{{ isset($kepalaKeluargaHome) ? number_format($kepalaKeluargaHome) : '-' }}</p>
                    <p class="text-gray-600">KK</p>
                </div>
                <div class="bg-green-50 rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-bold text-green-700 mb-2">Laki-laki</h3>
                    <p class="text-3xl font-bold text-gray-900">{{ isset($lakiHome) ? number_format($lakiHome) : '-' }}</p>
                    <p class="text-gray-600">Jiwa</p>
                </div>
                <div class="bg-green-50 rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-bold text-green-700 mb-2">Perempuan</h3>
                    <p class="text-3xl font-bold text-gray-900">{{ isset($perempuanHome) ? number_format($perempuanHome) : '-' }}</p>
                    <p class="text-gray-600">Jiwa</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Potensi Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-900">Potensi Kampung</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 rounded-xl p-6 shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-2 border-2 border-green-400 border-opacity-60 hover:border-green-600 hover:border-4 bg-gradient-to-br from-white via-green-50 to-green-100">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Pertanian</h3>
                    <p class="text-gray-600">Kampung Skouw Yambe memiliki lahan pertanian yang subur dengan hasil panen melimpah.</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-6 shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-2 border-2 border-green-400 border-opacity-60 hover:border-green-600 hover:border-4 bg-gradient-to-br from-white via-green-50 to-green-100">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Pariwisata</h3>
                    <p class="text-gray-600">Destinasi wisata alam yang menawarkan pemandangan indah dan pengalaman budaya.</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-6 shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-2 border-2 border-green-400 border-opacity-60 hover:border-green-600 hover:border-4 bg-gradient-to-br from-white via-green-50 to-green-100">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Budaya</h3>
                    <p class="text-gray-600">Kekayaan budaya lokal yang terjaga dengan baik dan menjadi daya tarik wisata.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-900">Galeri Kampung</h2>
            @if($featuredGallery->count() === 0)
                <div class="text-center text-gray-600">Belum ada galeri aktif.</div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($featuredGallery as $gallery)
                        <div class="relative group overflow-hidden rounded-lg">
                            @if($gallery->image_path)
                                <img loading="lazy" src="{{ Storage::disk('public')->url($gallery->image_path) }}" alt="{{ e($gallery->title) }}" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-300">
                            @else
                                <div class="w-full h-64 bg-gray-200 flex items-center justify-center">Gambar</div>
                            @endif
                            <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                                <p class="text-white text-lg font-medium">{{ e($gallery->title ?? 'Galeri') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            </div>
        </div>
    </section>

    <!-- Berita Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Berita Terkini</h2>
            @if($latestArticles->count() === 0)
                <div class="text-center text-gray-600">Belum ada berita.</div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($latestArticles as $article)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-800 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 group">
                            <div class="relative overflow-hidden">
                                @if($article->featured_image)
                                    <a href="{{ route('berita.detail', $article->slug) }}">
                                        <img loading="lazy" src="{{ Storage::disk('public')->url($article->featured_image) }}" alt="{{ e($article->title) }}" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                                    </a>
                                @endif
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors">
                                    <a href="{{ route('berita.detail', $article->slug) }}">{{ e($article->title) }}</a>
                                </h3>
                                @if($article->excerpt)
                                    <p class="text-black mb-4">{{ \Illuminate\Support\Str::limit($article->excerpt, 120) }}</p>
                                @endif
                                <a href="{{ route('berita.detail', $article->slug) }}" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-green-600 text-white hover:bg-green-700 h-10 px-4 py-2 w-full border-2 border-green-600 hover:border-green-700 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Lokasi Kami</h2>
                <p class="text-base text-black ">Kampung Skouw Yambe, Muara Tami, Jayapura, Papua</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div id="map" class="w-full h-[400px] z-0"></div>
                </div>
                <div class="space-y-6">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-semibold mb-4">Alamat</h3>
                        <p class="text-gray-600">Kampung Skouw Yambe, Jayapura, Papua</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-semibold mb-4">Akses</h3>
                        <ul class="text-gray-600 space-y-2">
                            <li>• 30 menit dari Bandara Sentani</li>
                            <li>• 45 menit dari Kota Jayapura</li>
                            <li>• Akses transportasi umum tersedia</li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-semibold mb-4">Jam Operasional</h3>
                        <ul class="text-gray-600 space-y-2">
                            <li>• Senin - Jumat: 08:00 - 17:00</li>
                            <li>• Sabtu: 08:00 - 15:00</li>
                            <li>• Minggu: Tutup</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sejarah Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-900">Sejarah Kampung</h2>
            <div class="text-center mb-8">
                <p class="text-gray-800 max-w-2xl mx-auto mb-6 text-lg">
                    Kampung Skouw Yambe memiliki sejarah panjang yang kaya akan budaya dan peran penting dalam sejarah Indonesia. 
                    Mari kita jelajahi lebih dalam tentang asal-usul dan perjalanan kampung kami.
                </p>
    
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Asal Usul</h3>
                    <p class="text-gray-800">Kampung yang kaya akan sejarah dan budaya di Distrik Muara Tami, Kota Jayapura, Papua.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Perang Dunia II</h3>
                    <p class="text-gray-800">Memiliki peran penting dalam sejarah Perang Dunia II dengan peninggalan lapangan terbang Jepang.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Masa Kini</h3>
                    <p class="text-gray-800">Desa Wisata Tetang Pe yang masuk 500 besar ADWI 2024 dengan berbagai potensi wisata.</p>
                </div>
            </div>
        </div>
    </section>
@endsection 