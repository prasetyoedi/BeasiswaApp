<!DOCTYPE html>
<html>

<head>
    <title>Pendaftaran Beasiswa</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="row w-100 text-center">
                <!-- Pilihan Beasiswa -->
                <div class="col-4">
                    <a class="nav-link" href="#">
                        Pilihan Beasiswa
                    </a>
                </div>

                <!-- Daftar -->
                <div class="col-4">
                    <a class="nav-link active"
                        style="background-color: #95bcf2; padding: 10px; border-radius: 5px; color: white;" href="#">
                        Daftar
                    </a>
                </div>

                <!-- Hasil -->
                <div class="col-4">
                    <a class="nav-link" href="">
                        Hasil
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>