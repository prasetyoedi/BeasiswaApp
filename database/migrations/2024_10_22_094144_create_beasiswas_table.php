<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk membuat tabel 'beasiswas' di database.
 * Initial State: Tidak ada tabel 'beasiswas' di database.
 * Final State: Tabel 'beasiswas' terbentuk di database dengan kolom sesuai kebutuhan.
 * Author: Prasetyo Edi Pamungkas
 * Version: 1.0 - 26 Oktober 2024
 */

return new class extends Migration {
    /**
     * Membuat tabel 'beasiswas' dengan kolom yang diperlukan.
     * Initial State: Tidak ada tabel 'beasiswas' di database.
     * Final State: Tabel 'beasiswas' dibuat dengan kolom sesuai spesifikasi.
     */
    public function up(): void
    {
        // Membuat tabel baru bernama 'beasiswas' menggunakan metode 'create' pada Schema
        Schema::create('beasiswas', function (Blueprint $table) {
            // Menambahkan kolom ID sebagai primary key
            $table->id();
            // Menambahkan kolom 'name' untuk menyimpan nama pendaftar
            $table->string('name');
            // Menambahkan kolom 'email' untuk menyimpan email unik pendaftar
            $table->string('email')->unique();
            // Menambahkan kolom 'phone' untuk menyimpan nomor telepon pendaftar
            $table->string('phone');
            // Menambahkan kolom 'semester' untuk menyimpan semester pendaftar
            $table->integer('semester');
            // Menambahkan kolom 'file' untuk menyimpan path file yang diupload pendaftar
            $table->string('file');
            // Menambahkan kolom 'status_ajuan' dengan default 'belum diverifikasi' untuk status pendaftaran
            $table->string('status_ajuan')->default('belum diverifikasi');
            // Menambahkan kolom 'timestamps' untuk mencatat waktu pendaftaran
            $table->timestamps();
        });
    }

    /**
     * Menghapus tabel 'beasiswas' dari database jika sebelumnya sudah ada.
     * Initial State: Tabel 'beasiswas' ada di database.
     * Final State: Tabel 'beasiswas' dihapus dari database.
     */
    public function down(): void
    {
        // Menghapus tabel 'beasiswas' menggunakan metode 'dropIfExists' pada Schema
        Schema::dropIfExists('beasiswas');
    }
};
