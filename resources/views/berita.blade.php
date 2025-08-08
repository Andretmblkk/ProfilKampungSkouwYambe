@extends('layouts.app')

@section('title', 'Berita Kampung')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-8 text-green-800">Berita & Kegiatan Kampung Skouw Yambe</h1>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
                <h2 class="text-xl font-semibold mb-2 text-green-700">Pelatihan Pengolahan Sagu untuk UMKM</h2>
                <p class="text-gray-500 text-sm mb-2">12 Juni 2024</p>
                <p class="text-gray-700 mb-4">Kampung Skouw Yambe mengadakan pelatihan pengolahan sagu menjadi produk bernilai tambah bagi pelaku UMKM lokal.</p>
                <a href="#" class="text-green-600 hover:underline mt-auto">Baca Selengkapnya</a>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
                <h2 class="text-xl font-semibold mb-2 text-green-700">Festival Budaya Skouw Yambe 2024</h2>
                <p class="text-gray-500 text-sm mb-2">5 Juni 2024</p>
                <p class="text-gray-700 mb-4">Festival budaya tahunan Skouw Yambe menampilkan lomba tradisional, pameran UMKM, dan pertunjukan seni Papua.</p>
                <a href="#" class="text-green-600 hover:underline mt-auto">Baca Selengkapnya</a>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
                <h2 class="text-xl font-semibold mb-2 text-green-700">Pembangunan Jalan Kampung</h2>
                <p class="text-gray-500 text-sm mb-2">28 Mei 2024</p>
                <p class="text-gray-700 mb-4">Jalan kampung sepanjang 2 km selesai dibangun untuk memudahkan akses warga ke kebun dan pantai Skouw Yambe.</p>
                <a href="#" class="text-green-600 hover:underline mt-auto">Baca Selengkapnya</a>
            </div>
        </div>
        <!-- Pagination Dummy -->
        <div class="flex justify-center space-x-2">
            <a href="#" class="px-4 py-2 rounded bg-green-600 text-white font-bold">1</a>
            <a href="#" class="px-4 py-2 rounded bg-gray-200 text-gray-700 hover:bg-green-100">2</a>
            <a href="#" class="px-4 py-2 rounded bg-gray-200 text-gray-700 hover:bg-green-100">3</a>
        </div>
    </div>
</div>
@endsection 