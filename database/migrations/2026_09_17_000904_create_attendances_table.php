<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('attendances', function (Blueprint $table) {
        $table->id();
        $table->foreignId('student_id')->constrained()->cascadeOnDelete();
        $table->date('tanggal');
        $table->time('waktu');
        $table->enum('status',['Hadir','Izin','Sakit','Alpa']);
        $table->foreignId('qr_location_id')->constrained()->cascadeOnDelete();
        $table->string('token');
        $table->decimal('latitude',10,7)->nullable();
        $table->decimal('longitude',10,7)->nullable();
        $table->timestamps();
    });
}    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
