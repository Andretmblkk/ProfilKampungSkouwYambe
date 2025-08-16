@extends('layouts.app')

@section('title', $article->title)

@section('content')
<!-- Hero Section -->
@if($article->featured_image)
<div class="relative h-72 md:h-96">
	<div class="absolute inset-0">
		<img loading="lazy" src="{{ Storage::disk('public')->url($article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
		<div class="absolute inset-0 bg-black/50"></div>
	</div>
	<div class="relative max-w-5xl mx-auto px-4 h-full flex items-end pb-8">
		<h1 class="text-3xl md:text-4xl font-extrabold text-white leading-tight">{{ $article->title }}</h1>
	</div>
</div>
@else
<div class="relative h-56 md:h-72">
	<img src="/images/2.jpg" alt="Berita Kampung Skouw Yambe" class="absolute inset-0 w-full h-full object-cover">
	<div class="absolute inset-0 bg-black/50"></div>
	<div class="relative max-w-5xl mx-auto px-4 h-full flex items-end pb-6">
		<h1 class="text-3xl md:text-4xl font-extrabold text-white leading-tight">{{ $article->title }}</h1>
	</div>
</div>
@endif

<!-- Article Body -->
<div class="bg-gray-50 py-12">
	<div class="max-w-5xl mx-auto px-4">
		<!-- Breadcrumb -->
		<nav class="mb-6 text-sm">
			<a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800">Beranda</a>
			<span class="mx-2">/</span>
			<a href="{{ route('berita') }}" class="text-blue-600 hover:text-blue-800">Berita</a>
			<span class="mx-2">/</span>
			<span class="text-gray-600 line-clamp-1 align-middle">{{ $article->title }}</span>
		</nav>

		<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
			<div class="flex items-center text-gray-600 text-sm mb-6">
				<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-7 8h4m-9-4h14M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
				</svg>
				<span>{{ optional($article->published_at)->format('d F Y') }}</span>
			</div>

			@if($article->excerpt)
				<p class="text-lg text-gray-700 leading-relaxed mb-6">{{ $article->excerpt }}</p>
			@endif

			<div class="prose max-w-none">
				{!! nl2br(e($article->content)) !!}
			</div>
		</div>

		@if($relatedArticles->count() > 0)
			<div class="mt-12">
				<h3 class="text-2xl font-bold text-gray-900 mb-6">Berita Terkait</h3>
				<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
					@foreach($relatedArticles as $related)
						<div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl border border-gray-100 hover:border-blue-200 overflow-hidden transition-all">
							@if($related->featured_image)
								<a href="{{ route('berita.detail', $related->slug) }}" class="block h-40">
									<img loading="lazy" src="{{ Storage::disk('public')->url($related->featured_image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
								</a>
							@endif
							<div class="p-4">
								<h4 class="font-semibold text-gray-900 mb-2 line-clamp-2">
									<a href="{{ route('berita.detail', $related->slug) }}" class="hover:text-blue-600">{{ $related->title }}</a>
								</h4>
								@if($related->excerpt)
									<p class="text-gray-600 text-sm line-clamp-3">{{ \Illuminate\Support\Str::limit($related->excerpt, 100) }}</p>
								@endif
								<p class="text-gray-500 text-xs mt-2">{{ optional($related->published_at)->format('d F Y') }}</p>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		@endif

		<div class="text-center mt-10">
			<a href="{{ route('berita') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
				<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
				Kembali ke Berita
			</a>
		</div>
	</div>
</div>
@endsection





