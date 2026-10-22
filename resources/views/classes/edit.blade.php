<x-app-layout>
    <div class="container py-4">
        <h2>Edit Kelas</h2>

        <form action="{{ route('class-rooms.update', $kelas->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Kelas</label>
                <input type="text" name="nama_kelas" value="{{ $kelas->nama_kelas }}" class="form-control">
            </div>

            <button class="btn btn-primary">Update</button>
        </form>
    </div>
</x-app-layout>