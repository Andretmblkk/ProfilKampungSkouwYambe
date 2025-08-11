<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Umkm;
use App\Models\Infographic;

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

        return view('home', compact('latestArticles', 'featuredGallery'));
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

        return view('infografis', compact('infographics'));
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