@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="mb-6 text-sm">
            <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800">Beranda</a>
            <span class="mx-2">></span>
            <a href="{{ route('berita') }}" class="text-blue-600 hover:text-blue-800">Berita</a>
            <span class="mx-2">></span>
            <span class="text-gray-600">{{ $article->title }}</span>
        </nav>

        <!-- Article Header -->
        <div class="mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $article->title }}</h1>
            
            @if($article->featured_image)
                <img loading="lazy" src="{{ Storage::disk('public')->url($article->featured_image) }}" 
                     alt="{{ $article->title }}" 
                     class="w-full h-64 md:h-96 object-cover rounded-lg shadow-lg mb-6">
            @endif

            <div class="flex items-center text-gray-600 text-sm mb-6">
                <span>{{ $article->published_at->format('d F Y') }}</span>
            </div>

            @if($article->excerpt)
                <p class="text-lg text-gray-700 leading-relaxed mb-6">{{ $article->excerpt }}</p>
            @endif
        </div>

        <!-- Article Content -->
        <div class="prose prose-lg max-w-none mb-12">
            {!! nl2br(e($article->content)) !!}
        </div>

        <!-- Related Articles -->
        @if($relatedArticles->count() > 0)
            <div class="border-t pt-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Berita Terkait</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedArticles as $related)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            @if($related->featured_image)
                                <img loading="lazy" src="{{ Storage::disk('public')->url($related->featured_image) }}" 
                                     alt="{{ $related->title }}" 
                                     class="w-full h-48 object-cover">
                            @endif
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-900 mb-2">
                                    <a href="{{ route('berita.detail', $related->slug) }}" 
                                       class="hover:text-blue-600">{{ $related->title }}</a>
                                </h4>
                                @if($related->excerpt)
                                    <p class="text-gray-600 text-sm">{{ Str::limit($related->excerpt, 100) }}</p>
                                @endif
                                <p class="text-gray-500 text-xs mt-2">{{ $related->published_at->format('d F Y') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Back to News -->
        <div class="text-center mt-8">
            <a href="{{ route('berita') }}" 
               class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-200">
                Kembali ke Berita
            </a>
        </div>
    </div>
</div>
@endsection





