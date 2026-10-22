<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function index()
    {
        $classes = ClassRoom::latest()->get(); // Mengambil semua data kelas
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelas' => ['required', 'string', 'max:100'],
        ]);

        ClassRoom::create($validated);

        return redirect()->route('class-rooms.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function edit(ClassRoom $class_room)
    {
        return view('classes.edit', ['kelas' => $class_room]);
    }

    public function update(Request $request, ClassRoom $class_room)
    {
        $validated = $request->validate([
            'nama_kelas' => ['required', 'string', 'max:100'],
        ]);

        $class_room->update($validated);

        return redirect()->route('class-rooms.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function destroy(ClassRoom $class_room)
    {
        $class_room->delete();

        return redirect()->route('class-rooms.index')
            ->with('success', 'Data kelas berhasil dihapus.');
    }
}