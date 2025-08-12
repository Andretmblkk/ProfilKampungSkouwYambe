<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Umkm;
use App\Models\Infographic;
use App\Models\DataPenduduk;

class WebController extends Controller
{
    public function home()
    {
        $latestArticles = Article::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();
        
        $featuredGallery = Gallery::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Data ringkas administrasi penduduk (sinkron dengan infografis)
        $totalPendudukHome = (int) (DataPenduduk::where('kategori', 'total_penduduk')->value('jumlah') ?? 0);
        $kepalaKeluargaHome = DataPenduduk::whereIn('kategori', ['kepala_keluarga', 'kk'])->value('jumlah');
        $kepalaKeluargaHome = $kepalaKeluargaHome !== null ? (int) $kepalaKeluargaHome : null;

        $lakiHome = DataPenduduk::where('kategori', 'jenis_kelamin')
            ->whereIn('label', ['Laki-laki', 'Laki Laki'])
            ->value('jumlah');
        $lakiHome = $lakiHome !== null ? (int) $lakiHome : null;

        $perempuanHome = DataPenduduk::where('kategori', 'jenis_kelamin')
            ->where('label', 'Perempuan')
            ->value('jumlah');
        $perempuanHome = $perempuanHome !== null ? (int) $perempuanHome : null;

        return view('home', compact(
            'latestArticles', 'featuredGallery',
            'totalPendudukHome', 'kepalaKeluargaHome', 'lakiHome', 'perempuanHome'
        ));
    }

    public function berita()
    {
        $articles = Article::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        return view('berita', compact('articles'));
    }

    public function beritaDetail($slug)
    {
        $article = Article::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $relatedArticles = Article::where('is_published', true)
            ->where('id', '!=', $article->id)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('berita-detail', compact('article', 'relatedArticles'));
    }

    public function galeri()
    {
        $galleries = Gallery::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('galeri', compact('galleries'));
    }

    public function umkm()
    {
        $umkms = Umkm::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('umkm', compact('umkms'));
    }

    public function infografis()
    {
        $infographics = Infographic::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        // Ambil data per kategori dari DataPenduduk
        $getCategoryData = function (string $category) {
            return DataPenduduk::where('kategori', $category)
                ->where('is_active', true)
                ->orderBy('label')
                ->get(['label', 'jumlah']);
        };

        $umur = $getCategoryData('umur');
        $perkawinan = $getCategoryData('perkawinan');
        $pekerjaan = $getCategoryData('pekerjaan');
        $pendidikan = $getCategoryData('pendidikan');
        $agama = $getCategoryData('agama');

        $umurLabels = $umur->pluck('label');
        $umurValues = $umur->pluck('jumlah')->map(fn($v) => (int) $v);

        $kawinLabels = $perkawinan->pluck('label');
        $kawinValues = $perkawinan->pluck('jumlah')->map(fn($v) => (int) $v);

        $kerjaLabels = $pekerjaan->pluck('label');
        $kerjaValues = $pekerjaan->pluck('jumlah')->map(fn($v) => (int) $v);

        $pendidikanLabels = $pendidikan->pluck('label');
        $pendidikanValues = $pendidikan->pluck('jumlah')->map(fn($v) => (int) $v);

        $agamaLabels = $agama->pluck('label');
        $agamaValues = $agama->pluck('jumlah')->map(fn($v) => (int) $v);

        // Total penduduk: gunakan kategori 'total_penduduk' jika ada, jika tidak jumlahkan data umur
        $totalPenduduk = (int) (DataPenduduk::where('kategori', 'total_penduduk')->value('jumlah') ?? 0);
        if ($totalPenduduk === 0 && $umurValues->count() > 0) {
            $totalPenduduk = $umurValues->sum();
        }

        // Kepala keluarga: cari kategori 'kepala_keluarga' atau 'kk'
        $kepalaKeluarga = DataPenduduk::whereIn('kategori', ['kepala_keluarga', 'kk'])->value('jumlah');
        $kepalaKeluarga = $kepalaKeluarga !== null ? (int) $kepalaKeluarga : null;

        // Helper untuk hitung persen berdasarkan beberapa kandidat label
        $percentOf = function ($labels, $values, array $targetLabels) use ($totalPenduduk) {
            if ($totalPenduduk <= 0) {
                return null;
            }
            foreach ($targetLabels as $target) {
                $idx = $labels->search(fn($l) => strcasecmp((string) $l, $target) === 0);
                if ($idx !== false) {
                    $val = (int) $values[$idx];
                    return (int) round($val / max($totalPenduduk, 1) * 100);
                }
            }
            return null;
        };

        $persenUmur1840 = $percentOf($umurLabels, $umurValues, ['18-40']);
        $persenKawin = $percentOf($kawinLabels, $kawinValues, ['Kawin']);
        $persenPetani = $percentOf($kerjaLabels, $kerjaValues, ['Petani', 'Petani/Pekebun']);
        $persenTidakSekolah = $percentOf($pendidikanLabels, $pendidikanValues, ['Tidak Sekolah']);
        $persenKristen = $percentOf($agamaLabels, $agamaValues, ['Kristen', 'Kristen Protestan']);

        // Nilai absolut (jumlah) untuk teks keterangan
        $countOf = function ($labels, $values, array $targetLabels) {
            foreach ($targetLabels as $target) {
                $idx = $labels->search(fn($l) => strcasecmp((string) $l, $target) === 0);
                if ($idx !== false) {
                    return (int) $values[$idx];
                }
            }
            return null;
        };

        $jumlahUmur1840 = $countOf($umurLabels, $umurValues, ['18-40']);
        $jumlahKawin = $countOf($kawinLabels, $kawinValues, ['Kawin']);
        $jumlahPetani = $countOf($kerjaLabels, $kerjaValues, ['Petani', 'Petani/Pekebun']);
        $jumlahTidakSekolah = $countOf($pendidikanLabels, $pendidikanValues, ['Tidak Sekolah']);
        $jumlahKristen = $countOf($agamaLabels, $agamaValues, ['Kristen', 'Kristen Protestan']);

        return view('infografis', compact(
            'infographics',
            'totalPenduduk',
            'kepalaKeluarga',
            'umurLabels', 'umurValues',
            'kawinLabels', 'kawinValues',
            'kerjaLabels', 'kerjaValues',
            'pendidikanLabels', 'pendidikanValues',
            'agamaLabels', 'agamaValues',
            'persenUmur1840', 'persenKawin', 'persenPetani', 'persenTidakSekolah', 'persenKristen',
            'jumlahUmur1840', 'jumlahKawin', 'jumlahPetani', 'jumlahTidakSekolah', 'jumlahKristen'
        ));
    }

    public function sejarah()
    {
        return view('sejarah');
    }

    public function potensi()
    {
        return view('potensi');
    }

    public function profil()
    {
        return view('profil');
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function login()
    {
        return view('login');
    }

    public function peta()
    {
        return view('peta');
    }

    public function organisasi()
    {
        return view('organisasi');
    }
}