<!DOCTYPE html>
<html>

<head>
    <title>Pendaftaran Beasiswa</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<style>
    .nav-link-active {
        color: black !important;
        background-color: #94bbf2;
        border-radius: 5px;
        display: block;
        padding: 10px;
        text-decoration: none;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="row w-100 text-center">
                <!-- Pilihan Beasiswa -->
                <div class="col-4">
                    <a class="nav-link" href="{{ route('beasiswa.index') }}">
                        Pilihan Beasiswa
                    </a>
                </div>

                <!-- Daftar -->
                <div class="col-4">
                    <a class="nav-link" href="{{ route('beasiswa.create') }}">
                        Daftar
                    </a>
                </div>

                <!-- Hasil -->
                <div class="col-4">
                    <a class="nav-link-active">
                        Hasil
                    </a>
                </div>
            </div>
        </div>
    </nav>


    <div class="container mt-4">
        <h1 class="mb-4">Hasil Pendaftaran</h1>
        <table class="table table-bordered table-striped table-responsive-sm">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nama</td>
                    <td>{{ $beasiswa->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $beasiswa->email }}</td>
                </tr>
                <tr>
                    <td>Nomor HP</td>
                    <td>{{ $beasiswa->phone }}</td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>{{ $beasiswa->semester }}</td>
                </tr>
                <tr>
                    <td>Status Ajuan</td>
                    <td>{{ $beasiswa->status_ajuan }}</td>
                </tr>
                <tr>
                    <td>Berkas</td>
                    <td><a href="{{ Storage::url($beasiswa->file) }}" target="_blank" class="btn btn-link">Lihat
                            Berkas</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>