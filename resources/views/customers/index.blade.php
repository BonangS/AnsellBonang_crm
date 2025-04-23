@extends('base.base')

@section('content')
<body class="bg-gray-100 text-gray-800">

  <div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Daftar Customer</h1>

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
            <th class="px-6 py-3 text-left">Status</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse($customers as $index => $customer)
            <tr class="hover:bg-gray-50 transition duration-300 ease-in-out">
              <td class="px-6 py-4">{{ $index + 1 }}</td>
              <td class="px-6 py-4">{{ $customer->nama }}</td>
              <td class="px-6 py-4">{{ $customer->email }}</td>
              <td class="px-6 py-4">{{ $customer->telepon }}</td>
              <td class="px-6 py-4">
                {{ $customer->layanan ? $customer->layanan->nama : 'Tidak ada layanan' }}
              </td>
              <td class="px-6 py-4">{{ $customer->status }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center px-6 py-4 text-gray-500">Tidak ada data customer.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</body>
@endsection
