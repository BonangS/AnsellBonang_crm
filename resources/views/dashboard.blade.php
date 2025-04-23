@extends('base.base')

@section('content')

<div class="min-h-screen flex items-start justify-center pt-20"> {{-- naikkan posisi dengan pt-20 --}}
  <div class="bg-white p-8 rounded-lg shadow-md text-center w-full max-w-lg">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">
      @if (Auth::check() && Auth::user()->role === 'MANAGER')
        Selamat datang, Manager
      @else
        Selamat datang, Sales
      @endif
    </h1>
    <p class="text-lg text-gray-600">
      Di sini Anda dapat mengelola calon customer, layanan, proyek, dan customer.
    </p>
  </div>
</div>

@endsection
