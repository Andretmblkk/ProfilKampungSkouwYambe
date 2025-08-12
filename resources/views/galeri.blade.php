<!-- Gallery Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Filter Buttons (biarkan seperti sebelumnya) -->
        <!-- ... -->

        <!-- Image Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($galeris as $galeri)
                <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition duration-300 gallery-item" data-category="{{ $galeri->kategori }}">
                    <img src="{{ asset('storage/' . $galeri->foto) }}" alt="{{ $galeri->judul }}" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-0 left-0 p-6 text-white">
                            <h3 class="text-xl font-semibold mb-2">{{ $galeri->judul }}</h3>
                            <p class="text-sm">{{ $galeri->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Video Section (jika masih ingin menampilkan video, biarkan seperti sebelumnya) -->
            <!-- ... -->
        </div>

        <!-- Load More Button (biarkan seperti sebelumnya) -->
        <!-- ... -->
    </div>
</section>
