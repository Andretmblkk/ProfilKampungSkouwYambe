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
			lat: -2.610900, 
			lon: 140.853200,
			icon: '🏖️',
			category: 'Wisata'
		},
		{
			name: 'Rumah Adat Tangfa',
			desc: 'Pusat kegiatan adat & budaya.',
			lat: -2.613000, 
			lon: 140.849800,
			icon: '🏛️',
			category: 'Budaya'
		},
		{
			name: 'Konservasi Penyu',
			desc: 'Lokasi pelestarian penyu dan edukasi lingkungan.',
			lat: -2.611800, 
			lon: 140.851800,
			icon: '🐢',
			category: 'Konservasi'
		},
		{
			name: 'Kebun Kelapa',
			desc: 'Sentra produksi kelapa dan minyak kelapa.',
			lat: -2.614200, 
			lon: 140.848500,
			icon: '🌴',
			category: 'Pertanian'
		},
		{
			name: 'Balai Kampung',
			desc: 'Kantor pemerintahan dan pelayanan publik.',
			lat: -2.612338, 
			lon: 140.850206,
			icon: '🏢',
			category: 'Pemerintahan'
		}
	];
	
	// Custom marker icons
	var customIcon = L.divIcon({
		html: '<div class="custom-marker"></div>',
		className: 'custom-marker-container',
		iconSize: [40, 40],
		iconAnchor: [20, 40]
	});
	
	points.forEach(function(p) {
		var marker = L.marker([p.lat, p.lon], {icon: customIcon}).addTo(map);
		
		var popupContent = `
			<div class="custom-popup">
				<div class="popup-header">
					<span class="popup-icon">${p.icon}</span>
					<span class="popup-category">${p.category}</span>
				</div>
				<h3 class="popup-title">${p.name}</h3>
				<p class="popup-desc">${p.desc}</p>
			</div>
		`;
		
		marker.bindPopup(popupContent, {
			maxWidth: 300,
			className: 'custom-popup-container'
		});
	});
	
	// Add zoom control
	L.control.zoom({
		position: 'bottomright'
	}).addTo(map);
});
</script>

<style>
.custom-marker-container {
	background: transparent;
	border: none;
}

