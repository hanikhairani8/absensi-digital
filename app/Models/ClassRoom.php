<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika di database namanya bukan 'class_rooms'
    protected $table = 'class_rooms'; 

    // Mendaftarkan kolom agar bisa dibaca dan diisi
    protected $fillable = [
        'nama_kelas',
    ];
}