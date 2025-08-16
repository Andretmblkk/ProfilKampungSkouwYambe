@extends('layouts.app')

@section('title', 'Berita')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Berita Kampung</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Dapatkan informasi terbaru seputar kegiatan, pembangunan, dan perkembangan Kampung Skouw Yambe
            </p>
        </div>

        @if($articles->count() > 0)
            <!-- Articles Grid -->
            <div class="mb-16">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Artikel Terbaru</h2>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                        <span>{{ $articles->total() }} artikel ditemukan</span>
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($articles as $article)
                        <article class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-blue-200">
                            <!-- Image Section -->
                            <div class="relative h-48 bg-gradient-to-br from-blue-100 to-blue-200 overflow-hidden">
                                @if($article->featured_image)
                                    <a href="{{ route('berita.detail', $article->slug) }}" class="block h-full">
                                        <img loading="lazy" 
                                             src="{{ Storage::disk('public')->url($article->featured_image) }}" 
                                             alt="{{ $article->title }}" 
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    </a>
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <div class="text-center">
                                            <svg class="w-16 h-16 mx-auto mb-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                        </svg>
                                        <span class="text-blue-700 font-semibold">Berita</span>
                                        </div>
                                    </div>
                                @endif
                                
                                <!-- Date Badge -->
                                <div class="absolute top-4 right-4">
                                    <span class="bg-blue-600 text-white text-xs font-medium px-3 py-1 rounded-full">
                                        {{ optional($article->published_at)->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Content Section -->
                            <div class="p-6 flex flex-col flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">
                                    <a href="{{ route('berita.detail', $article->slug) }}" class="hover:underline">
                                        {{ $article->title }}
                                    </a>
                                </h3>
                                
                                @if($article->excerpt)
                                    <p class="text-gray-600 mb-4 leading-relaxed line-clamp-3 flex-1">
                                        {{ \Illuminate\Support\Str::limit($article->excerpt, 120) }}
                                    </p>
                                @endif
                                
                                <!-- Read More Button -->
                                <div class="mt-auto pt-4 border-t border-gray-100">
                                    <a href="{{ route('berita.detail', $article->slug) }}" 
                                       class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors group">
                                        Baca Selengkapnya
                                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                @if($articles->hasPages())
                    <div class="mt-12 flex justify-center">
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 px-6 py-3">
                            {{ $articles->links() }}
                        </div>
                    </div>
                @endif
            </div>
        @endif
        
        <!-- Newsletter Section -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Dapatkan Berita Terbaru</h2>
                <p class="text-gray-600 max-w-2xl mx-auto mb-6">
                    Berlangganan newsletter kami untuk mendapatkan informasi terbaru seputar kegiatan dan perkembangan kampung
                </p>
                
                <!-- Newsletter Form -->
                <form id="newsletterForm" class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                    @csrf
                    <input type="email" 
                           id="newsletterEmail" 
                           name="email" 
                           placeholder="Masukkan email Anda" 
                           class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           required>
                    <button type="submit" 
                            id="subscribeBtn"
                            class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                        <span id="btnText">Berlangganan</span>
                        <span id="btnLoading" class="hidden">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                    </button>
                </form>
                
                <!-- Status Message -->
                <div id="newsletterMessage" class="mt-4 hidden">
                    <div id="successMessage" class="hidden">
                        <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span id="successText"></span>
                        </div>
                    </div>
                    <div id="errorMessage" class="hidden">
                        <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-red-100 text-red-800">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <span id="errorText"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('newsletterForm');
    const emailInput = document.getElementById('newsletterEmail');
    const subscribeBtn = document.getElementById('subscribeBtn');
    const btnText = document.getElementById('btnText');
    const btnLoading = document.getElementById('btnLoading');
    const messageDiv = document.getElementById('newsletterMessage');
    const successMessage = document.getElementById('successMessage');
    const errorMessage = document.getElementById('errorMessage');
    const successText = document.getElementById('successText');
    const errorText = document.getElementById('errorText');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const email = emailInput.value.trim();
        
        if (!email) {
            showMessage('Email wajib diisi', 'error');
            return;
        }

        // Show loading state
        setLoadingState(true);
        
        // Send AJAX request
        fetch('{{ route("newsletter.subscribe") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify({ email: email })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showMessage(data.message, 'success');
                emailInput.value = '';
            } else {
                showMessage(data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showMessage('Terjadi kesalahan. Silakan coba lagi nanti.', 'error');
        })
        .finally(() => {
            setLoadingState(false);
        });
    });

    function setLoadingState(loading) {
        if (loading) {
            subscribeBtn.disabled = true;
            btnText.classList.add('hidden');
            btnLoading.classList.remove('hidden');
        } else {
            subscribeBtn.disabled = false;
            btnText.classList.remove('hidden');
            btnLoading.classList.add('hidden');
        }
    }

    function showMessage(message, type) {
        // Hide all messages first
        successMessage.classList.add('hidden');
        errorMessage.classList.add('hidden');
        
        if (type === 'success') {
            successText.textContent = message;
            successMessage.classList.remove('hidden');
        } else {
            errorText.textContent = message;
            errorMessage.classList.remove('hidden');
        }
        
        messageDiv.classList.remove('hidden');
        
        // Auto-hide message after 5 seconds
        setTimeout(() => {
            messageDiv.classList.add('hidden');
        }, 5000);
    }
});
</script>
@endsection 