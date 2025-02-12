<div class="space-y-4">
    <div>
        <h4 class="text-sm font-bold text-gray-500">Judul Rapat</h4>
        <p class="text-gray-900">{{ $kehadiran->Rapat->judul }}</p>
    </div>
    
    <div>
        <h4 class="text-sm font-bold text-gray-500">Nama</h4>
        <p class="text-gray-900">{{ $kehadiran->user->name }}</p>
    </div>
    
    <div>
        <h4 class="text-sm font-bold text-gray-500">Tanggal</h4>
        <p class="text-gray-900">{{ $kehadiran->tanggal->format('d/m/Y') }}</p>
    </div>

    <div>
        <h4 class="text-sm font-bold text-gray-500">Keterangan</h4>
        <p class="text-gray-900">{{ ucfirst($kehadiran->keterangan) }}</p>
    </div>
</div> 