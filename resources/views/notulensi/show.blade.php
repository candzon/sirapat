<div class="space-y-4">
    <div>
        <h4 class="text-sm font-bold text-gray-500">Judul Rapat</h4>
        <p class="text-gray-900">{{ $notulen->rapat->judul }}</p>
    </div>
    
    <div>
        <h4 class="text-sm font-bold text-gray-500">Notulis</h4>
        <p class="text-gray-900">{{ $notulen->notulis->name }}</p>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <h4 class="text-sm font-bold text-gray-500">Tanggal</h4>
            <p class="text-gray-900">{{ $notulen->created_at->format('d/m/Y H:i') }}</p>
        </div>
        <div>
            <h4 class="text-sm font-bold text-gray-500">Status</h4>
            <p class="text-gray-900">{{ ucfirst($notulen->status) }}</p>
        </div>
    </div>

    <div>
        <h4 class="text-sm font-bold text-gray-500">Isi</h4>
        <p class="text-gray-900">{{ $notulen->isi ?? '-' }}</p>
    </div>
</div> 