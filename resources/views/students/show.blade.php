<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p><strong>NIS:</strong> {{ $student->nis }}</p>
                <p class="mt-2"><strong>Nama:</strong> {{ $student->full_name }}</p>
                <p class="mt-2"><strong>Kelas:</strong> {{ $student->classRoom->nama_kelas ?? '-' }}</p>

                <div class="mt-6">
                    <a href="{{ route('students.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-md">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>