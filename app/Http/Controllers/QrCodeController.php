<?php

namespace App\Http\Controllers;

use App\Models\QrLocation;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function index()
    {
        $qrLocation = QrLocation::first();
        
        // URL yang tertanam pada QR Code mengarahkan ke form konfirmasi absensi
        $qrData = route('attendance.scan');

        return view('qrcode.index', compact('qrLocation', 'qrData'));
    }
}