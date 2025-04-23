@extends('base.base')

@section('content')
<body class="bg-gray-100 text-gray-800">

  <div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Daftar Project</h1>

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
                <div class="flex gap-4">
                  @if(!$lead->is_customer)
                    <!-- Approve button -->
                    <form action="{{ route('projects.approve', $lead->id) }}" method="POST" onsubmit="return confirm('Setujui calon customer ini?')">
                      @csrf
                      <button class="text-green-600 hover:underline px-4 py-2 rounded-lg bg-green-100 hover:bg-green-200 transition duration-200 ease-in-out">
                        Approve
                      </button>
                    </form>
                    <!-- Reject button -->
                    <form action="{{ route('projects.reject', $lead->id) }}" method="POST" onsubmit="return confirm('Tolak calon customer ini?')">
                      @csrf
                      <button class="text-red-600 hover:underline px-4 py-2 rounded-lg bg-red-100 hover:bg-red-200 transition duration-200 ease-in-out">
                        Reject
                      </button>
                    </form>
                  @else
                    <span class="text-sm text-gray-500 italic">Sudah disetujui</span>
                  @endif
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center px-6 py-4 text-gray-500">Tidak ada data calon customer.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</body>
@endsection
