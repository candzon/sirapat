<div class="space-y-4">
    <div>
        <h4 class="text-sm font-bold text-gray-500">Nama OPD</h4>
        <p class="text-gray-900">{{ $opd->nama }}</p>
    </div>

    <div>
        <h4 class="text-sm font-bold text-gray-500">Kepala</h4>
        <p class="text-gray-900">{{ $opd->kepala }}</p>
    </div>

    <div>
        <h4 class="text-sm font-bold text-gray-500">Email</h4>
        <p class="text-gray-900">{{ $opd->email }}</p>
    </div>

    <div>
        <h4 class="text-sm font-bold text-gray-500">Telepon</h4>
        <p class="text-gray-900">{{ $opd->telepon }}</p>
    </div>

    <div>
        <h4 class="text-sm font-bold text-gray-500">Alamat</h4>
        <p class="text-gray-900">{{ $opd->alamat ?? '-' }}</p>
    </div>

    <div>
        <h4 class="text-sm font-bold text-gray-500">Status</h4>
        <p class="text-gray-900">{{ $opd->is_active ? 'Aktif' : 'Tidak Aktif' }}</p>
    </div>
</div> 