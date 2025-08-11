@extends('layouts.app')

@section('title', 'Beranda')

@section('scripts')
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Koordinat Kampung Skouw Yambe yang akurat
        const skouwYambe = [-2.612338, 140.850206];
        
        // Membuat peta dengan zoom level yang lebih dekat
        const map = L.map('map').setView(skouwYambe, 16);

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
    <div class="relative h-screen" id="hero">
        <div class="absolute inset-0">
            <img src="{{ asset('images/1.jpg') }}" alt="Kampung Skouw Yambe" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 h-full flex items-center">
            <div class="text-white w-full">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 text-center">
                    Selamat Datang di Website Resmi Kampung Skouw Yambe, Kecamatan Muara Tami, Kota Jayapura, Papua
                </h1>
                <p class="text-base md:text-lg mb-6 max-w-2xl mx-auto text-center">
                    Kampung Skouw Yambe adalah salah satu kampung di Kecamatan Muara Tami, Kota Jayapura, Papua. Kampung ini dikenal dengan keindahan alam, kekayaan budaya, dan potensi UMKM yang berkembang. Masyarakatnya hidup rukun, menjaga tradisi, dan aktif dalam berbagai kegiatan pembangunan kampung. Website ini menjadi pusat informasi resmi, berita, dan layanan digital untuk seluruh warga dan pengunjung Kampung Skouw Yambe.
                </p>
                <div class="flex flex-wrap justify-center gap-4 mb-8">
                    <a href="#jelajahi" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-md transition-colors duration-300">Jelajahi Desa</a>
                   
                </div>
            </div>
        </div>
    </div>

  

    <!-- Section Sambutan Kepala Kampung -->
    <section id="sambutan" class="py-20 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <img src="/images/contoh.png" alt="Kepala Kampung" class="mx-auto w-32 h-32 rounded-full object-cover mb-6 shadow-lg">
            <h2 class="text-2xl font-bold mb-2 text-green-700">Sambutan Kepala Kampung</h2>
            <p class="text-lg text-gray-700 mb-4">Assalamu'alaikum warahmatullahi wabarakatuh, Salam sejahtera untuk kita semua. Selamat datang di website resmi Kampung Skouw Yambe. Semoga website ini menjadi jendela informasi, komunikasi, dan pelayanan publik yang bermanfaat bagi seluruh warga dan pengunjung. Mari bersama membangun kampung yang maju, sejahtera, dan berbudaya.</p>
            <p class="font-semibold text-green-800">marshelius membilong<br><span class="text-sm font-normal text-gray-600">Kepala Kampung Skouw Yambe</span></p>
        </div>
    </section>

    <!-- Section Map Kampung -->
    <section id="map" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8 text-green-800">Peta Kampung Skouw Yambe</h2>
            <div class="w-full h-64 rounded-xl overflow-hidden shadow-lg mb-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.9999999999995!2d140.6!3d-2.5!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x686c3b3b3b3b3b3b%3A0x3b3b3b3b3b3b3b3b!2sKampung%20Skouw%20Yambe%2C%20Muara%20Tami%2C%20Jayapura%2C%20Papua!5e0!3m2!1sid!2sid!4v1234567890!5m2!1sid!2sid&maptype=satellite" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="text-center">
                <a href="https://www.google.com/maps?q=-2.612338,140.850206" target="_blank" class="inline-block bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg text-lg font-medium transition duration-300">Lihat di Google Maps</a>
            </div>
        </div>
    </section>

    <!-- Section Struktur Organisasi -->
    <section id="struktur" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8 text-green-800">Struktur Organisasi Kampung</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Kepala Kampung -->
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <img src="/images/contoh.png" alt="Kepala Kampung" class="w-90 h-82 object-cover rounded-full mb-4">
                    <h3 class="text-lg font-bold text-green-700 mb-1">Marshelius membilong</h3>
                    <p class="text-gray-600 text-center">Kepala Kampung</p>
                </div>

                <!-- Sekretaris -->
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <img src="/images/contoh.png" alt="Sekretaris" class="w-90 h-82 object-cover rounded-full mb-4">
                    <h3 class="text-lg font-bold text-green-700 mb-1">Yansen Pattipeme</h3>
                    <p class="text-gray-600 text-center">Sekretaris</p>
                </div>

                <!-- Kaur Keuangan -->
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <img src="/images/contoh.png" alt="Kepala Urusan Keuangan" class="w-90 h-82 object-cover rounded-full mb-4">
                    <h3 class="text-lg font-bold text-green-700 mb-1">Eunike Pattipeme, SE</h3>
                    <p class="text-gray-600 text-center">Kepala Urusan Keuangan</p>
                </div>

                <!-- Kaur Umum -->
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <img src="/images/contoh.png" alt="Kepala Urusan Umum" class="w-90 h-82 object-cover rounded-full mb-4">
                    <h3 class="text-lg font-bold text-green-700 mb-1">George Pattipeme, S.IP</h3>
                    <p class="text-gray-600 text-center">Kepala Urusan Umum</p>
                </div>

                <!-- Kaur Perencanaan -->
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <img src="/images/contoh.png" alt="Kepala Perencanaan dan Pembangunan" class="w-90 h-82 object-cover rounded-full mb-4">
                    <h3 class="text-lg font-bold text-green-700 mb-1">Dody P. Doleng, S.IP</h3>
                    <p class="text-gray-600 text-center">Kepala Perencanaan dan Pembangunan</p>
                </div>

                <!-- Kasi Pemerintahan -->
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <img src="/images/contoh.png" alt="Kepala Seksi Pemerintahan" class="w-90 h-82 object-cover rounded-full mb-4">
                    <h3 class="text-lg font-bold text-green-700 mb-1">Christofel Rollo, S.IP</h3>
                    <p class="text-gray-600 text-center">Kepala Seksi Pemerintahan</p>
                </div>

                <!-- Kasi Kesejahteraan -->
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <img src="/images/contoh.png" alt="Kepala Seksi Kesejahteraan Masyarakat" class="w-90 h-82 object-cover rounded-full mb-4">
                    <h3 class="text-lg font-bold text-green-700 mb-1">Nelly P. Rumanasen</h3>
                    <p class="text-gray-600 text-center">Kepala Seksi Kesejahteraan Masyarakat</p>
                </div>

                <!-- Kasi Pelayanan -->
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <img src="/images/contoh.png" alt="Kepala Seksi Pelayanan" class="w-90 h-82 object-cover rounded-full mb-4">
                    <h3 class="text-lg font-bold text-green-700 mb-1">Denisius Rollo</h3>
                    <p class="text-gray-600 text-center">Kepala Seksi Pelayanan</p>
                </div>

                <!-- Ketua RW I -->
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <img src="/images/contoh.png" alt="Ketua RW I" class="w-90 h-82 object-cover rounded-full mb-4">
                    <h3 class="text-lg font-bold text-green-700 mb-1">Yehuda Pattipeme</h3>
                    <p class="text-gray-600 text-center">Ketua RW I</p>
                </div>

                <!-- Ketua RW II -->
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <img src="/images/contoh.png" alt="Ketua RW II" class="w-90 h-82 object-cover rounded-full mb-4">
                    <h3 class="text-lg font-bold text-green-700 mb-1">Yunita Ramela</h3>
                    <p class="text-gray-600 text-center">Ketua RW II</p>
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
                    <p class="text-3xl font-bold text-gray-900">185</p>
                    <p class="text-gray-600">Jiwa</p>
                </div>
                <div class="bg-green-50 rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-bold text-green-700 mb-2">Kepala Keluarga</h3>
                    <p class="text-3xl font-bold text-gray-900">185</p>
                    <p class="text-gray-600">KK</p>
                </div>
                <div class="bg-green-50 rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-bold text-green-700 mb-2">Laki-laki</h3>
                    <p class="text-3xl font-bold text-gray-900">339</p>
                    <p class="text-gray-600">Jiwa</p>
                </div>
                <div class="bg-green-50 rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-bold text-green-700 mb-2">Perempuan</h3>
                    <p class="text-3xl font-bold text-gray-900">363</p>
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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="relative group overflow-hidden rounded-lg">
                    <img src="/images/2.png" alt="Galeri 1" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-300">
                    <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                        <p class="text-white text-lg font-medium">Pemandangan Alam</p>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-lg">
                    <img src="/images/3.png" alt="Galeri 2" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-300">
                    <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                        <p class="text-white text-lg font-medium">Budaya Tradisional</p>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-lg">
                    <img src="/images/4.png" alt="Galeri 3" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-300">
                    <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                        <p class="text-white text-lg font-medium">Kegiatan Masyarakat</p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-8">
                <a href="/galeri" class="inline-block bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg text-lg font-medium transition duration-300">
                    Lihat Semua Galeri
                </a>
            </div>
        </div>
    </section>

    <!-- Berita Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Berita Terkini</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Berita Card 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-800 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 group">
                    <div class="relative overflow-hidden">
                        <img src="/images/1.png" alt="Berita 1" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors">Pembangunan Infrastruktur di Kampung Skouw Yambe</h3>
                        <p class="text-black mb-4">Pemerintah setempat melakukan pembangunan infrastruktur untuk meningkatkan kualitas hidup warga.</p>
                        <a href="https://www.papua.go.id/view-detail-berita-123/pembangunan-infrastruktur-di-kampung-skouw-yambe" target="_blank" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-green-600 text-white hover:bg-green-700 h-10 px-4 py-2 w-full border-2 border-green-600 hover:border-green-700 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>

                <!-- Berita Card 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-800 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 group">
                    <div class="relative overflow-hidden">
                        <img src="/images/2.png" alt="Berita 2" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors">Festival Budaya Kampung Skouw Yambe</h3>
                        <p class="text-black mb-4">Festival budaya tahunan kembali digelar untuk melestarikan warisan budaya lokal.</p>
                        <a href="https://www.papua.go.id/view-detail-berita-124/festival-budaya-kampung-skouw-yambe" target="_blank" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-green-600 text-white hover:bg-green-700 h-10 px-4 py-2 w-full border-2 border-green-600 hover:border-green-700 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>

                <!-- Berita Card 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-800 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 group">
                    <div class="relative overflow-hidden">
                        <img src="/images/3.png" alt="Berita 3" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors">Program Pemberdayaan Masyarakat</h3>
                        <p class="text-black mb-4">Program pemberdayaan masyarakat untuk meningkatkan ekonomi warga kampung.</p>
                        <a href="https://www.papua.go.id/view-detail-berita-125/program-pemberdayaan-masyarakat-kampung-skouw-yambe" target="_blank" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-green-600 text-white hover:bg-green-700 h-10 px-4 py-2 w-full border-2 border-green-600 hover:border-green-700 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
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
                <a href="{{ route('sejarah') }}" class="inline-flex items-center justify-center rounded-md bg-green-600 px-6 py-3 text-sm font-medium text-white shadow transition-colors hover:bg-green-700 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-green-500 disabled:pointer-events-none disabled:opacity-50">
                    Baca Selengkapnya
                </a>
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