<x-app-layout>

<div class="max-w-7xl mx-auto px-4 py-6">

    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        Dashboard Absensi Digital
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="bg-blue-600 text-white rounded-xl shadow p-6">
            <p>Total Siswa</p>
            <h2 class="text-3xl font-bold">{{ $totalSiswa }}</h2>
        </div>

        <div class="bg-green-600 text-white rounded-xl shadow p-6">
            <p>Total Kelas</p>
            <h2 class="text-3xl font-bold">{{ $totalKelas }}</h2>
        </div>

        <div class="bg-yellow-400 rounded-xl shadow p-6">
            <p>Hadir Hari Ini</p>
            <h2 class="text-3xl font-bold">{{ $hadirHariIni }}</h2>
        </div>

        <!-- Kartu QR Lokasi dibuat clickable -->
        <a href="{{ route('qrcode.index') }}" class="bg-red-600 hover:bg-red-700 transition text-white rounded-xl shadow p-6 block">
            <div class="flex justify-between items-center">
                <p>QR Lokasi</p>
                <span class="text-xs bg-white text-red-600 font-semibold px-2 py-1 rounded-md">Buka QR →</span>
            </div>
            <h2 class="text-3xl font-bold mt-1">{{ $totalQr }}</h2>
        </a>

    </div>

    <!-- Tabel Riwayat Absensi Tambahan -->
    <div class="mt-8 bg-white p-6 rounded-xl shadow">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Riwayat Absensi</h3>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="border border-gray-200 p-3 text-left">Tanggal</th>
                        <th class="border border-gray-200 p-3 text-left">Waktu Scan</th>
                        <th class="border border-gray-200 p-3 text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-200 p-3">{{ $item->tanggal }}</td>
                            <td class="border border-gray-200 p-3">{{ $item->waktu }}</td>
                            <td class="border border-gray-200 p-3 text-center">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $item->status }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="border border-gray-200 p-4 text-center text-gray-500">
                                Belum ada riwayat absensi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

</x-app-layout>