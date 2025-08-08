<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Kampung Skouw Yambe</title>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    @yield('scripts')
</head>
<body class="min-h-screen bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
    <!-- Header -->
    <header class="sticky top-0 z-50 w-full border-b border-gray-200 dark:border-gray-800 bg-white/95 dark:bg-gray-900/95 backdrop-blur supports-[backdrop-filter]:bg-white/60 supports-[backdrop-filter]:dark:bg-gray-900/60">
        <div class="container mx-auto px-4">
            <div class="flex h-20 items-center justify-between">
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-3 group">
                    <img src="/images/logo.png" alt="Logo Kampung Skouw Yambe" class="h-12 w-auto transition-transform duration-300 group-hover:scale-110">
                    <div class="flex flex-col">
                        <span class="text-2xl font-bold bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent">Kampung Skouw Yambe</span>
                        <span class="text-sm text-gray-600 dark:text-gray-400">Jayapura, Papua</span>
                    </div>
                </a>

                <!-- Navigation -->
                <nav class="hidden md:flex items-center space-x-1">
                    <a href="/" class="px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Beranda</a>
                    <a href="/profil" class="px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Profil</a>
                    <a href="/organisasi" class="px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Organisasi</a>
                    <a href="/umkm" class="px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">UMKM</a>
                    <a href="/berita" class="px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Berita</a>
                    <a href="/infografis" class="px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Infografis</a>
                    <a href="/peta" class="px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Peta</a>
                    <a href="/kontak" class="px-4 py-2 text-sm font-medium rounded-lg bg-green-600 text-white hover:bg-green-700 transition-colors">Kontak</a>
                    <a href="/login" class="ml-2 px-4 py-2 text-sm font-bold rounded-lg bg-gradient-to-r from-green-500 to-blue-500 text-white shadow hover:from-blue-500 hover:to-green-500 transition-colors">Login</a>
                </nav>

                <!-- Mobile Menu Button -->
                <button class="md:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors" id="mobile-menu-button">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/" class="block px-3 py-2 text-base font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Beranda</a>
                <a href="/profil" class="block px-3 py-2 text-base font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Profil</a>
                <a href="/organisasi" class="block px-3 py-2 text-base font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Organisasi</a>
                <a href="/umkm" class="block px-3 py-2 text-base font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">UMKM</a>
                <a href="/berita" class="block px-3 py-2 text-base font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Berita</a>
                <a href="/infografis" class="block px-3 py-2 text-base font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Infografis</a>
                <a href="/peta" class="block px-3 py-2 text-base font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Peta</a>
                <a href="/kontak" class="block px-3 py-2 text-base font-medium rounded-lg bg-green-600 text-white hover:bg-green-700 transition-colors">Kontak</a>
                <a href="/login" class="block mt-2 px-3 py-2 text-base font-bold rounded-lg bg-gradient-to-r from-green-500 to-blue-500 text-white shadow hover:from-blue-500 hover:to-green-500 transition-colors">Login</a>
            </div>
        </div>
    </header>

    <!-- Pop Up Selamat Datang -->
    <div id="welcome-alert" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 transition-opacity duration-500">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-8 text-center border-2 border-green-500 animate-fade-in">
            <h2 class="text-2xl font-bold mb-2 text-green-700">Selamat Datang!</h2>
            <p class="mb-4 text-gray-700">Selamat datang di website <span class="font-semibold text-green-600">Kampung Skouw Yambe</span>.<br/>Temukan informasi sejarah, potensi, dan keunikan kampung kami.</p>
            <p class="mb-6 text-sm text-gray-500">Untuk akses internet, silakan klik tombol <span class="font-semibold text-blue-600">Login</span> di pojok kanan atas.</p>
            <button onclick="document.getElementById('welcome-alert').style.display='none'; localStorage.setItem('welcome_shown', '1');" class="mt-2 px-6 py-2 rounded-lg bg-gradient-to-r from-green-500 to-blue-500 text-white font-bold shadow hover:from-blue-600 hover:to-green-600 transition">Tutup</button>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if(localStorage.getItem('welcome_shown')) {
                var alert = document.getElementById('welcome-alert');
                if(alert) alert.style.display = 'none';
            } else {
                setTimeout(function() {
                    var alert = document.getElementById('welcome-alert');
                    if(alert) alert.style.display = 'none';
                    localStorage.setItem('welcome_shown', '1');
                }, 8000);
            }
        });
    </script>
    <!-- End Pop Up Selamat Datang -->

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 dark:bg-gray-800 py-8">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">&copy; {{ date('Y') }} Kampung Skouw Yambe. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html> 