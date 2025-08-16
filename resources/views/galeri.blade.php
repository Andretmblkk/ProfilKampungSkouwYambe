@extends('layouts.app')

@section('title', 'Galeri Kampung')

@section('content')
<!-- Hero Section -->
<div class="relative h-72 md:h-96 overflow-hidden">
	<img src="/images/3.jpg" alt="Galeri Kampung Skouw Yambe" class="absolute inset-0 w-full h-full object-cover">
	<div class="absolute inset-0 bg-black/50"></div>
	<div class="relative max-w-7xl mx-auto px-4 h-full flex items-center justify-center text-center">
		<div class="max-w-3xl mx-auto">
			<h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">Galeri Kampung Skouw Yambe</h1>
			<p class="text-xl text-purple-100 mb-8 leading-relaxed">Kumpulan dokumentasi kegiatan, alam, dan budaya kampung kami</p>
		</div>
	</div>
</div>

<!-- Main Content -->
<div class="bg-gray-50 py-16">
	<div class="max-w-7xl mx-auto px-4">
		@if(($galleries ?? collect())->count() === 0)
			<div class="text-center py-16">
				<div class="w-24 h-24 mx-auto mb-6 bg-gray-200 rounded-full flex items-center justify-center">
					<svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7l6 6-6 6M15 7l6 6-6 6"/>
					</svg>
				</div>
				<h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Galeri</h3>
				<p class="text-gray-600 max-w-md mx-auto">Saat ini belum ada galeri yang ditampilkan. Silakan cek kembali nanti.</p>
			</div>
		@else
			<div class="mb-12">
				<div class="flex items-center justify-between mb-8">
					<h2 class="text-3xl font-bold text-gray-900">Semua Galeri</h2>
					<div class="text-sm text-gray-600">{{ $galleries->total() }} item</div>
				</div>
				<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
					@foreach($galleries as $gallery)
						<div class="group relative overflow-hidden rounded-2xl bg-white shadow-sm hover:shadow-xl border border-gray-100 hover:border-purple-200 transition-all">
							<div class="relative h-56 bg-gradient-to-br from-purple-100 to-indigo-100 overflow-hidden">
								@if($gallery->image_path)
									<img loading="lazy" src="{{ Storage::disk('public')->url($gallery->image_path) }}" alt="{{ e($gallery->title ?? 'Galeri') }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
								@else
									<div class="w-full h-full flex items-center justify-center">
										<svg class="w-16 h-16 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7l6 6-6 6M15 7l6 6-6 6"/>
										</svg>
									</div>
								@endif
								@if($gallery->category)
									<div class="absolute top-4 left-4">
										<span class="bg-purple-600 text-white text-xs font-medium px-3 py-1 rounded-full">{{ e($gallery->category) }}</span>
									</div>
								@endif
							</div>
							<div class="p-6">
								<h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-purple-600 transition-colors">{{ e($gallery->title ?? 'Galeri') }}</h3>
								@if($gallery->description)
									<p class="text-gray-600 line-clamp-3">{{ \Illuminate\Support\Str::limit($gallery->description, 120) }}</p>
								@endif
							</div>
						</div>
					@endforeach
				</div>

				@if($galleries->hasPages())
					<div class="mt-12 flex justify-center">
						<div class="bg-white rounded-xl shadow-sm border border-gray-100 px-6 py-3">
							{{ $galleries->links() }}
						</div>
					</div>
				@endif
			</div>
		@endif
	</div>
</div>
@endsection
