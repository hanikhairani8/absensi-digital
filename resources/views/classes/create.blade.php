<x-app-layout>
    <div class="container py-4">
        <h2>Tambah Kelas</h2>

        <form action="{{ route('class-rooms.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama Kelas</label>
                <input type="text" name="nama_kelas" class="form-control">
            </div>

            <button class="btn btn-success">Simpan</button>
        </form>
    </div>
</x-app-layout>