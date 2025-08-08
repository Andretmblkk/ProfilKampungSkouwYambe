<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('home');
});

Route::get('/sejarah', function () {
    return view('sejarah');
})->name('sejarah');

Route::get('/potensi', function () {
    return view('potensi');
});

Route::get('/galeri', function () {
    return view('galeri');
});

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/umkm', function () {
    return view('umkm');
})->name('umkm');

Route::get('/berita', function () {
    return view('berita');
})->name('berita');

Route::get('/infografis', function () {
    return view('infografis');
})->name('infografis');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/peta', function () {
    return view('peta');
})->name('peta');

Route::get('/organisasi', function () {
    return view('organisasi');
})->name('organisasi');

Route::post('/kontak', [ContactController::class, 'sendEmail'])->name('contact.send');
