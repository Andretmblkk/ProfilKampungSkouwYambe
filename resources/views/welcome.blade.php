<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kampung Skouw Yambe</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative min-h-screen bg-background">
            <!-- Hero Section -->
            <div class="relative h-screen flex items-center justify-center">
                <div class="absolute inset-0 bg-[url('/images/1.jpg')] bg-cover bg-center">
                    <div class="absolute inset-0 bg-black/50"></div>
                </div>
                <div class="relative z-10 text-center space-y-4">
                    <h1 class="text-4xl md:text-6xl font-bold text-white">
                        <span class="inline-block animate-slide-in-right">Selamat Datang di</span>
                        <span class="inline-block animate-slide-in-left animation-delay-200">Kampung Skouw Yambe</span>
                    </h1>
                    <p class="text-lg md:text-xl text-white/90 animate-fade-in-up animation-delay-200 max-w-2xl mx-auto">
                        Kampung Skouw Yambe adalah sebuah kampung yang terletak di perbatasan Indonesia-Papua Nugini. 
                        Dengan keindahan alam yang memukau dan kekayaan budaya yang unik, kampung ini menjadi destinasi 
                        wisata yang menawarkan pengalaman autentik kehidupan masyarakat perbatasan.
                    </p>
                    <div class="animate-fade-in-up animation-delay-400">
                        <a href="#tentang" class="inline-flex items-center justify-center rounded-md bg-primary px-6 py-3 text-sm font-medium text-primary-foreground shadow transition-colors hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50">
                            Jelajahi Kampung Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html> 