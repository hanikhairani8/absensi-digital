<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'qr_location_id',
        'token',
        'date',
        'valid_from',
        'valid_until',
        'is_active'
    ];

    public function location()
    {
        return $this->belongsTo(QrLocation::class, 'qr_location_id');
    }
}