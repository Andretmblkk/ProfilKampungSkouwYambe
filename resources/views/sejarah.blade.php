@extends('layouts.app')

@section('title', 'Sejarah Kampung')

@section('content')
<!-- Hero Section -->
<div class="relative h-72 md:h-96 overflow-hidden">
    <img src="/images/1.jpg" alt="Sejarah Kampung Skouw Yambe" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="relative max-w-7xl mx-auto px-4 h-full flex items-center justify-center text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">Sejarah Kampung Skouw Yambe</h1>
            <p class="text-xl text-amber-100 mb-0 leading-relaxed">Perjalanan panjang kampung dari masa lalu hingga masa kini</p>
        </div>
    </div>
</div>

<!-- Content -->
<div class="bg-gray-50 py-16">
    <div class="max-w-5xl mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
            <div class="prose max-w-none">
                <p>Kampung Skouw Yambe memiliki sejarah panjang yang dimulai dari masa awal pembentukan kampung hingga perkembangan saat ini. Berbagai suku dan kelompok masyarakat telah berkontribusi dalam membangun identitas kampung ini.</p>
            </div>

            <div class="mt-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Garis Waktu</h2>
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="w-3 h-3 rounded-full bg-amber-600 mt-1.5 mr-3"></div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Abad XVII - 1945: Masa Kepemimpinan Adat</h3>
                            <p class="text-gray-600">Periode kekuasaan adat dipimpin oleh Kepala-Kepala Suku.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-3 h-3 rounded-full bg-amber-600 mt-1.5 mr-3"></div>
                        <div>
                            <h3 class="font-semibold text-gray-900">1945 - 1972: Korano (Kepala Kampung)</h3>
                            <p class="text-gray-600">Pemerintahan definitif dipimpin oleh Korano (Kepala Kampung).</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-3 h-3 rounded-full bg-amber-600 mt-1.5 mr-3"></div>
                        <div>
                            <h3 class="font-semibold text-gray-900">1972 - Sekarang: Pemerintah Desa</h3>
                            <p class="text-gray-600">Struktur pemerintahan berubah menjadi Pemerintah Desa dengan perkembangan menuju kampung modern.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Tokoh dan Periode</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-gray-700 rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="py-3 px-4 font-semibold">Nama</th>
                                <th class="py-3 px-4 font-semibold">Periode</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td class="py-2 px-4">Yakob Patipeme</td><td class="py-2 px-4">1945-1947</td></tr>
                            <tr><td class="py-2 px-4">Wellem Rollo</td><td class="py-2 px-4">1947-1956</td></tr>
                            <tr><td class="py-2 px-4">Herman Rollo</td><td class="py-2 px-4">1956-1965</td></tr>
                            <tr><td class="py-2 px-4">Markus Pattipeme</td><td class="py-2 px-4">1965-1976</td></tr>
                            <tr><td class="py-2 px-4">Marinus Rollo</td><td class="py-2 px-4">1976-1968</td></tr>
                            <tr><td class="py-2 px-4">Dominggus Foa</td><td class="py-2 px-4">1968-1972</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
