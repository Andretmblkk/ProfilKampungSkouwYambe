<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WebController;

Route::get('/', [WebController::class, 'home'])->name('home');

Route::get('/sejarah', [WebController::class, 'sejarah'])->name('sejarah');

Route::get('/potensi', [WebController::class, 'potensi'])->name('potensi');

Route::get('/galeri', [WebController::class, 'galeri'])->name('galeri');

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
