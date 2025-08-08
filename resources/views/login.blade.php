@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-400 to-blue-600 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white rounded-xl shadow-lg p-10">
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20 mb-4">
            <h2 class="mt-2 text-center text-3xl font-extrabold text-gray-900">Login Captive Portal</h2>
            <p class="mt-2 text-center text-sm text-gray-600">Silakan login untuk mengakses internet</p>
        </div>
        <form class="mt-8 space-y-6" action="#" method="POST">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input id="username" name="username" type="text" required class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm" placeholder="Masukkan username">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm" placeholder="Masukkan password">
                </div>
            </div>
            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-bold rounded-lg text-white bg-gradient-to-r from-green-500 to-blue-500 hover:from-blue-500 hover:to-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-200">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 