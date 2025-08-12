@extends('layouts.app')

@section('title', 'UMKM & Potensi')

@section('content')
<div class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-8 text-green-800">UMKM & Potensi Kampung Skouw Yambe</h1>
        @if($umkms->count() === 0)
            <div class="text-center text-gray-600">Belum ada data UMKM yang aktif.</div>
        @else
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($umkms as $umkm)
                    <div class="bg-green-50 rounded-xl shadow-lg p-6 flex flex-col items-center">
                        @if($umkm->image_path)
                            <img loading="lazy" src="{{ Storage::disk('public')->url($umkm->image_path) }}" alt="{{ e($umkm->name) }}" class="w-32 h-32 object-cover rounded-full mb-4">
                        @else
                            <div class="w-32 h-32 rounded-full bg-green-200 mb-4 flex items-center justify-center text-green-700 font-bold">UMKM</div>
                        @endif
                        <h2 class="text-xl font-semibold mb-2 text-green-700">{{ e($umkm->name) }}</h2>
                        @if($umkm->product_type)
                            <p class="text-green-600 text-sm mb-1">{{ e($umkm->product_type) }}</p>
                        @endif
                        @if($umkm->description)
                            <p class="text-gray-700 mb-2 text-center">{{ \Illuminate\Support\Str::limit($umkm->description, 160) }}</p>
                        @endif
                        <div class="text-gray-600 text-sm space-y-1 text-center">
                            @if($umkm->owner_name)
                                <p>Pemilik: {{ e($umkm->owner_name) }}</p>
                            @endif
                            @if($umkm->phone)
                                <p>Kontak: {{ e($umkm->phone) }}</p>
                            @endif
                            @if($umkm->email)
                                <p>Email: {{ e($umkm->email) }}</p>
                            @endif
                            @if($umkm->address)
                                <p class="text-xs text-gray-500">{{ e($umkm->address) }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $umkms->links() }}
            </div>
        @endif
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-4 text-green-700">Potensi Kampung</h2>
            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                <li>Pertanian sagu, kelapa, dan hortikultura</li>
                <li>Perikanan dan budidaya ikan air tawar</li>
                <li>Kerajinan tangan noken dan anyaman</li>
                <li>Ekowisata pantai, konservasi penyu, dan wisata budaya</li>
            </ul>
        </div>
    </div>
</div>
@endsection 