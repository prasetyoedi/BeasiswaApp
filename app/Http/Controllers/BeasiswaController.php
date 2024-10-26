<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Controller untuk mengelola pendaftaran beasiswa.
 * Author: Prasetyo Edi Pamungkas
 * Version: 1.0 - 26 Oktober 2024
 */

class BeasiswaController extends Controller
{
    // Mendefinisikan IPK minimum sebagai konstanta
    const IPK = 3.4; // Asumsi IPK tetap, misal 3.4
    /**
     * Fungsi untuk menampilkan form pendaftaran beasiswa.
     * Initial State: Data beasiswa disiapkan.
     * Final State: Halaman pilihan beasiswa ditampilkan.
     */

    public function index()
    {
        // Mendefinisikan nilai IPK untuk digunakan pada halaman
        $ipk = self::IPK;
        // Menyiapkan opsi beasiswa dan syarat masing-masing
        $beasiswaOptions = [
            'Akademik' => 'IPK diatas 3,5 dan melampirkan transkrip nilai',
            'Non-Akademik' => 'IPK diatas 3 dan melampirkan bukti prestasi lomba'
        ];
        // Menampilkan halaman dengan mengirimkan data IPK dan opsi beasiswa
        return view('beasiswa.index', compact('ipk', 'beasiswaOptions'));
    }

    /**
     * Fungsi untuk memproses pendaftaran beasiswa.
     * Initial State: Formulir diisi lengkap dengan data valid.
     * Final State: Data tersimpan di database dan halaman hasil ditampilkan.
     */
    public function daftar(Request $request)
    {
        // Mengukur waktu awal eksekusi
        $startTime = microtime(true);

        // Validasi input form dengan aturan untuk setiap kolom
        $request->validate([
            'name' => 'required|string|max:255', // Nama wajib diisi
            'email' => 'required|email|unique:beasiswas,email', // Email wajib, unik
            'phone' => 'required|numeric', // Nomor telepon wajib diisi
            'semester' => 'required|integer|min:1|max:8', // Semester wajib, harus 1-8
            'beasiswa_type' => 'required|string|in:Akademik,Non-Akademik', // Tipe beasiswa harus valid
            'file' => 'required|mimes:pdf,jpg,zip|max:2048', // File wajib dengan tipe dan ukuran tertentu
        ]);

        // Cek apakah IPK memenuhi syarat
        if (self::IPK < 3) {
            return redirect()->back()->withErrors(['error' => 'IPK Anda kurang dari 3, tidak bisa mendaftar beasiswa.']);
        }

        // Blok try-catch untuk menangani kesalahan
        try {
            // Proses upload file
            $filePath = $request->file('file')->store('uploads');

            // Simpan data ke database
            $beasiswa = Beasiswa::create([
                'name' => $request->input('name'), // Nama pendaftar
                'email' => $request->input('email'), // Email pendaftar
                'phone' => $request->input('phone'), // Nomor telepon pendaftar
                'semester' => $request->input('semester'), // Semester pendaftar
                'beasiswa_type' => $request->input('beasiswa_type'), // Tipe beasiswa
                'file' => $filePath, // Path file upload
                'status_ajuan' => 'Belum Diverifikasi', // Status awal pendaftaran
            ]);

            // Mengukur waktu akhir eksekusi
            $endTime = microtime(true);
            $executionTime = $endTime - $startTime; // Menghitung waktu eksekusi

            // Redirect ke halaman hasil pendaftaran dengan ID beasiswa
            return redirect()->route('beasiswa.hasil', $beasiswa->id)
                ->with('success', 'Pendaftaran berhasil! Waktu eksekusi: ' .
                    round($executionTime, 4) . ' detik');
        } catch (\Exception $e) {
            // Mengembalikan pesan error jika terjadi masalah
            return back()->withErrors(['error' => 'Gagal menyimpan data.']);
        }
    }


    /**
     * Menampilkan form pendaftaran beasiswa.
     * Initial State: Tidak ada data baru.
     * Final State: Halaman form pendaftaran ditampilkan.
     */

    public function create(Request $request)
    {
        // Mendefinisikan nilai IPK untuk digunakan pada form
        $ipk = self::IPK;
        // Menyiapkan opsi jenis beasiswa
        $beasiswaOptions = [
            'Akademik' => 'Beasiswa Akademik',
            'Non-Akademik' => 'Beasiswa Non-Akademik',
        ];

        // Cek apakah ada beasiswa_type dari request, lalu set defaultnya
        $selectedBeasiswa = $request->query('beasiswa_type', null);

        // Menampilkan halaman form pendaftaran
        return view(
            'beasiswa.daftar',
            compact('ipk', 'beasiswaOptions', 'selectedBeasiswa')
        );
    }

    /**
     * Fungsi untuk menampilkan hasil pendaftaran beasiswa.
     * Initial State: ID pendaftaran sudah ada.
     * Final State: Halaman hasil pendaftaran dengan data lengkap ditampilkan.
     */
    public function hasil($id)
    {
        // Mencari data pendaftaran berdasarkan ID yang diberikan
        $beasiswa = Beasiswa::findOrFail($id);
        // Menampilkan halaman hasil dengan data pendaftaran
        return view('beasiswa.hasil', compact('beasiswa'));
    }

    /**
     * Fungsi untuk menampilkan daftar pendaftar yang telah diurutkan.
     * 4.3 Menentukan panjang array
     * 4.4 Mengurutkan array berdasarkan nama pendaftar
     */
    public function daftarPendaftar()
    {
        // Mengambil semua data pendaftar beasiswa
        $pendaftar = Beasiswa::all()->toArray();

        // Menentukan panjang array
        $jumlahPendaftar = count($pendaftar);

        // Mengurutkan array berdasarkan kolom 'name' (nama pendaftar)
        usort($pendaftar, function ($a, $b) {
            return strcmp($a['name'], $b['name']);
        });

        // Menampilkan data pendaftar, jumlah pendaftar, dan array yang sudah diurutkan
        return view('beasiswa.pendaftar', compact('pendaftar', 'jumlahPendaftar'));
    }
}
