@extends('layouts.app')

@section('title', 'Profil Kampung')

@section('scripts')
<style>
/* Animations */
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px);}
    to { opacity: 1; transform: translateY(0);}
}
@keyframes slideInLeft {
    from { opacity: 0; transform: translateX(-30px);}
    to { opacity: 1; transform: translateX(0);}
}
@keyframes slideInRight {
    from { opacity: 0; transform: translateX(30px);}
    to { opacity: 1; transform: translateX(0);}
}
.animate-fade-in { animation: fadeInUp 0.8s ease-out forwards; }
.animate-slide-left { animation: slideInLeft 0.8s ease-out forwards; }
.animate-slide-right { animation: slideInRight 0.8s ease-out forwards; }
.animate-on-scroll { opacity: 0; transform: translateY(30px); }

/* Card Hover */
.card-hover { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);}
.card-hover:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
}

/* Icon Bounce */
.icon-bounce { transition: all 0.3s ease;}
.icon-bounce:hover { transform: scale(1.1) rotate(5deg); }

/* Gradient Text */
.gradient-text {
    background: linear-gradient(135deg, #64748b 0%, #475569 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Floating */
.floating { animation: floating 3s ease-in-out infinite;}
@keyframes floating {
    0%, 100% { transform: translateY(0px);}
    50% { transform: translateY(-10px);}
}

/* Pulse Glow */
.pulse-glow { animation: pulse-glow 2s ease-in-out infinite alternate;}
@keyframes pulse-glow {
    from { box-shadow: 0 0 20px rgba(100, 116, 139, 0.3);}
    to { box-shadow: 0 0 30px rgba(100, 116, 139, 0.6);}
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer untuk animasi scroll
    const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('animate-fade-in');
                }, index * 200);
            }
        });
    }, observerOptions);

    // Observe semua elemen dengan class animate-on-scroll
    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        observer.observe(el);
    });

    // Hover effects untuk cards
    document.querySelectorAll('.card-hover').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Icon bounce effects
    document.querySelectorAll('.icon-bounce').forEach(icon => {
        icon.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.2) rotate(10deg)';
        });
        
        icon.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
        });
    });

    // Parallax effect untuk background
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const parallax = document.querySelector('.parallax-bg');
        if (parallax) {
            const speed = scrolled * 0.5;
            parallax.style.transform = `translateY(${speed}px)`;
        }
    });
});
</script>
@endsection

