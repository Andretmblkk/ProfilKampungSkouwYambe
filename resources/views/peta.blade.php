@extends('layouts.app')

@section('title', 'Peta Kampung')

@section('scripts')
<!-- Leaflet JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var map = L.map('kampung-map').setView([-2.612338, 140.850206], 16);
    // Esri World Imagery (satelit)
    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    }).addTo(map);
    // Interest Points (koordinat lebih akurat, dummy realistis)
    var points = [
        {
            name: 'Pantai Skouw Yambe',
            desc: 'Wisata pantai berpasir hitam, sunrise & sunset.',
            lat: -2.610900, lon: 140.853200
        },
        {
            name: 'Rumah Adat Tangfa',
            desc: 'Pusat kegiatan adat & budaya.',
            lat: -2.613000, lon: 140.849800
        },
        {
            name: 'Konservasi Penyu',
            desc: 'Lokasi pelestarian penyu dan edukasi lingkungan.',
            lat: -2.611800, lon: 140.851800
        },
        {
            name: 'Kebun Kelapa',
            desc: 'Sentra produksi kelapa dan minyak kelapa.',
            lat: -2.614200, lon: 140.848500
        },
        {
            name: 'Balai Kampung',
            desc: 'Kantor pemerintahan dan pelayanan publik.',
            lat: -2.612338, lon: 140.850206
        }
    ];
    points.forEach(function(p) {
        L.marker([p.lat, p.lon]).addTo(map)
            .bindPopup('<b>' + p.name + '</b><br>' + p.desc);
    });
});
</script>
@endsection

@section('content')
<div class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-8 text-green-800">Peta Interaktif Kampung Skouw Yambe</h1>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="md:col-span-2">
                <div id="kampung-map" class="w-full h-[500px] rounded-xl shadow-lg"></div>
            </div>
            <div>
                <h2 class="text-xl font-bold mb-4 text-green-700">Interest Point</h2>
                <ul class="list-disc pl-6 text-gray-700 space-y-2">
                    <li><span class="font-bold">Pantai Skouw Yambe:</span> Wisata pantai berpasir hitam, sunrise & sunset.</li>
                    <li><span class="font-bold">Rumah Adat Tangfa:</span> Pusat kegiatan adat & budaya.</li>
                    <li><span class="font-bold">Konservasi Penyu:</span> Lokasi pelestarian penyu dan edukasi lingkungan.</li>
                    <li><span class="font-bold">Kebun Kelapa:</span> Sentra produksi kelapa dan minyak kelapa.</li>
                    <li><span class="font-bold">Balai Kampung:</span> Kantor pemerintahan dan pelayanan publik.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection 