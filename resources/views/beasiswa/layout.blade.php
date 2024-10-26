<!DOCTYPE html>
<html>

<head>
    <title>Pendaftaran Beasiswa</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<style>
    .nav-link.active {
        color: black !important;
        background-color: #94bbf2;
        border-radius: 5px;
        padding: 7px;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="row w-100 text-center">
                <!-- Pilihan Beasiswa -->
                <div class="col-4">
                    <a class="nav-link {{ Request::routeIs('beasiswa.index') ? 'active' : '' }}"
                        href="{{ route('beasiswa.index') }}">
                        Pilihan Beasiswa
                    </a>
                </div>

                <!-- Daftar -->
                <div class="col-4">
                    <a class="nav-link {{ Request::routeIs('beasiswa.create') ? 'active' : '' }}"
                        href="{{ route('beasiswa.create') }}">
                        Daftar
                    </a>
                </div>

                <!-- Hasil -->
                <div class="col-4">
                    <a class="nav-link">
                        Hasil
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>