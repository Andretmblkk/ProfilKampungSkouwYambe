@extends('layouts.app')

@section('title', 'Infografis Kampung')

@section('scripts')
<!-- Chart.js CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Leaflet CSS dan JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Data dari database (Filament)
    const totalPenduduk = {{ $totalPenduduk ?? 0 }};
    // Bagian chart umur dihapus
    // Perkawinan
    const kawinData = @json($kawinValues ?? []);
    const kawinLabel = @json($kawinLabels ?? []);
    const kawinPersen = kawinData.map(x => Math.round((x / Math.max(totalPenduduk, 1)) * 100));
    new Chart(document.getElementById('perkawinanChart'), {
        type: 'doughnut',
        data: {
            labels: kawinLabel,
            datasets: [{
                data: kawinData,
                backgroundColor: ['#2563eb', '#22c55e', '#f59e42'],
                borderWidth: 3,
                borderColor: 'white'
            }]
        },
        options: {
            responsive: true, 
            plugins: {
                legend: {position: 'bottom'},
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: 'white',
                    bodyColor: 'white'
                }
            }
        }
    });
    // Pekerjaan
    const kerjaData = @json($kerjaValues ?? []);
    const kerjaLabel = @json($kerjaLabels ?? []);
    const kerjaPersen = kerjaData.map(x => Math.round((x / Math.max(totalPenduduk, 1)) * 100));
    new Chart(document.getElementById('pekerjaanChart'), {
        type: 'polarArea',
        data: {
            labels: kerjaLabel,
            datasets: [{
                data: kerjaData,
                backgroundColor: [
                    'rgba(34, 197, 94, 0.7)',
                    'rgba(37, 99, 235, 0.7)',
                    'rgba(245, 158, 66, 0.7)',
                    'rgba(163, 230, 53, 0.7)'
                ],
                borderColor: [
                    'rgba(34, 197, 94, 1)',
                    'rgba(37, 99, 235, 1)',
                    'rgba(245, 158, 66, 1)',
                    'rgba(163, 230, 53, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true, 
            plugins: {
                legend: {position: 'bottom'},
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: 'white',
                    bodyColor: 'white'
                }
            }
        }
    });
    // Pendidikan
    const pendidikanData = @json($pendidikanValues ?? []);
    const pendidikanLabel = @json($pendidikanLabels ?? []);
    const pendidikanPersen = pendidikanData.map(x => Math.round((x / Math.max(totalPenduduk, 1)) * 100));
    new Chart(document.getElementById('pendidikanChart'), {
        type: 'bar',
        data: {
            labels: pendidikanLabel,
            datasets: [{
                label: 'Jiwa',
                data: pendidikanData,
                backgroundColor: 'rgba(37, 99, 235, 0.8)',
                borderColor: 'rgba(37, 99, 235, 1)',
                borderWidth: 2,
                borderRadius: 8,
                hoverBackgroundColor: 'rgba(37, 99, 235, 1)'
            }]
        },
        options: {
            responsive: true, 
            plugins: {
                legend: {display: false},
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: 'white',
                    bodyColor: 'white',
                    borderColor: '#2563eb',
                    borderWidth: 1
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
    // Agama
    const agamaData = @json($agamaValues ?? []);
    const agamaLabel = @json($agamaLabels ?? []);
    const agamaPersen = agamaData.map(x => Math.round((x / Math.max(totalPenduduk, 1)) * 100));
    new Chart(document.getElementById('agamaChart'), {
        type: 'pie',
        data: {
            labels: agamaLabel,
            datasets: [{
                data: agamaData,
                backgroundColor: ['#22c55e', '#2563eb', '#f59e42', '#a3e635'],
                borderWidth: 3,
                borderColor: 'white'
            }]
        },
        options: {
            responsive: true, 
            plugins: {
                legend: {position: 'bottom'},
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: 'white',
                    bodyColor: 'white'
                }
            }
        }
    });
    // Tampilkan persentase di bawah grafik
    function setPersen(id, persen, label) {
        let html = '';
        for(let i=0; i<persen.length; i++) {
            html += `<div class='flex items-center gap-2 mb-2 p-2 rounded-lg hover:bg-gray-50 transition-colors'><span class='inline-block w-3 h-3 rounded-full' style='background:${['#22c55e','#2563eb','#f59e42','#a3e635'][i%4]}'></span> <span class='font-semibold'>${label[i]}</span> <span class='ml-auto text-sm text-gray-600 bg-gray-100 px-2 py-1 rounded-full'>${persen[i]}%</span></div>`;
        }
        document.getElementById(id).innerHTML = html;
    }
    // setPersen untuk umur dihapus
    setPersen('kawinPersen', kawinPersen, kawinLabel);
    setPersen('kerjaPersen', kerjaPersen, kerjaLabel);
    setPersen('pendidikanPersen', pendidikanPersen, pendidikanLabel);
    setPersen('agamaPersen', agamaPersen, agamaLabel);

    // Animasi scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        observer.observe(el);
    });

    // Leaflet Map untuk Interest Points
    setTimeout(() => {
        const interestMap = L.map('interest-point-map').setView([-2.612338, 140.850206], 15);
    
    // Tambahkan tile layer (satellite view)
    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    }).addTo(interestMap);

    // Data interest points
    const interestPoints = [
        {
            name: 'Pantai Skouw Yambe',
            lat: -2.612338,
            lng: 140.850206,
            icon: '🏖️',
            description: 'Wisata pantai berpasir hitam, sunrise & sunset yang memukau'
        },
        {
            name: 'Rumah Adat Tangfa',
            lat: -2.613000,
            lng: 140.851000,
            icon: '🏠',
            description: 'Pusat kegiatan adat & budaya tradisional'
        },
        {
            name: 'Konservasi Penyu',
            lat: -2.611500,
            lng: 140.849500,
            icon: '🐢',
            description: 'Lokasi pelestarian penyu dan edukasi lingkungan'
        },
        {
            name: 'Kebun Kelapa',
            lat: -2.614000,
            lng: 140.852000,
            icon: '🌴',
            description: 'Sentra produksi kelapa dan minyak kelapa'
        },
        {
            name: 'Balai Kampung',
            lat: -2.612800,
            lng: 140.850800,
            icon: '🏛️',
            description: 'Kantor pemerintahan dan pelayanan publik'
        }
    ];

    // Tambahkan markers untuk setiap interest point
    interestPoints.forEach(point => {
        const marker = L.marker([point.lat, point.lng]).addTo(interestMap);
        
        // Custom popup dengan styling yang menarik
        const popupContent = `
            <div class="p-3">
                <div class="flex items-center mb-2">
                    <span class="text-2xl mr-2">${point.icon}</span>
                    <h3 class="font-bold text-green-700 text-lg">${point.name}</h3>
                </div>
                <p class="text-gray-600 text-sm">${point.description}</p>
            </div>
        `;
        
        marker.bindPopup(popupContent, {
            maxWidth: 300,
            className: 'custom-popup'
        });
    });

        // Tambahkan custom CSS untuk popup
        const style = document.createElement('style');
        style.textContent = `
            .custom-popup .leaflet-popup-content-wrapper {
                background: white;
                border-radius: 12px;
                box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            }
            .custom-popup .leaflet-popup-tip {
                background: white;
            }
            .custom-popup .leaflet-popup-content {
                margin: 0;
                padding: 0;
            }
        `;
        document.head.appendChild(style);
    }, 100);
});
</script>

<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fadeInUp 0.6s ease-out forwards;
}

.animate-on-scroll {
    opacity: 0;
    transform: translateY(30px);
}

.card-hover {
    transition: all 0.3s ease;
}

.card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.stat-card {
    background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
    color: white;
}

.stat-card-alt {
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    color: white;
}

/* Chart layout helpers */
.chart-card {
    display: flex;
    flex-direction: column;
    height: 100%;
}
.chart-container {
    position: relative;
    height: 300px;
}

/* KPI modern cards */
.kpi-card {
    position: relative;
    overflow: hidden;
    border-radius: 1.25rem;
    padding: 2rem;
    color: #fff;
    box-shadow: 0 20px 30px -10px rgba(0,0,0,.25);
    isolation: isolate;
}
.kpi-card .kpi-inner { display: grid; grid-template-columns: auto 1fr; gap: 1rem; align-items: center; }
.kpi-card .icon-wrap { width: 64px; height: 64px; display: grid; place-items: center; border-radius: 9999px; background: rgba(255,255,255,.18); border: 1px solid rgba(255,255,255,.25); backdrop-filter: blur(6px); }
.kpi-card .label { font-weight: 700; letter-spacing: .2px; opacity: .95; margin-bottom: .25rem; }
.kpi-card .value { font-size: 2.75rem; font-weight: 800; line-height: 1; margin-bottom: .25rem; }
.kpi-card .unit { opacity: .9; font-size: .95rem; }
.kpi-card .glow {
    content: ""; position: absolute; inset: auto -20% -40% auto; width: 60%; height: 200%;
    background: radial-gradient(ellipse at top left, rgba(255,255,255,.35), transparent 60%);
    filter: blur(40px); z-index: -1;
}
.kpi-card.green { background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%); }
.kpi-card.blue { background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); }
</style>
@endsection

