<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeasiswaController extends Controller
{
    const IPK = 3.4; // Asumsi IPK tetap, misal 3.4

    // Fungsi untuk menampilkan form pendaftaran beasiswa
    public function index()
    {
        $ipk = self::IPK; // Mengambil nilai IPK untuk dikirim ke view
        $beasiswaOptions = [
            'Akademik' => 'Beasiswa Akademik',
            'Non-Akademik' => 'Beasiswa Non-Akademik'
        ]; // Pilihan beasiswa

        return view('beasiswa.index', compact('ipk', 'beasiswaOptions'));
    }

    // Fungsi untuk memproses pendaftaran beasiswa
    public function daftar(Request $request)
    {
        // Validasi input form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'semester' => 'required|integer|min:1|max:8',
            'beasiswa_type' => 'required|string|in:Akademik,Non-Akademik', // Validasi jenis beasiswa
            'file' => 'required|mimes:pdf,jpg,zip|max:2048',
        ]);

        // Cek apakah IPK memenuhi syarat
        if (self::IPK < 3) {
            return redirect()->back()->withErrors(['error' => 'IPK Anda kurang dari 3, tidak bisa mendaftar beasiswa.']);
        }

        // Proses upload file
        $filePath = $request->file('file')->store('uploads');

        // Simpan data ke database
        $beasiswa = Beasiswa::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'semester' => $request->input('semester'),
            'beasiswa_type' => $request->input('beasiswa_type'), // Simpan jenis beasiswa
            'file' => $filePath,
            'status_ajuan' => 'Belum Diverifikasi', // Status default
        ]);

        // Redirect ke halaman hasil pendaftaran dengan ID beasiswa
        return redirect()->route('beasiswa.hasil', $beasiswa->id);
    }

    // Fungsi untuk menampilkan hasil pendaftaran beasiswa
    public function hasil($id)
    {
        $beasiswa = Beasiswa::findOrFail($id); // Mengambil data pendaftaran berdasarkan ID
        return view('beasiswa.hasil', compact('beasiswa'));
    }
}
