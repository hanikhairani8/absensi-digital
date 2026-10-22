<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Data Kelas</h2>
            <a href="{{ route('class-rooms.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition">
                + Tambah Kelas
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-200 text-gray-700">
                        <th class="p-4 text-center w-16">No</th>
                        <th class="p-4">Nama Kelas</th>
                        <th class="p-4 text-center w-48">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Memastikan variabel tidak undefined meski dikirim dengan nama berbeda
                        $listKelas = $classes ?? $classRooms ?? [];
                    @endphp

                    @forelse($listKelas as $kelas)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                            <td class="p-4 text-center">{{ $loop->iteration }}</td>
                            <td class="p-4 font-medium text-gray-800">
                                {{ $kelas->nama_kelas ?? $kelas->class_name ?? $kelas->name ?? 'Tanpa Nama' }}
                            </td>
                            <td class="p-4 text-center">
                                <a href="{{ route('class-rooms.edit', $kelas->id) }}" class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold rounded-md shadow transition inline-block">
                                    Edit
                                </a>

                                <form action="{{ route('class-rooms.destroy', $kelas->id) }}" method="POST" class="inline-block ml-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Apakah kamu yakin ingin menghapus kelas ini?')" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-md shadow transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-6 text-center text-gray-500">
                                Belum ada data kelas yang tersimpan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>