@section('content')
<div class="bg-gradient-to-br from-gray-50 via-slate-50 to-zinc-50 py-12 min-h-screen">
    <div class="max-w-6xl mx-auto px-4">
        <!-- Header Section -->
        <div class="text-center mb-16 animate-on-scroll">
            <h1 class="text-5xl font-bold mb-4 gradient-text floating">
                Profil Kampung Skouw Yambe
            </h1>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto">
                Kampung adat yang kaya akan budaya, alam yang indah, dan masyarakat yang harmonis di Distrik Muara Tami, Kota Jayapura, Papua
            </p>
        </div>

        <!-- Overview Section -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-12 card-hover animate-on-scroll">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="animate-slide-left">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">
                        <i class="fas fa-home mr-3 text-gray-600 icon-bounce"></i>
                        Tentang Kampung Kami
                    </h2>
                    <p class="text-gray-700 text-lg leading-relaxed mb-6">
                        Kampung Skouw Yambe adalah kampung adat yang terletak di Distrik Muara Tami, Kota Jayapura, Papua. 
                        Dikenal dengan keindahan alam yang memukau, pantai berpasir hitam yang eksotis, dan konservasi penyu 
                        yang menjadi kebanggaan kampung.
                    </p>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Masyarakat kampung hidup rukun dalam harmoni, menjaga tradisi dan kearifan lokal, serta aktif 
                        dalam pembangunan kampung menuju kemandirian dan kesejahteraan bersama.
                    </p>
                </div>
                <div class="flex justify-center animate-slide-right">
                    <div class="w-full max-w-md rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                        <img src="/images/1.png" alt="Panorama Kampung Skouw Yambe" class="w-full h-72 object-cover hover:scale-110 transition-transform duration-500">
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi Misi Section -->
        <div class="grid lg:grid-cols-2 gap-8 mb-12">
            <!-- Visi -->
            <div class="bg-white rounded-2xl shadow-xl p-8 card-hover animate-on-scroll">
                <div class="text-center mb-6">
                    <div class="bg-slate-100 rounded-full p-4 inline-block mb-4 pulse-glow">
                        <i class="fas fa-eye text-slate-600 text-3xl icon-bounce"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-slate-700">Visi</h2>
                </div>
                <div class="text-center">
                    <blockquote class="text-xl text-gray-700 italic leading-relaxed">
                        "Mewujudkan Kampung Skouw Yambe yang <span class="font-bold text-slate-600">Bersih</span>, 
                        <span class="font-bold text-slate-600">Indah</span>,
                        <span class="font-bold text-slate-600">Damai</span>,<span class="font-bold text-slate-600">Aman</span>,<span class="font-bold text-slate-600">Beriman</span> dan <span class="font-bold text-slate-600">sejahtera</span> menuju masyarakat yang mandiri, dan takut akan Tuhan"
                    </blockquote>
                </div>
            </div>

            <!-- Misi -->
            <div class="bg-white rounded-2xl shadow-xl p-8 card-hover animate-on-scroll">
                <div class="text-center mb-6">
                    <div class="bg-gray-100 rounded-full p-4 inline-block mb-4 pulse-glow">
                        <i class="fas fa-bullseye text-gray-600 text-3xl icon-bounce"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-700">Misi</h2>
                </div>
                <div class="space-y-4">
                    <div class="flex items-start p-4 bg-slate-50 rounded-lg hover:bg-slate-100 transition-colors duration-300">
                        <i class="fas fa-graduation-cap text-slate-600 mt-1 mr-3 icon-bounce"></i>
                        <p class="text-gray-700">Mengayomi masyarakat Kampung Skouw Yambe untuk memanfaatkan Sumber Daya Alam (SDA) untuk menjadi sumber ekonomi masyarakat</p>
                    </div>
                    <div class="flex items-start p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                        <i class="fas fa-chart-line text-gray-600 mt-1 mr-3 icon-bounce"></i>
                        <p class="text-gray-700">Mengembangkan potensi ekonomi lokal berbasis pertanian, kelapa, dan UMKM</p>
                    
        </div>



         <div class="bg-white rounded-2xl shadow-xl p-8 card-hover animate-on-scroll">
                <div class="text-center mb-6">
                    <div class="bg-gray-100 rounded-full p-4 inline-block mb-4 pulse-glow">
                        <i class="fas fa-bullseye text-gray-600 text-3xl icon-bounce"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-700">Tujuan</h2>
                </div>
                <div class="space-y-4">
                    <div class="flex items-start p-4 bg-slate-50 rounded-lg hover:bg-slate-100 transition-colors duration-300">
                        <i class="fas fa-graduation-cap text-slate-600 mt-1 mr-3 icon-bounce"></i>
                        <p class="text-gray-700">agar masyarakat dapat menjadi mandiri dan terlepas dari hidup yang ketergantungan kepada orang lain</p>
                    </div>
                   
            </div>
        </div>v

        <div class="bg-white rounded-2xl shadow-xl p-8 card-hover animate-on-scroll">
                <div class="text-center mb-6">
                    <div class="bg-gray-100 rounded-full p-4 inline-block mb-4 pulse-glow">
                        <i class="fas fa-bullseye text-gray-600 text-3xl icon-bounce"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-700">Sasaran</h2>
                </div>
                <div class="space-y-4">
                    <div class="flex items-start p-4 bg-slate-50 rounded-lg hover:bg-slate-100 transition-colors duration-300">
                        <i class="fas fa-graduation-cap text-slate-600 mt-1 mr-3 icon-bounce"></i>
                        <p class="text-gray-700">Toko pemerintah, masyarakat, adat dan gereja</p>
                    </div>
                   
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 mb-12 card-hover animate-on-scroll">
            <div class="text-center mb-8">
                <div class="bg-slate-100 rounded-full p-4 inline-block mb-4 pulse-glow">
                    <i class="fas fa-history text-slate-600 text-3xl icon-bounce"></i>
                </div>
                <h2 class="text-3xl font-bold text-slate-700">Sejarah Kampung</h2>
                <p class="text-gray-600 mt-2">Perjalanan panjang kampung dari masa lalu hingga sekarang</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="animate-slide-left">
                    <h3 class="text-2xl font-bold text-slate-700 mb-4">
                        <i class="fas fa-clock mr-2 text-slate-600 icon-bounce"></i>
                        Asal Usul Nama
                    </h3>
                    <p class="text-gray-700 leading-relaxed mb-6">
                        Nama "Skouw Yambe" berasal dari bahasa lokal yang memiliki makna mendalam. 
                        "Skouw" berarti tempat yang tinggi atau bukit, sementara "Yambe" merujuk pada 
                        jenis pohon yang banyak tumbuh di wilayah tersebut. Kombinasi kedua kata ini 
                        menggambarkan karakteristik geografis kampung yang berada di dataran tinggi 
                        dengan pepohonan yang rimbun.
                    </p>
                    
                    <h3 class="text-2xl font-bold text-slate-700 mb-4">
                        <i class="fas fa-users mr-2 text-slate-600 icon-bounce"></i>
                        Masyarakat Pertama
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Kampung ini pertama kali dihuni oleh suku asli Papua yang hidup secara tradisional 
                        dengan mengandalkan hasil alam, berburu, dan bercocok tanam. Mereka membangun 
                        rumah adat dan mengembangkan sistem sosial yang berdasarkan kekerabatan dan 
                        gotong royong.
                    </p>
                </div>

                <div class="animate-slide-right">
                    <h3 class="text-2xl font-bold text-slate-700 mb-4">
                        <i class="fas fa-calendar-alt mr-2 text-slate-600 icon-bounce"></i>
                        Perkembangan Zaman
                    </h3>
                    <p class="text-gray-700 leading-relaxed mb-6">
                        Seiring berjalannya waktu, kampung mengalami berbagai perubahan. Dari kehidupan 
                        tradisional, masyarakat mulai mengenal pendidikan formal, teknologi modern, 
                        dan pembangunan infrastruktur. Namun, nilai-nilai budaya dan kearifan lokal 
                        tetap dijaga dan dilestarikan.
                    </p>
                    
                    <h3 class="text-2xl font-bold text-slate-700 mb-4">
                        <i class="fas fa-star mr-2 text-slate-600 icon-bounce"></i>
                        Era Modern
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Saat ini, Kampung Skouw Yambe telah berkembang menjadi kampung yang modern 
                        namun tetap mempertahankan identitas budaya. Pembangunan ekonomi, pendidikan, 
                        dan kesehatan terus ditingkatkan sambil menjaga kelestarian alam dan budaya 
                        yang menjadi warisan berharga.
                    </p>
                </div>
            </div>
        </div>

        <!-- Potensi dan Keunggulan -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-12 card-hover animate-on-scroll">
            <div class="text-center mb-8">
                <div class="bg-slate-100 rounded-full p-4 inline-block mb-4 pulse-glow">
                    <i class="fas fa-gem text-slate-600 text-3xl icon-bounce"></i>
                </div>
                <h2 class="text-3xl font-bold text-slate-700">Potensi & Keunggulan</h2>
                <p class="text-gray-600 mt-2">Kekayaan alam dan budaya yang menjadi kebanggaan kampung</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center p-6 bg-gradient-to-br from-slate-50 to-slate-100 rounded-xl card-hover">
                    <i class="fas fa-umbrella-beach text-slate-600 text-4xl mb-4 icon-bounce floating"></i>
                    <h3 class="font-bold text-slate-800 mb-2">Pantai Eksotis</h3>
                    <p class="text-slate-700 text-sm">Pantai berpasir hitam dengan sunset yang memukau</p>
                </div>
                
                <div class="text-center p-6 bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl card-hover">
                    <i class="fas fa-fish text-gray-600 text-4xl mb-4 icon-bounce floating"></i>
                    <h3 class="font-bold text-gray-800 mb-2">Konservasi Penyu</h3>
                    <p class="text-gray-700 text-sm">Program pelestarian penyu yang berkelanjutan</p>
                </div>
                
                <div class="text-center p-6 bg-gradient-to-br from-zinc-50 to-zinc-100 rounded-xl card-hover">
                    <i class="fas fa-home text-zinc-600 text-4xl mb-4 icon-bounce floating"></i>
                    <h3 class="font-bold text-zinc-800 mb-2">Budaya Adat</h3>
                    <p class="text-zinc-700 text-sm">Rumah adat dan tradisi yang masih terjaga</p>
                </div>
                
                <div class="text-center p-6 bg-gradient-to-br from-neutral-50 to-neutral-100 rounded-xl card-hover">
                    <i class="fas fa-tree text-neutral-600 text-4xl mb-4 icon-bounce floating"></i>
                    <h3 class="font-bold text-neutral-800 mb-2">Kelapa Organik</h3>
                    <p class="text-neutral-700 text-sm">Produksi kelapa dan minyak kelapa berkualitas</p>
                </div>
            </div>
        </div>

        <!-- Struktur Organisasi Section -->
        <div class="bg-white rounded-2xl shadow-xl p-8 card-hover animate-on-scroll">
            <div class="text-center mb-8">
                <div class="bg-slate-100 rounded-full p-4 inline-block mb-4 pulse-glow">
                    <i class="fas fa-sitemap text-slate-600 text-3xl icon-bounce"></i>
                </div>
                <h2 class="text-3xl font-bold text-slate-700">Struktur Organisasi</h2>
                <p class="text-gray-600 mt-2">Hierarki kepemimpinan dan organisasi kampung</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Struktur Pemerintahan Kampung -->
                <div class="text-center animate-slide-left">
                    <h3 class="text-2xl font-bold text-slate-700 mb-6">
                        <i class="fas fa-building mr-2 text-slate-600 icon-bounce"></i>
                        Pemerintahan Kampung
                    </h3>
                    <div class="bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl p-6 card-hover">
                        <img src="/images/struktur.jpg" alt="Struktur Organisasi Pemerintahan Kampung" 
                             class="w-full h-auto rounded-xl shadow-lg hover:scale-110 transition-transform duration-500">
                        <p class="text-gray-600 mt-4 text-sm">Struktur organisasi pemerintahan kampung yang mengatur administrasi dan pelayanan publik</p>
                    </div>
                </div>

                <!-- Struktur Pengurus Adat -->
                <div class="text-center animate-slide-right">
                    <h3 class="text-2xl font-bold text-slate-700 mb-6">
                        <i class="fas fa-users mr-2 text-slate-600 icon-bounce"></i>
                        Pengurus Adat
                    </h3>
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-6 card-hover">
                        <img src="/images/struktur.jpg" alt="Struktur Pengurus Adat Kampung" 
                             class="w-full h-auto rounded-xl shadow-lg hover:scale-110 transition-transform duration-500">
                        <p class="text-gray-600 mt-4 text-sm">Struktur pengurus adat yang menjaga tradisi dan kearifan lokal kampung</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 