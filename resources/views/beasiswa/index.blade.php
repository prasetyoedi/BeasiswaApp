@include('beasiswa.layout')
<div class="container mt-5">
    <h1 class="text-center mb-4">Pilihan Beasiswa</h1>

    <div class="row">
        @foreach ($beasiswaOptions as $jenis => $syarat)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        {{ $jenis }}
                    </div>
                    <div class="card-body">
                        <p><strong>Syarat Beasiswa:</strong> {{ $syarat }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>