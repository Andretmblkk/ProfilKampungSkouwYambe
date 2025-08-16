<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Mobile Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Test styles */
        .test-button {
            min-height: 44px;
            min-width: 44px;
            -webkit-tap-highlight-color: transparent;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            user-select: none;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Test Header -->
    <header class="sticky top-0 z-50 w-full border-b border-gray-200 bg-white/95 backdrop-blur">
        <div class="container mx-auto px-4">
            <div class="flex h-20 items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="h-12 w-12 bg-green-600 rounded-lg flex items-center justify-center text-white font-bold">
                        Test
                    </div>
                    <div class="flex flex-col">
                        <span class="text-2xl font-bold text-gray-900">Mobile Menu Test</span>
                        <span class="text-sm text-gray-600">Testing hamburger functionality</span>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-1">
                    <a href="#" class="px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 transition-colors">Home</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium rounded-lg hover:bg-gray-100 transition-colors">About</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium rounded-lg bg-green-600 text-white hover:bg-green-700 transition-colors">Contact</a>
                </nav>

                <!-- Mobile Menu Button -->
                <button 
                    class="md:hidden relative w-12 h-12 flex items-center justify-center rounded-lg hover:bg-gray-100 transition-colors focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 test-button" 
                    id="mobile-menu-button"
                    type="button"
                    aria-label="Toggle mobile menu"
                    aria-expanded="false"
                >
                    <svg class="h-6 w-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div class="md:hidden hidden border-t border-gray-200 bg-white shadow-lg" id="mobile-menu">
            <div class="container mx-auto px-4">
                <div class="py-4 space-y-1">
                    <a href="#" class="block px-4 py-3 text-base font-medium rounded-lg hover:bg-gray-100 transition-colors active:bg-gray-200 test-button">Home</a>
                    <a href="#" class="block px-4 py-3 text-base font-medium rounded-lg hover:bg-gray-100 transition-colors active:bg-gray-200 test-button">About</a>
                    <a href="#" class="block px-4 py-3 text-base font-medium rounded-lg bg-green-600 text-white hover:bg-green-700 transition-colors active:bg-green-800 test-button">Contact</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Test Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-center mb-8">Mobile Menu Test Page</h1>
            
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <h2 class="text-xl font-semibold mb-4">Test Instructions</h2>
                <div class="space-y-4 text-gray-600">
                    <p>1. <strong>Resize browser</strong> ke ukuran mobile (kurang dari 768px)</p>
                    <p>2. <strong>Klik hamburger menu</strong> di pojok kanan atas</p>
                    <p>3. <strong>Test berbagai cara:</strong></p>
                    <ul class="list-disc list-inside ml-4 space-y-2">
                        <li>Klik dengan mouse</li>
                        <li>Tap dengan jari (di mobile)</li>
                        <li>Klik link di dalam menu</li>
                        <li>Klik di luar menu</li>
                        <li>Tekan tombol Escape</li>
                    </ul>
                </div>
                
                <div class="mt-8 p-4 bg-gray-50 rounded-lg">
                    <h3 class="font-semibold mb-2">Debug Info:</h3>
                    <div id="debug-info" class="text-sm text-gray-600">
                        Check browser console for detailed logs
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Mobile menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const debugInfo = document.getElementById('debug-info');
            
            console.log('Mobile menu elements:', { mobileMenuButton, mobileMenu });
            
            if (mobileMenuButton && mobileMenu) {
                let isMenuOpen = false;
                
                function updateDebugInfo(message) {
                    debugInfo.innerHTML = message;
                    console.log(message);
                }
                
                function toggleMenu() {
                    isMenuOpen = !isMenuOpen;
                    
                    if (isMenuOpen) {
                        mobileMenu.classList.remove('hidden');
                        mobileMenu.style.display = 'block';
                        mobileMenuButton.setAttribute('aria-expanded', 'true');
                        // Change icon to close (X)
                        mobileMenuButton.innerHTML = `
                            <svg class="h-6 w-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        `;
                        updateDebugInfo('✅ Mobile menu opened');
                    } else {
                        mobileMenu.classList.add('hidden');
                        mobileMenu.style.display = 'none';
                        mobileMenuButton.setAttribute('aria-expanded', 'false');
                        // Change icon back to hamburger
                        mobileMenuButton.innerHTML = `
                            <svg class="h-6 w-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        `;
                        updateDebugInfo('❌ Mobile menu closed');
                    }
                }
                
                function closeMenu() {
                    if (isMenuOpen) {
                        isMenuOpen = false;
                        mobileMenu.classList.add('hidden');
                        mobileMenu.style.display = 'none';
                        mobileMenuButton.setAttribute('aria-expanded', 'false');
                        // Reset icon to hamburger
                        mobileMenuButton.innerHTML = `
                            <svg class="h-6 w-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        `;
                        updateDebugInfo('❌ Mobile menu closed');
                    }
                }
                
                // Click event
                mobileMenuButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    updateDebugInfo('🖱️ Mobile menu button clicked');
                    toggleMenu();
                });
                
                // Touch events for mobile devices
                mobileMenuButton.addEventListener('touchstart', function(e) {
                    e.preventDefault();
                    updateDebugInfo('👆 Mobile menu touch start');
                });
                
                mobileMenuButton.addEventListener('touchend', function(e) {
                    e.preventDefault();
                    updateDebugInfo('👆 Mobile menu touch end');
                    toggleMenu();
                });
                
                // Close mobile menu when clicking on a link
                const mobileMenuLinks = mobileMenu.querySelectorAll('a');
                mobileMenuLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        updateDebugInfo('🔗 Mobile menu link clicked: ' + link.textContent);
                        closeMenu();
                    });
                });
                
                // Close mobile menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                        closeMenu();
                    }
                });
                
                // Close mobile menu on window resize
                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 768) {
                        closeMenu();
                    }
                });
                
                // Close mobile menu on escape key
                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape') {
                        closeMenu();
                    }
                });
                
                updateDebugInfo('🚀 Mobile menu initialized successfully');
                
            } else {
                updateDebugInfo('❌ Mobile menu elements not found');
                console.error('Mobile menu elements not found:', { mobileMenuButton, mobileMenu });
            }
        });
    </script>
</body>
</html>
