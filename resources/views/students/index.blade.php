<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if (session('success'))
                    <div class="mb-4 text-green-600 font-bold">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('students.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md mb-4 inline-block">
                    + Tambah Siswa
                </a>

                <table class="w-full mt-4 border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">NIS</th>
                            <th class="border p-2">Nama Lengkap</th>
                            <th class="border p-2">Kelas</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                            <tr>
                                <td class="border p-2 text-center">{{ $student->nis }}</td>
                                <td class="border p-2">{{ $student->full_name }}</td>
                                <td class="border p-2 text-center">{{ $student->classRoom->nama_kelas ?? '-' }}</td>
                                <td class="border p-2 text-center">
                                    <a href="{{ route('students.edit', $student->id) }}" class="text-blue-600 mr-2">Edit</a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="border p-4 text-center">Belum ada data siswa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>