<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\NewsletterController;

Route::get('/', [WebController::class, 'home'])->name('home');

Route::get('/sejarah', [WebController::class, 'sejarah'])->name('sejarah');

Route::get('/potensi', [WebController::class, 'potensi'])->name('potensi');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

Route::get('/profil', [WebController::class, 'profil'])->name('profil');

Route::get('/umkm', [WebController::class, 'umkm'])->name('umkm');

Route::get('/berita', [WebController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [WebController::class, 'beritaDetail'])->name('berita.detail');

Route::get('/infografis', [WebController::class, 'infografis'])->name('infografis');

Route::get('/kontak', [WebController::class, 'kontak'])->name('kontak');

Route::get('/login', [WebController::class, 'login'])->name('login');

Route::get('/peta', [WebController::class, 'peta'])->name('peta');

Route::get('/organisasi', [WebController::class, 'organisasi'])->name('organisasi');

Route::post('/kontak', [ContactController::class, 'sendEmail'])->name('contact.send');

// Newsletter Routes
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::post('/newsletter/unsubscribe', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');
Route::post('/newsletter/resubscribe', [NewsletterController::class, 'resubscribe'])->name('newsletter.resubscribe');
Route::get('/newsletter/unsubscribe', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe.get');

// Test Route (Development only)
Route::get('/test-newsletter', function() {
    return view('test-newsletter');
})->name('test.newsletter');
