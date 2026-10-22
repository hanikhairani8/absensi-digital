<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\QrLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    // Tampilan Form Scan / Konfirmasi Absen
    public function scan(Request $request)
    {
        return view('attendance.scan');
    }

    // Proses Simpan Data Kehadiran
    public function store(Request $request)
    {
        // Cari data siswa berdasarkan user yang sedang login
        $student = Student::where('user_id', Auth::id())->first();

        // Fallback jika login menggunakan akun Admin saat testing
        if (!$student) {
            $student = Student::first();
        }

        if (!$student) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan!');
        }

        // Cek apakah hari ini siswa sudah absen menggunakan kolom 'tanggal'
        $alreadyAttended = Attendance::where('student_id', $student->id)
            ->whereDate('tanggal', today())
            ->exists();

        if ($alreadyAttended) {
            return redirect()->back()->with('error', 'Kamu sudah melakukan absensi hari ini!');
        }

        // Ambil ID lokasi QR pertama (fallback jika tidak dikirim dari form)
        $qrLocationId = $request->input('qr_location_id') ?? QrLocation::first()?->id ?? 1;

        // Simpan absensi sesuai struktur tabel database 'attendances'
        Attendance::create([
            'student_id'     => $student->id,
            'tanggal'        => now()->toDateString(),
            'waktu'          => now()->toTimeString(),
            'status'         => 'Hadir',
            'qr_location_id' => $qrLocationId,
            'token'          => $request->input('token', 'DEFAULT_TOKEN'),
            'latitude'       => $request->input('latitude'),
            'longitude'      => $request->input('longitude'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Absensi berhasil dicatat!');
    }
}