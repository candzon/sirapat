<div class="space-y-4">
    <div>
        <h4 class="text-sm font-bold text-gray-500">Judul Rapat</h4>
        <p class="text-gray-900">{{ $rapat->judul }}</p>
    </div>

    <div>
        <h4 class="text-sm font-bold text-gray-500">Pimpinan Rapat</h4>
        <p class="text-gray-900">{{ $rapat->pimpinan_rapat }}</p>
    </div>
    
    <div class="grid grid-cols-2 gap-4">
        <div>
            <h4 class="text-sm font-bold text-gray-500">Tanggal</h4>
            <p class="text-gray-900">{{ $rapat->tanggal->format('d/m/Y') }}</p>
        </div>
        <div>
            <h4 class="text-sm font-bold text-gray-500">Waktu</h4>
            <p class="text-gray-900">{{ $rapat->waktu }}</p>
        </div>
    </div>

    <div>
        <h4 class="text-sm font-bold text-gray-500">Tempat</h4>
        <p class="text-gray-900">{{ $rapat->tempat }}</p>
    </div>

    <div>
        <h4 class="text-sm font-bold text-gray-500">Jenis Rapat</h4>
        <p class="text-gray-900">{{ $rapat->jenisRapat->nama }}</p>
    </div>

    <div>
        <h4 class="text-sm font-bold text-gray-500">Deskripsi</h4>
        <p class="text-gray-900">{{ $rapat->deskripsi ?? '-' }}</p>
    </div>

    <div>
        <h4 class="text-sm font-bold text-gray-500">Status</h4>
        <p class="text-gray-900">{{ ucfirst($rapat->status) }}</p>
    </div>
</div> 