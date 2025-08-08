@extends('layouts.app')

@section('title', 'UMKM & Potensi')

@section('content')
<div class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-8 text-green-800">UMKM & Potensi Kampung Skouw Yambe</h1>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-green-50 rounded-xl shadow-lg p-6 flex flex-col items-center">
                <img src="/images/umkm1.jpg" alt="UMKM 1" class="w-32 h-32 object-cover rounded-full mb-4">
                <h2 class="text-xl font-semibold mb-2 text-green-700">Papeda Skouw</h2>
                <p class="text-gray-700 mb-2 text-center">Produsen papeda instan dan olahan sagu khas Skouw Yambe, diproduksi oleh kelompok ibu-ibu kampung.</p>
                <p class="text-gray-600 text-sm mb-1">Kontak: 0812-1234-5678</p>
            </div>
            <div class="bg-green-50 rounded-xl shadow-lg p-6 flex flex-col items-center">
                <img src="/images/umkm2.jpg" alt="UMKM 2" class="w-32 h-32 object-cover rounded-full mb-4">
                <h2 class="text-xl font-semibold mb-2 text-green-700">Kerajinan Noken</h2>
                <p class="text-gray-700 mb-2 text-center">UMKM kerajinan noken dan anyaman khas Papua, hasil karya pemuda Skouw Yambe.</p>
                <p class="text-gray-600 text-sm mb-1">Kontak: 0821-2345-6789</p>
            </div>
            <div class="bg-green-50 rounded-xl shadow-lg p-6 flex flex-col items-center">
                <img src="/images/umkm3.jpg" alt="UMKM 3" class="w-32 h-32 object-cover rounded-full mb-4">
                <h2 class="text-xl font-semibold mb-2 text-green-700">Kelapa Muda Yambe</h2>
                <p class="text-gray-700 mb-2 text-center">Kelompok tani penghasil kelapa muda, minyak kelapa, dan hasil kebun lokal yang dipasarkan ke Jayapura.</p>
                <p class="text-gray-600 text-sm mb-1">Kontak: 0852-3456-7890</p>
            </div>
        </div>
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-4 text-green-700">Potensi Kampung</h2>
            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                <li>Pertanian sagu, kelapa, dan hortikultura</li>
                <li>Perikanan dan budidaya ikan air tawar</li>
                <li>Kerajinan tangan noken dan anyaman</li>
                <li>Ekowisata pantai, konservasi penyu, dan wisata budaya</li>
            </ul>
        </div>
    </div>
</div>
@endsection 