.custom-marker {
	width: 40px;
	height: 40px;
	background: linear-gradient(135deg, #10b981, #059669);
	border: 3px solid white;
	border-radius: 50%;
	box-shadow: 0 4px 12px rgba(0,0,0,0.3);
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 18px;
	color: white;
	transition: all 0.3s ease;
}

.custom-marker:hover {
	transform: scale(1.1);
	box-shadow: 0 6px 20px rgba(0,0,0,0.4);
}

.custom-popup-container .leaflet-popup-content-wrapper {
	background: white;
	border-radius: 16px;
	box-shadow: 0 10px 25px rgba(0,0,0,0.15);
	border: none;
}

.custom-popup-container .leaflet-popup-content {
	margin: 0;
	padding: 0;
}

.custom-popup-container .leaflet-popup-tip {
	background: white;
	box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.custom-popup {
	padding: 16px;
	min-width: 250px;
}

.popup-header {
	display: flex;
	align-items: center;
	justify-content: space-between;
	margin-bottom: 8px;
}

.popup-icon {
	font-size: 24px;
}

.popup-category {
	background: #10b981;
	color: white;
	padding: 4px 8px;
	border-radius: 12px;
	font-size: 11px;
	font-weight: 600;
	text-transform: uppercase;
}

.popup-title {
	font-size: 16px;
	font-weight: 700;
	color: #111827;
	margin: 0 0 8px 0;
	line-height: 1.3;
}

.popup-desc {
	font-size: 14px;
	color: #6b7280;
	margin: 0;
	line-height: 1.4;
}
</style>
@endsection

@section('content')
<!-- Hero Section -->
<div class="relative h-72 md:h-96 overflow-hidden">
	<img src="/images/4.png" alt="Peta Kampung Skouw Yambe" class="absolute inset-0 w-full h-full object-cover">
	<div class="absolute inset-0 bg-black/50"></div>
	<div class="relative max-w-7xl mx-auto px-4 h-full flex items-center justify-center text-center">
		<div class="max-w-3xl mx-auto">
			<h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
				Peta Interaktif
				<span class="block text-emerald-200">Kampung Skouw Yambe</span>
			</h1>
			<p class="text-xl text-emerald-100 mb-8 leading-relaxed">
				Jelajahi lokasi-lokasi menarik dan penting di kampung kami melalui peta interaktif yang informatif
			</p>
			<div class="flex flex-wrap justify-center gap-4">
				<div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-2 text-white">
					<span class="font-semibold">5</span> Lokasi Penting
				</div>
				<div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-2 text-white">
					<span class="font-semibold">100%</span> Interaktif
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Main Content -->
<div class="bg-gray-50 py-16">
	<div class="max-w-7xl mx-auto px-4">
		<div class="grid lg:grid-cols-3 gap-8">
			<!-- Map Section -->
			<div class="lg:col-span-2">
				<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
					<div class="flex items-center justify-between mb-6">
						<h2 class="text-2xl font-bold text-gray-900">Peta Kampung</h2>
						<div class="flex items-center space-x-2 text-sm text-gray-600">
							<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
							</svg>
							<span>Peta Satelit</span>
						</div>
					</div>
					
					<div id="kampung-map" class="w-full h-[600px] rounded-xl overflow-hidden border border-gray-200"></div>
					
					<div class="mt-4 text-center">
						<p class="text-sm text-gray-500">
							Gunakan scroll untuk zoom in/out, drag untuk berpindah lokasi
						</p>
					</div>
				</div>
			</div>
			
			<!-- Interest Points Section -->
			<div class="space-y-6">
				<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
					<h2 class="text-2xl font-bold text-gray-900 mb-6">Lokasi Penting</h2>
					
					<div class="space-y-4">
						@php
							$interestPoints = [
								[
									'icon' => '🏖️',
									'name' => 'Pantai Skouw Yambe',
									'desc' => 'Wisata pantai berpasir hitam, sunrise & sunset.',
									'category' => 'Wisata',
									'color' => 'bg-blue-100 text-blue-800'
								],
								[
									'icon' => '🏛️',
									'name' => 'Rumah Adat Tangfa',
									'desc' => 'Pusat kegiatan adat & budaya.',
									'category' => 'Budaya',
									'color' => 'bg-purple-100 text-purple-800'
								],
								[
									'icon' => '🐢',
									'name' => 'Konservasi Penyu',
									'desc' => 'Lokasi pelestarian penyu dan edukasi lingkungan.',
									'category' => 'Konservasi',
									'color' => 'bg-green-100 text-green-800'
								],
								[
									'icon' => '🌴',
									'name' => 'Kebun Kelapa',
									'desc' => 'Sentra produksi kelapa dan minyak kelapa.',
									'category' => 'Pertanian',
									'color' => 'bg-yellow-100 text-yellow-800'
								],
								[
									'icon' => '🏢',
									'name' => 'Balai Kampung',
									'desc' => 'Kantor pemerintahan dan pelayanan publik.',
									'category' => 'Pemerintahan',
									'color' => 'bg-red-100 text-red-800'
								]
							];
						@endphp
						
						@foreach($interestPoints as $point)
							<div class="group p-4 rounded-xl border border-gray-100 hover:border-emerald-200 hover:shadow-md transition-all duration-300">
								<div class="flex items-start space-x-3">
									<div class="text-2xl">{{ $point['icon'] }}</div>
									<div class="flex-1 min-w-0">
										<div class="flex items-center space-x-2 mb-2">
											<h3 class="font-semibold text-gray-900 group-hover:text-emerald-600 transition-colors">
												{{ $point['name'] }}
											</h3>
											<span class="px-2 py-1 rounded-full text-xs font-medium {{ $point['color'] }}">
												{{ $point['category'] }}
											</span>
										</div>
										<p class="text-sm text-gray-600 leading-relaxed">
											{{ $point['desc'] }}
										</p>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				
				<!-- Map Legend -->
				<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
					<h3 class="text-lg font-semibold text-gray-900 mb-4">Legenda Peta</h3>
					<div class="space-y-3">
						<div class="flex items-center space-x-3">
							<div class="w-4 h-4 bg-emerald-500 rounded-full"></div>
							<span class="text-sm text-gray-600">Lokasi Penting</span>
						</div>
						<div class="flex items-center space-x-3">
							<div class="w-4 h-4 bg-blue-500 rounded-full"></div>
							<span class="text-sm text-gray-600">Wisata</span>
						</div>
						<div class="flex items-center space-x-3">
							<div class="w-4 h-4 bg-purple-500 rounded-full"></div>
							<span class="text-sm text-gray-600">Budaya</span>
						</div>
						<div class="flex items-center space-x-3">
							<div class="w-4 h-4 bg-green-500 rounded-full"></div>
							<span class="text-sm text-gray-600">Konservasi</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Additional Info Section -->
		<div class="mt-12 bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
			<div class="text-center mb-8">
				<h2 class="text-3xl font-bold text-gray-900 mb-4">Tentang Peta Kampung</h2>
				<p class="text-gray-600 max-w-3xl mx-auto">
					Peta interaktif ini menampilkan lokasi-lokasi penting di Kampung Skouw Yambe yang dapat dikunjungi 
					untuk berbagai keperluan wisata, edukasi, dan kegiatan lainnya.
				</p>
			</div>
			
			<div class="grid md:grid-cols-3 gap-6">
				<div class="text-center">
					<div class="w-16 h-16 mx-auto mb-4 bg-emerald-100 rounded-2xl flex items-center justify-center">
						<svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-1.447-.894L15 4m0 13V4m0 0L9 7"></path>
						</svg>
					</div>
					<h3 class="font-semibold text-gray-900 mb-2">Peta Satelit</h3>
					<p class="text-sm text-gray-600">Gambar satelit resolusi tinggi untuk navigasi yang akurat</p>
				</div>
				
				<div class="text-center">
					<div class="w-16 h-16 mx-auto mb-4 bg-blue-100 rounded-2xl flex items-center justify-center">
						<svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
						</svg>
					</div>
					<h3 class="font-semibold text-gray-900 mb-2">Lokasi Akurat</h3>
					<p class="text-sm text-gray-600">Koordinat GPS yang presisi untuk setiap titik lokasi</p>
				</div>
				
				<div class="text-center">
					<div class="w-16 h-16 mx-auto mb-4 bg-purple-100 rounded-2xl flex items-center justify-center">
						<svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
						</svg>
					</div>
					<h3 class="font-semibold text-gray-900 mb-2">Informasi Lengkap</h3>
					<p class="text-sm text-gray-600">Detail lengkap setiap lokasi dengan kategori dan deskripsi</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection 