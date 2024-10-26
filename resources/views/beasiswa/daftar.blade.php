@include('beasiswa.layout')
<div class="container mt-3">
    <h2 class="text-center mb-3">Daftar Beasiswa</h2>
    <div class="card">
        <div class="card-header">
            <h4>Registrasi Beasiswa</h>
        </div>
        <div class="card-body">
            <!-- Menampilkan pesan error -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('beasiswa.daftar') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                <!-- Nama -->
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="name">Masukkan Nama</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                                required placeholder="Nama Lengkap">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-md-9">
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required
                                placeholder="email@example.com">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Nomor HP -->
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="phone">Nomor HP</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required
                                placeholder="089876543212">
                        </div>
                    </div>
                </div>

                <!-- Semester -->
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="semester">Semester</label>
                        </div>
                        <div class="col-md-9">
                            <select name="semester" class="form-select" required>
                                @for ($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>

                <!-- IPK -->
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="ipk">IPK Anda</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{ $ipk }}" disabled>
                        </div>
                    </div>
                </div>

                <!-- Pilihan Beasiswa -->
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="beasiswa_type">Jenis Beasiswa</label>
                        </div>
                        <div class="col-md-9">
                            <select name="beasiswa_type" class="form-select" required>
                                @foreach($beasiswaOptions as $key => $value)
                                    <option value="{{ $key }}" {{ $key == $selectedBeasiswa ? 'selected' : '' }}>{{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Upload Berkas -->
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="file">Upload Berkas (PDF, JPG, ZIP)</label>
                        </div>
                        <div class="col-md-9">
                            <input type="file" name="file" class="form-control" {{ $ipk < 3 ? 'disabled' : '' }}
                                required>
                        </div>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary" {{ $ipk < 3 ? 'disabled' : '' }}>Daftar</button>
                </div>

                <!-- Pesan jika IPK kurang dari 3 -->
                @if ($ipk < 3)
                    <div class="alert alert-danger">
                        IPK Anda kurang dari 3, tidak dapat mendaftar beasiswa. Semua pilihan di bawah ini
                        dinonaktifkan.
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>