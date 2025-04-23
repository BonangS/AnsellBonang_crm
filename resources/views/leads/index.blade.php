@extends('base.base')

@section('content')
<body class="bg-gray-100 text-gray-800">

  <div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Daftar Calon Customer</h1>

    <div class="flex justify-end mb-6">
      <a href="{{ route('leads.create') }}"
         class="bg-green-600 hover:bg-green-700 text-white font-medium px-6 py-3 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
        + Tambah Lead
      </a>
    </div>

    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-6">
        {{ session('success') }}
      </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
      <table class="min-w-full text-sm text-gray-800">
        <thead class="bg-green-600 text-white uppercase text-xs">
          <tr>
            <th class="px-6 py-3 text-left">No.</th>
            <th class="px-6 py-3 text-left">Nama</th>
            <th class="px-6 py-3 text-left">Email</th>
            <th class="px-6 py-3 text-left">Telepon</th>
            <th class="px-6 py-3 text-left">Layanan</th>
            <th class="px-6 py-3 text-left">Status</th> <!-- Menambahkan kolom status lead -->
            <th class="px-6 py-3 text-left">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse($leads as $index => $lead)
            <tr class="hover:bg-gray-50 transition duration-300 ease-in-out">
              <td class="px-6 py-4">{{ $index + 1 }}</td>
              <td class="px-6 py-4">{{ $lead->nama }}</td>
              <td class="px-6 py-4">{{ $lead->email }}</td>
              <td class="px-6 py-4">{{ $lead->telepon }}</td>
              <td class="px-6 py-4">
                {{ $lead->layanan ? $lead->layanan->nama : 'Tidak ada layanan' }}
              </td>
              <td class="px-6 py-4">
                <!-- Menampilkan status lead -->
                {{ ucfirst($lead->status) }} <!-- Menampilkan status lead -->
              </td>
              <td class="px-6 py-4">
  <div class="flex gap-4">
    @if($lead->status !== 'rejected')
      <a href="{{ route('leads.edit', $lead->id) }}"
         class="text-blue-600 hover:underline px-4 py-2 rounded-lg bg-blue-100 hover:bg-blue-200 transition duration-200 ease-in-out">
        Edit
      </a>
      <form action="{{ route('leads.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('Hapus lead ini?')">
        @csrf @method('DELETE')
        <button class="text-red-600 hover:underline px-4 py-2 rounded-lg bg-red-100 hover:bg-red-200 transition duration-200 ease-in-out">
          Hapus
        </button>
      </form>
    @else
      <span class="text-gray-400 italic">Tidak tersedia</span>
    @endif
  </div>
</td>

            </tr>
          @empty
            <tr>
              <td colspan="8" class="text-center px-6 py-4 text-gray-500">Tidak ada data calon customer.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</body>
@endsection
