<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('classRoom')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $classes = ClassRoom::all();
        return view('students.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:students,nis',
            'full_name' => 'required',
            'class_id' => 'required',
        ]);

        Student::create([
            'user_id'   => auth()->id(),
            'class_id'  => $request->class_id,
            'nis'       => $request->nis,
            'full_name' => $request->full_name,
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $classes = ClassRoom::all();
        return view('students.edit', compact('student', 'classes'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nis' => 'required|unique:students,nis,' . $student->id,
            'full_name' => 'required',
            'class_id' => 'required',
        ]);

        $student->update([
            'class_id'  => $request->class_id,
            'nis'       => $request->nis,
            'full_name' => $request->full_name,
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil diubah.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}