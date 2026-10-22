<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassRoom;
use App\Models\Attendance;
use App\Models\QrLocation;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Cari data siswa dari user login
        $student = Student::where('user_id', Auth::id())->first() ?? Student::first();

        return view('dashboard', [
            'totalSiswa'   => Student::count(),
            'totalKelas'   => ClassRoom::count(),
            'hadirHariIni' => Attendance::whereDate('tanggal', today())->count(),
            'totalQr'      => QrLocation::count(),
            // Ambil data riwayat absensi untuk ditampilkan di tabel
            'attendances'  => Attendance::where('student_id', $student?->id)
                                ->latest('tanggal')
                                ->get(),
        ]);
    }
}