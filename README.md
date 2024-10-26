# BeasiswaApp

Proyek ini adalah aplikasi berbasis Laravel untuk mengelola pendaftaran beasiswa secara online di sebuah kampus. Aplikasi ini menggunakan Bootstrap untuk desain front-end yang responsif, memungkinkan pengguna melihat daftar beasiswa, melakukan pendaftaran dengan mengisi detail dan mengunggah dokumen, serta menerima konfirmasi status aplikasi.

## Struktur Folder

Struktur proyek ini disusun menggunakan pola Model-View-Controller (MVC) Laravel untuk memisahkan logika aplikasi, presentasi, dan manajemen data.

```
beasiswa-app/ // Root dari proyek
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── BeasiswaController.php
│   ├── Models/
│   │   └── Beasiswa.php
├── database/
│   ├── migrations/
│   │   └── 2023_10_26_create_beasiswas_table.php
├── public/
│   ├── css/
│   │   └── bootstrap.min.css
│   ├── js/
│   │   └── bootstrap.bundle.min.js
├── resources/
│   ├── views/
│   │   ├── beasiswa/
│   │      ├── index.blade.php
│   │      ├── daftar.blade.php
│   │      └── hasil.blade.php
│   │      └── layout.blade.php
├── routes/
│   └── web.php
└── .env
```

## Deskripsi Folder dan File

### app/Http/Controllers/

**BeasiswaController.php**: Berisi logika utama untuk menangani pendaftaran beasiswa. Metode yang ada di dalamnya termasuk:

-   **index**: Menampilkan daftar beasiswa yang tersedia.
-   **create**: Menampilkan form pendaftaran.
-   **daftar**: Memproses pengajuan form dengan validasi.
-   **hasil**: Menampilkan hasil pendaftaran.

### app/Models/

**Beasiswa.php**: Model yang mewakili tabel `beasiswas` di database, mendefinisikan field seperti `name`, `email`, `phone`, `semester`, `file`, dan `status_ajuan` yang akan berinteraksi dengan database melalui Eloquent ORM Laravel.

### database/migrations/

**2023_10_26_create_beasiswas_table.php**: Mengatur struktur tabel `beasiswas` dalam database, termasuk field untuk menyimpan informasi pendaftar dan jalur file yang diunggah.

### public/css/ dan public/js/

**bootstrap.min.css** dan **bootstrap.bundle.min.js**: File Bootstrap yang menyediakan CSS dan JavaScript yang dibutuhkan untuk antarmuka aplikasi.

### resources/views/

**beasiswa/**: Folder ini berisi halaman tampilan (view) untuk bagian beasiswa, termasuk:

-   **index.blade.php**: Menampilkan pilihan beasiswa yang tersedia.
-   **daftar.blade.php**: Form pendaftaran beasiswa.
-   **hasil.blade.php**: Halaman hasil setelah pendaftaran sukses.

**layouts/app.blade.php**: Template utama untuk aplikasi, digunakan sebagai layout dasar yang berisi header, footer, dan import CSS/JavaScript.

### routes/

**web.php**: Berisi pengaturan rute untuk mengarahkan permintaan HTTP ke metode controller terkait, sesuai dengan URL yang diakses pengguna.

### .env

File ini berisi konfigurasi lingkungan aplikasi seperti database, email, dan pengaturan lainnya.

## Sumber Daya Pemrograman

-   **Laravel**: Framework PHP yang digunakan untuk mengembangkan backend.
-   **Bootstrap**: Framework CSS untuk desain antarmuka yang responsif dan user-friendly.