@section('content')
<div class="bg-gradient-to-br from-green-50 via-blue-50 to-indigo-50 py-12 min-h-screen">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Header Section -->
        <div class="text-center mb-16 animate-on-scroll">
            <h1 class="text-5xl font-bold mb-4 text-green-800 bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">
                Infografis Kampung Skouw Yambe
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Data demografis dan informasi lengkap tentang kampung kami dalam bentuk visual yang interaktif
            </p>
        </div>

        <!-- Struktur Organisasi Section -->
        <div class="mb-20 animate-on-scroll">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-green-700 mb-2">
                    <i class="fas fa-sitemap mr-3"></i>
                    Struktur Organisasi Kampung
                </h2>
                <p class="text-gray-600">Hierarki kepemimpinan dan organisasi kampung</p>
            </div>
            <div class="flex justify-center">
                <div class="max-w-2xl w-full">
                    <img src="/images/struktur.jpg" alt="Struktur Organisasi Kampung" 
                         class="rounded-2xl shadow-2xl w-full h-auto object-cover hover:scale-105 transition-transform duration-300">
                </div>
            </div>
        </div>

        <!-- Demografi Overview Cards -->
        <div class="mb-16 animate-on-scroll">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-green-700 mb-2">
                    <i class="fas fa-chart-line mr-3"></i>
                    Demografi Penduduk
                </h2>
                <p class="text-gray-600">Statistik dan data kependudukan kampung</p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <div class="kpi-card green card-hover">
                    <span class="glow"></span>
                    <div class="kpi-inner">
                        <div class="icon-wrap">
                            <i class="fas fa-user-friends text-3xl"></i>
                        </div>
                        <div>
                            <div class="label">Jumlah Penduduk</div>
                            <div class="value">{{ number_format($totalPenduduk ?? 0) }}</div>
                            <div class="unit">Jiwa</div>
                        </div>
                    </div>
                </div>
                <div class="kpi-card blue card-hover">
                    <span class="glow"></span>
                    <div class="kpi-inner">
                        <div class="icon-wrap">
                            <i class="fas fa-user-tie text-3xl"></i>
                        </div>
                        <div>
                            <div class="label">Kepala Keluarga</div>
                            <div class="value">{{ isset($kepalaKeluarga) ? number_format($kepalaKeluarga) : '-' }}</div>
                            <div class="unit">KK</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Grid -->
            <div class="grid md:grid-cols-2 gap-12 mb-12 items-stretch">
                <div class="bg-white rounded-2xl shadow-xl p-8 card-hover animate-on-scroll chart-card">
                    <div class="flex items-center mb-6">
                        <div class="bg-blue-100 rounded-full p-3 mr-4">
                            <i class="fas fa-ring text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-blue-700">Status Perkawinan</h3>
                </div>
                    <div class="chart-container">
                        <canvas id="perkawinanChart"></canvas>
                    </div>
                    <div id="kawinPersen" class="mt-6"></div>
                    <p class="text-gray-600 mt-4 p-4 bg-gray-50 rounded-lg">
                        <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                        Sebagian besar penduduk sudah menikah, jumlah <span class="font-bold text-blue-600">{{ $jumlahKawin !== null ? number_format($jumlahKawin) : '-' }}</span> jiwa.
                    </p>
                </div>
                <div class="bg-white rounded-2xl shadow-xl p-8 card-hover animate-on-scroll chart-card">
                    <div class="flex items-center mb-6">
                        <div class="bg-orange-100 rounded-full p-3 mr-4">
                            <i class="fas fa-tractor text-orange-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-orange-700">Pekerjaan</h3>
                    </div>
                    <div class="chart-container">
                        <canvas id="pekerjaanChart"></canvas>
                    </div>
                    <div id="kerjaPersen" class="mt-6"></div>
                    <p class="text-gray-600 mt-4 p-4 bg-gray-50 rounded-lg">
                        <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                        Sebagian besar bekerja sebagai petani, jumlah <span class="font-bold text-orange-600">{{ $jumlahPetani !== null ? number_format($jumlahPetani) : '-' }}</span> jiwa.
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-xl p-8 card-hover animate-on-scroll chart-card">
                    <div class="flex items-center mb-6">
                        <div class="bg-indigo-100 rounded-full p-3 mr-4">
                            <i class="fas fa-graduation-cap text-indigo-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-indigo-700">Tingkat Pendidikan</h3>
                </div>
                    <div class="chart-container">
                        <canvas id="pendidikanChart"></canvas>
                    </div>
                    <div id="pendidikanPersen" class="mt-6"></div>
                    <p class="text-gray-600 mt-4 p-4 bg-gray-50 rounded-lg">
                        <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                        Sebagian besar lulusan SD dan SMP, yang belum sekolah berjumlah <span class="font-bold text-indigo-600">{{ $jumlahTidakSekolah !== null ? number_format($jumlahTidakSekolah) : '-' }}</span> jiwa.
                    </p>
                </div>
                <div class="bg-white rounded-2xl shadow-xl p-8 card-hover animate-on-scroll chart-card">
                    <div class="flex items-center mb-6">
                        <div class="bg-purple-100 rounded-full p-3 mr-4">
                            <i class="fas fa-church text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-purple-700">Agama</h3>
                    </div>
                    <div class="chart-container">
                        <canvas id="agamaChart"></canvas>
                    </div>
                    <div id="agamaPersen" class="mt-6"></div>
                    <p class="text-gray-600 mt-4 p-4 bg-gray-50 rounded-lg">
                        <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                        Mayoritas Kristen dengan jumlah <span class="font-bold text-purple-600">{{ $jumlahKristen !== null ? number_format($jumlahKristen) : '-' }}</span> jiwa.
                    </p>
                </div>
            </div>
        </div>

        <!-- Interest Point Map Section -->
        <div class="mb-16 animate-on-scroll">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-green-700 mb-2">
                    <i class="fas fa-map-marked-alt mr-3"></i>
                    Peta & Interest Point Kampung
                </h2>
                <p class="text-gray-600">Lokasi-lokasi penting dan destinasi wisata kampung</p>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-8 items-start">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover">
                    <div class="w-full h-80" id="interest-point-map"></div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-xl p-8 card-hover">
                    <h3 class="text-xl font-bold text-green-700 mb-6">
                        <i class="fas fa-star text-yellow-500 mr-2"></i>
                        Destinasi Wisata & Tempat Penting
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-start p-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg hover:from-blue-100 hover:to-blue-200 transition-colors">
                            <i class="fas fa-umbrella-beach text-blue-600 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-bold text-blue-800">Pantai Skouw Yambe</h4>
                                <p class="text-blue-700 text-sm">Wisata pantai berpasir hitam, sunrise & sunset yang memukau</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start p-4 bg-gradient-to-r from-green-50 to-green-100 rounded-lg hover:from-green-100 hover:to-green-200 transition-colors">
                            <i class="fas fa-home text-green-600 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-bold text-green-800">Rumah Adat Tangfa</h4>
                                <p class="text-green-700 text-sm">Pusat kegiatan adat & budaya tradisional</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start p-4 bg-gradient-to-r from-purple-50 to-purple-100 rounded-lg hover:from-purple-100 hover:to-purple-200 transition-colors">
                            <i class="fas fa-fish text-purple-600 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-bold text-purple-800">Konservasi Penyu</h4>
                                <p class="text-purple-700 text-sm">Lokasi pelestarian penyu dan edukasi lingkungan</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start p-4 bg-gradient-to-r from-orange-50 to-orange-100 rounded-lg hover:from-orange-100 hover:to-orange-200 transition-colors">
                            <i class="fas fa-tree text-orange-600 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-bold text-orange-800">Kebun Kelapa</h4>
                                <p class="text-orange-700 text-sm">Sentra produksi kelapa dan minyak kelapa</p>
                            </div>
                </div>
                        
                        <div class="flex items-start p-4 bg-gradient-to-r from-red-50 to-red-100 rounded-lg hover:from-red-100 hover:to-red-200 transition-colors">
                            <i class="fas fa-building text-red-600 mt-1 mr-3"></i>
                <div>
                                <h4 class="font-bold text-red-800">Balai Kampung</h4>
                                <p class="text-red-700 text-sm">Kantor pemerintahan dan pelayanan publik</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 