@extends('base.base')

@section('content')
<div class="flex justify-center bg-gray-100 text-gray-800">

  <div class="w-full max-w-xl p-6 mt-[-40px]">
    <div class="bg-white p-8 rounded-xl shadow-xl">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">
        Tambah Layanan
      </h1>

      <form action="{{ isset($layanan) ? route('layanan.update', $layanan->id) : route('layanan.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
          <label for="nama" class="block text-sm font-medium text-gray-700">Nama Layanan</label>
          <input type="text" name="nama" id="nama" value="{{ old('nama', isset($layanan) ? $layanan->nama : '') }}"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-600" required>
        </div>

        <div>
          <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
          <textarea name="deskripsi" id="deskripsi" rows="4"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-600"
                    required>{{ old('deskripsi', isset($layanan) ? $layanan->deskripsi : '') }}</textarea>
        </div>

        <div>
          <label for="harga" class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
          <input type="number" name="harga" id="harga" min="0" step="100"
                value="{{ old('harga', isset($layanan) ? $layanan->harga : '') }}"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-600" required>
        </div>

        <div class="flex justify-between items-center pt-4">
          <a href="{{ route('layanan.index') }}"
             class="bg-red-500 hover:bg-red-600 text-white font-medium px-6 py-3 rounded-lg shadow transition duration-300 ease-in-out transform hover:scale-105">
            ← Kembali
          </a>

          <button type="submit"
                  class="bg-green-600 hover:bg-green-700 text-white font-medium px-6 py-3 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
            Tambah Layanan
          </button>
        </div>
      </form>
    </div>
  </div>

</div>
@endsection
