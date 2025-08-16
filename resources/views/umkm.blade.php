@extends('layouts.app')

@section('title', 'UMKM & Potensi')

@section('content')
<!-- Hero Section -->
<div class="relative h-72 md:h-96 overflow-hidden">
	<img src="/images/3.jpg" alt="UMKM Skouw Yambe" class="absolute inset-0 w-full h-full object-cover">
	<div class="absolute inset-0 bg-black/50"></div>
	<div class="relative max-w-7xl mx-auto px-4 h-full flex items-center justify-center text-center">
		<div class="max-w-3xl mx-auto">
			<h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
				UMKM & Potensi
				<span class="block text-green-200">Kampung Skouw Yambe</span>
			</h1>
			<p class="text-xl text-green-100 mb-8 leading-relaxed">
				Temukan berbagai usaha mikro, kecil, dan menengah yang berkontribusi pada pertumbuhan ekonomi lokal
			</p>
			<div class="flex flex-wrap justify-center gap-4">
				<div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-2 text-white">
					<span class="font-semibold">{{ $umkms->total() }}</span> UMKM Aktif
				</div>
				<div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-2 text-white">
					<span class="font-semibold">100%</span> Lokal
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Main Content -->
<div class="bg-gray-50 py-16">
	<div class="max-w-7xl mx-auto px-4">
		@if($umkms->count() === 0)
			<!-- Empty State -->
			<div class="text-center py-16">
				<div class="w-24 h-24 mx-auto mb-6 bg-gray-200 rounded-full flex items-center justify-center">
					<svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
					</svg>
				</div>
				<h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Data UMKM</h3>
				<p class="text-gray-600 max-w-md mx-auto">
					Saat ini belum ada data UMKM yang aktif. Silakan cek kembali nanti atau hubungi admin untuk informasi lebih lanjut.
				</p>
			</div>
		@else
			<!-- UMKM Grid -->
			<div class="mb-12">
				<div class="flex items-center justify-between mb-8">
					<h2 class="text-3xl font-bold text-gray-900">UMKM Aktif</h2>
					<div class="flex items-center space-x-2 text-sm text-gray-600">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
						</svg>
						<span>{{ $umkms->total() }} UMKM ditemukan</span>
					</div>
				</div>
				
				<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
					@foreach($umkms as $umkm)
						<div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-green-200">
							<!-- Image Section -->
							<div class="relative h-48 bg-gradient-to-br from-green-100 to-green-200 overflow-hidden">
								@if($umkm->image_path)
									<img loading="lazy" 
										 src="{{ Storage::disk('public')->url($umkm->image_path) }}" 
										 alt="{{ e($umkm->name) }}" 
										 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
								@else
									<div class="w-full h-full flex items-center justify-center">
										<div class="text-center">
											<svg class="w-16 h-16 mx-auto mb-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
											</svg>
											<span class="text-green-700 font-semibold">UMKM</span>
										</div>
									</div>
								@endif
								
								<!-- Product Type Badge -->
								@if($umkm->product_type)
									<div class="absolute top-4 left-4">
										<span class="bg-green-600 text-white text-xs font-medium px-3 py-1 rounded-full">
											{{ e($umkm->product_type) }}
										</span>
									</div>
								@endif
							</div>
							
							<!-- Content Section -->
							<div class="p-6">
								<h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition-colors">
									{{ e($umkm->name) }}
								</h3>
								
								@if($umkm->description)
									<p class="text-gray-600 mb-4 leading-relaxed line-clamp-3">
										{{ \Illuminate\Support\Str::limit($umkm->description, 120) }}
									</p>
								@endif
								
								<!-- Contact Info -->
								<div class="space-y-2 mb-4">
									@if($umkm->owner_name)
										<div class="flex items-center text-sm text-gray-600">
											<svg class="w-4 h-4 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
											</svg>
											<span>{{ e($umkm->owner_name) }}</span>
										</div>
									@endif
									
									@if($umkm->phone)
										<div class="flex items-center text-sm text-gray-600">
											<svg class="w-4 h-4 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
											</svg>
											<a href="tel:{{ e($umkm->phone) }}" class="hover:text-green-600 transition-colors">
												{{ e($umkm->phone) }}
											</a>
										</div>
									@endif
									
									@if($umkm->email)
										<div class="flex items-center text-sm text-gray-600">
											<svg class="w-4 h-4 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
											</svg>
											<a href="mailto:{{ e($umkm->email) }}" class="hover:text-green-600 transition-colors">
												{{ e($umkm->email) }}
											</a>
										</div>
									@endif
								</div>
								
								@if($umkm->address)
									<div class="pt-3 border-t border-gray-100">
										<div class="flex items-start text-sm text-gray-500">
											<svg class="w-4 h-4 mr-2 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
											</svg>
											<span class="leading-relaxed">{{ e($umkm->address) }}</span>
										</div>
									</div>
								@endif
							</div>
						</div>
					@endforeach
				</div>
				
				<!-- Pagination -->
				@if($umkms->hasPages())
					<div class="mt-12 flex justify-center">
						<div class="bg-white rounded-xl shadow-sm border border-gray-100 px-6 py-3">
							{{ $umkms->links() }}
						</div>
					</div>
				@endif
			</div>
		@endif
		
		<!-- Potensi Kampung Section -->
		<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
			<div class="text-center mb-8">
				<h2 class="text-3xl font-bold text-gray-900 mb-4">Potensi Kampung Skouw Yambe</h2>
				<p class="text-gray-600 max-w-2xl mx-auto">
					Kampung kami memiliki berbagai potensi alam dan budaya yang dapat dikembangkan menjadi sumber penghasilan masyarakat
				</p>
			</div>
			
			<div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
				<!-- Pertanian -->
				<div class="text-center group">
					<div class="w-16 h-16 mx-auto mb-4 bg-green-100 rounded-2xl flex items-center justify-center group-hover:bg-green-200 transition-colors">
						<svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
						</svg>
					</div>
					<h3 class="font-semibold text-gray-900 mb-2">Pertanian</h3>
					<p class="text-sm text-gray-600">Sagu, kelapa, dan hortikultura</p>
				</div>
				
				<!-- Perikanan -->
				<div class="text-center group">
					<div class="w-16 h-16 mx-auto mb-4 bg-blue-100 rounded-2xl flex items-center justify-center group-hover:bg-blue-200 transition-colors">
						<svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M9 12h6m-6 4h6m2-5H7m2 5a2 2 0 01-2-2V9a2 2 0 012-2h8a2 2 0 012 2v6a2 2 0 01-2 2z"></path>
						</svg>
					</div>
					<h3 class="font-semibold text-gray-900 mb-2">Perikanan</h3>
					<p class="text-sm text-gray-600">Budidaya ikan air tawar</p>
				</div>
				
				<!-- Kerajinan -->
				<div class="text-center group">
					<div class="w-16 h-16 mx-auto mb-4 bg-yellow-100 rounded-2xl flex items-center justify-center group-hover:bg-yellow-200 transition-colors">
						<svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
						</svg>
					</div>
					<h3 class="font-semibold text-gray-900 mb-2">Kerajinan</h3>
					<p class="text-sm text-gray-600">Noken dan anyaman tradisional</p>
				</div>
				
				<!-- Ekowisata -->
				<div class="text-center group">
					<div class="w-16 h-16 mx-auto mb-4 bg-purple-100 rounded-2xl flex items-center justify-center group-hover:bg-purple-200 transition-colors">
						<svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
						</svg>
					</div>
					<h3 class="font-semibold text-gray-900 mb-2">Ekowisata</h3>
					<p class="text-sm text-gray-600">Pantai, konservasi penyu, budaya</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection 