@extends('layouts.app')

@section('title', 'Infografis Kampung')

@section('scripts')
<!-- Chart.js CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Data dummy
    const totalPenduduk = 800;
    // Umur
    const umurData = [60, 180, 350, 150, 60];
    const umurLabel = ['0-5', '6-17', '18-40', '41-60', '60+'];
    const umurPersen = umurData.map(x => Math.round(x/totalPenduduk*100));
    new Chart(document.getElementById('umurChart'), {
        type: 'bar',
        data: {
            labels: umurLabel,
            datasets: [{
                label: 'Jiwa',
                data: umurData,
                backgroundColor: '#22c55e',
                borderRadius: 8
            }]
        },
        options: {responsive: true, plugins: {legend: {display: false}}}
    });
    // Perkawinan
    const kawinData = [200, 550, 50];
    const kawinLabel = ['Belum Kawin', 'Kawin', 'Cerai'];
    const kawinPersen = kawinData.map(x => Math.round(x/totalPenduduk*100));
    new Chart(document.getElementById('perkawinanChart'), {
        type: 'pie',
        data: {
            labels: kawinLabel,
            datasets: [{
                data: kawinData,
                backgroundColor: ['#2563eb', '#22c55e', '#f59e42']
            }]
        },
        options: {responsive: true, plugins: {legend: {position: 'bottom'}}}
    });
    // Pekerjaan
    const kerjaData = [300, 100, 200, 200];
    const kerjaLabel = ['Petani', 'Nelayan', 'UMKM', 'Lainnya'];
    const kerjaPersen = kerjaData.map(x => Math.round(x/totalPenduduk*100));
    new Chart(document.getElementById('pekerjaanChart'), {
        type: 'doughnut',
        data: {
            labels: kerjaLabel,
            datasets: [{
                data: kerjaData,
                backgroundColor: ['#22c55e', '#2563eb', '#f59e42', '#a3e635']
            }]
        },
        options: {responsive: true, plugins: {legend: {position: 'bottom'}}}
    });
    // Pendidikan
    const pendidikanData = [200, 150, 100, 50, 300];
    const pendidikanLabel = ['SD', 'SMP', 'SMA', 'D3/S1', 'Tidak Sekolah'];
    const pendidikanPersen = pendidikanData.map(x => Math.round(x/totalPenduduk*100));
    new Chart(document.getElementById('pendidikanChart'), {
        type: 'bar',
        data: {
            labels: pendidikanLabel,
            datasets: [{
                label: 'Jiwa',
                data: pendidikanData,
                backgroundColor: '#2563eb',
                borderRadius: 8
            }]
        },
        options: {responsive: true, plugins: {legend: {display: false}}}
    });
    // Agama
    const agamaData = [600, 100, 80, 20];
    const agamaLabel = ['Kristen', 'Katolik', 'Islam', 'Lainnya'];
    const agamaPersen = agamaData.map(x => Math.round(x/totalPenduduk*100));
    new Chart(document.getElementById('agamaChart'), {
        type: 'pie',
        data: {
            labels: agamaLabel,
            datasets: [{
                data: agamaData,
                backgroundColor: ['#22c55e', '#2563eb', '#f59e42', '#a3e635']
            }]
        },
        options: {responsive: true, plugins: {legend: {position: 'bottom'}}}
    });
    // Tampilkan persentase di bawah grafik
    function setPersen(id, persen, label) {
        let html = '';
        for(let i=0; i<persen.length; i++) {
            html += `<div class='flex items-center gap-2 mb-1'><span class='inline-block w-3 h-3 rounded-full' style='background:${['#22c55e','#2563eb','#f59e42','#a3e635'][i%4]}'></span> <span class='font-semibold'>${label[i]}</span> <span class='ml-auto text-sm text-gray-600'>${persen[i]}%</span></div>`;
        }
        document.getElementById(id).innerHTML = html;
    }
    setPersen('umurPersen', umurPersen, umurLabel);
    setPersen('kawinPersen', kawinPersen, kawinLabel);
    setPersen('kerjaPersen', kerjaPersen, kerjaLabel);
    setPersen('pendidikanPersen', pendidikanPersen, pendidikanLabel);
    setPersen('agamaPersen', agamaPersen, agamaLabel);
});
</script>
@endsection

@section('content')
<div class="bg-gradient-to-br from-green-50 to-blue-50 py-12 min-h-screen">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-8 text-green-800">Infografis Kampung Skouw Yambe</h1>
        <!-- Struktur Organisasi (gambar) -->
        <div class="mb-16">
            <h2 class="text-2xl font-bold mb-4 text-green-700 text-center">Struktur Organisasi Kampung</h2>
            <div class="flex justify-center">
                <img src="/images/struktur.jpg" alt="Struktur Organisasi Kampung" class="rounded-xl shadow-lg max-w-full h-auto">
            </div>
        </div>
        <!-- Demografi Penduduk -->
        <div class="mb-16">
            <h2 class="text-2xl font-bold mb-4 text-green-700 text-center">Demografi Penduduk</h2>
            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <div class="bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center animate-fade-in">
                    <i class="fas fa-users text-3xl text-green-600 mb-2"></i>
                    <h3 class="text-lg font-bold text-green-700 mb-2">Jumlah Penduduk</h3>
                    <p class="text-4xl font-bold text-gray-900">800</p>
                    <p class="text-gray-600">Jiwa</p>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center animate-fade-in">
                    <i class="fas fa-home text-3xl text-green-600 mb-2"></i>
                    <h3 class="text-lg font-bold text-green-700 mb-2">Kepala Keluarga</h3>
                    <p class="text-4xl font-bold text-gray-900">200</p>
                    <p class="text-gray-600">KK</p>
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <div class="bg-white rounded-2xl shadow-lg p-8 animate-fade-in">
                    <div class="flex items-center mb-2"><i class="fas fa-chart-bar text-green-600 mr-2"></i><h3 class="text-lg font-bold text-green-700">Berdasarkan Umur</h3></div>
                    <canvas id="umurChart" height="180"></canvas>
                    <div id="umurPersen" class="mt-4"></div>
                    <p class="text-gray-600 mt-2">Mayoritas penduduk berusia produktif (18-40 tahun), yaitu <span class="font-bold">{{ round(350/800*100) }}%</span> dari total penduduk.</p>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-8 animate-fade-in">
                    <div class="flex items-center mb-2"><i class="fas fa-ring text-green-600 mr-2"></i><h3 class="text-lg font-bold text-green-700">Status Perkawinan</h3></div>
                    <canvas id="perkawinanChart" height="180"></canvas>
                    <div id="kawinPersen" class="mt-4"></div>
                    <p class="text-gray-600 mt-2">Sebagian besar penduduk sudah menikah (<span class="font-bold">{{ round(550/800*100) }}%</span>).</p>
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <div class="bg-white rounded-2xl shadow-lg p-8 animate-fade-in">
                    <div class="flex items-center mb-2"><i class="fas fa-tractor text-green-600 mr-2"></i><h3 class="text-lg font-bold text-green-700">Pekerjaan</h3></div>
                    <canvas id="pekerjaanChart" height="180"></canvas>
                    <div id="kerjaPersen" class="mt-4"></div>
                    <p class="text-gray-600 mt-2">Sebagian besar bekerja sebagai petani (<span class="font-bold">{{ round(300/800*100) }}%</span>).</p>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-8 animate-fade-in">
                    <div class="flex items-center mb-2"><i class="fas fa-graduation-cap text-green-600 mr-2"></i><h3 class="text-lg font-bold text-green-700">Tingkat Pendidikan</h3></div>
                    <canvas id="pendidikanChart" height="180"></canvas>
                    <div id="pendidikanPersen" class="mt-4"></div>
                    <p class="text-gray-600 mt-2">Sebagian besar lulusan SD dan SMP, masih banyak yang belum sekolah (<span class="font-bold">{{ round(300/800*100) }}%</span>).</p>
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <div class="bg-white rounded-2xl shadow-lg p-8 animate-fade-in">
                    <div class="flex items-center mb-2"><i class="fas fa-church text-green-600 mr-2"></i><h3 class="text-lg font-bold text-green-700">Agama</h3></div>
                    <canvas id="agamaChart" height="180"></canvas>
                    <div id="agamaPersen" class="mt-4"></div>
                    <p class="text-gray-600 mt-2">Mayoritas Kristen (<span class="font-bold">{{ round(600/800*100) }}%</span>), ada Katolik, Islam, dan lainnya.</p>
                </div>
            </div>
        </div>
        <!-- Interest Point Map -->
        <div class="mb-16">
            <h2 class="text-2xl font-bold mb-4 text-green-700 text-center">Peta & Interest Point Kampung</h2>
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="w-full h-96 rounded-xl overflow-hidden shadow-lg">
                    <iframe src="https://www.google.com/maps/d/embed?mid=1QwKSkouwYambeInterestPointMap" width="100%" height="100%"></iframe>
                </div>
                <div>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2">
                        <li><span class="font-bold">Pantai Skouw Yambe:</span> Wisata pantai berpasir hitam, sunrise & sunset.</li>
                        <li><span class="font-bold">Rumah Adat Tangfa:</span> Pusat kegiatan adat & budaya.</li>
                        <li><span class="font-bold">Konservasi Penyu:</span> Lokasi pelestarian penyu dan edukasi lingkungan.</li>
                        <li><span class="font-bold">Kebun Kelapa:</span> Sentra produksi kelapa dan minyak kelapa.</li>
                        <li><span class="font-bold">Balai Kampung:</span> Kantor pemerintahan dan pelayanan publik.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 