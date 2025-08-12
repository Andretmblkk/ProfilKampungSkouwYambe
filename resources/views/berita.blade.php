@extends('layouts.app')

@section('title', 'Berita Kampung')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-8 text-green-800">Berita & Kegiatan Kampung Skouw Yambe</h1>

        @if($articles->count() === 0)
            <div class="text-center text-gray-600">Belum ada berita yang dipublikasikan.</div>
        @else
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                @foreach($articles as $article)
                    <article class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col">
                        @if($article->featured_image)
                            <a href="{{ route('berita.detail', $article->slug) }}">
                                <img loading="lazy" src="{{ Storage::disk('public')->url($article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                            </a>
                        @endif
                        <div class="p-6 flex flex-col flex-1">
                            <h2 class="text-xl font-semibold mb-2 text-green-700">
                                <a href="{{ route('berita.detail', $article->slug) }}" class="hover:underline">{{ $article->title }}</a>
                            </h2>
                            <p class="text-gray-500 text-sm mb-2">
                                {{ optional($article->published_at)->format('d F Y') }}
                            </p>
                            @if($article->excerpt)
                                <p class="text-gray-700 mb-4">{{ \Illuminate\Support\Str::limit($article->excerpt, 140) }}</p>
                            @endif
                            <a href="{{ route('berita.detail', $article->slug) }}" class="mt-auto inline-block text-green-600 hover:underline">Baca Selengkapnya</a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
    </div>
@endsection 