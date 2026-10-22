<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="bg-white rounded-xl shadow-md p-6 text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Generate QR Code Absensi</h2>

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded text-left">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex flex-col items-center justify-center my-6">
                @if(isset($qrData))
                    <div class="p-4 bg-white border-2 border-gray-200 rounded-lg shadow-sm mb-4">
                        {!! QrCode::size(250)->generate($qrData) !!}
                    </div>
                    <p class="text-sm text-gray-600 mb-2">Scan QR Code di atas untuk melakukan absensi.</p>
                    <span class="text-xs text-gray-400 break-all">{{ $qrData }}</span>
                @else
                    <p class="text-gray-500">QR Code belum dibuat.</p>
                @endif
            </div>

            @if(isset($qrLocation))
                <div class="mt-6 pt-4 border-t border-gray-100 text-left">
                    <h3 class="font-semibold text-gray-700 mb-2">Informasi Lokasi QR:</h3>
                    <p class="text-sm text-gray-600"><strong>Latitude:</strong> {{ $qrLocation->latitude ?? '-' }}</p>
                    <p class="text-sm text-gray-600"><strong>Longitude:</strong> {{ $qrLocation->longitude ?? '-' }}</p>
                    <p class="text-sm text-gray-600"><strong>Radius:</strong> {{ $qrLocation->radius ?? '-' }} meter</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>