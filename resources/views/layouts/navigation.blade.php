<nav class="bg-white shadow border-b">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center gap-6">
                <a href="{{ route('dashboard') }}"
                   class="text-xl font-bold text-red-700">
                    Absensi Digital
                </a>

                <a href="{{ route('dashboard') }}"
                   class="text-gray-700 hover:text-red-700">
                    Dashboard
                </a>

                <a href="{{ route('class-rooms.index') }}"
                   class="text-gray-700 hover:text-red-700">
                    Data Kelas
                </a>

                <a href="{{ route('students.index') }}"
                   class="text-gray-700 hover:text-red-700">
                    Data Siswa
                </a>
                <a href="{{ route('qrcode.index') }}" class="text-gray-700 hover:text-red-700 font-medium">
    QR Code Absensi
</a>
            </div>
            

            <div class="flex items-center gap-4">
                <span class="text-gray-700 font-medium">
                    {{ Auth::user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        class="bg-red-700 hover:bg-red-800 text-white px-4 py-2 rounded">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>