@include('beasiswa.layout')

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
                <td><a href="{{ Storage::url($beasiswa->file) }}" target="_blank" class="btn btn-link">Lihat Berkas</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>