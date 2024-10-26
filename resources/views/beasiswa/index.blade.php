@include('beasiswa.layout')
<div class="container mt-5">
    <h1 class="text-center mb-4">Pilihan Beasiswa</h1>
    <div class="row">
        @foreach ($beasiswaOptions as $jenis => $syarat)
            <div class="col-md-6 mb-4">
                <a href="{{ route('beasiswa.create', ['beasiswa_type' => $jenis]) }}" style="text-decoration: none; color: inherit;">
                    <div class="card h-100">
                        <div class="card-header bg-primary text-white">
                            {{ $jenis }}
                        </div>
                        <div class="card-body">
                            <p><strong>Syarat Beasiswa:</strong> {{ $syarat }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
