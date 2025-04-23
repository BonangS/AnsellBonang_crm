@extends('base.base')

@section('content')
<div class="flex justify-center bg-gray-100 text-gray-800">

<div class="w-full max-w-xl p-6 mt-[-40px]">

    <div class="bg-white p-8 rounded-xl shadow-xl">
      <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">
        {{ isset($lead) ? 'Edit' : 'Tambah' }} Lead
      </h1>

      <form action="{{ isset($lead) ? route('leads.update', $lead->id) : route('leads.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
          <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
          <input type="text" name="nama" id="nama" value="{{ old('nama', isset($lead) ? $lead->nama : '') }}"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-600" required>
        </div>

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" name="email" id="email" value="{{ old('email', isset($lead) ? $lead->email : '') }}"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-600" required>
        </div>

        <div>
          <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
          <input type="text" name="telepon" id="telepon" value="{{ old('telepon', isset($lead) ? $lead->telepon : '') }}"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-600" required>
        </div>

        <div>
          <label for="layanan" class="block text-sm font-medium text-gray-700">Layanan</label>
          <select name="layanan_id" id="layanan" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-600" required>
            <option value="" disabled {{ isset($lead) ? '' : 'selected' }}>Pilih Layanan</option>
            @foreach($layanan as $service)
              <option value="{{ $service->id }}" {{ (isset($lead) && $lead->layanan_id == $service->id) ? 'selected' : '' }}>
                {{ $service->nama }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="flex justify-between items-center pt-4">
          <a href="{{ route('leads.index') }}"
             class="bg-red-500 hover:bg-red-600 text-white font-medium px-6 py-3 rounded-lg shadow transition duration-300 ease-in-out transform hover:scale-105">
            ← Kembali
          </a>

          <button type="submit"
                  class="bg-green-600 hover:bg-green-700 text-white font-medium px-6 py-3 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
            {{ isset($lead) ? 'Update Lead' : 'Tambah Lead' }}
          </button>
        </div>
      </form>
    </div>
  </div>

</div>
@endsection
