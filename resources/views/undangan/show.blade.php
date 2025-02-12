<div class="space-y-4">
    <div>
        <h4 class="text-sm font-bold text-gray-500">Untuk </h4>
        <p class="text-gray-900">
            @foreach($untuk as $user)
                {{ $user->name }} {{"($user->nama_opd)"}}@if(!$loop->last), @endif
            @endforeach
        </p>
    </div>
    <div>
        <h4 class="text-sm font-bold text-gray-500">Judul</h4>
        <p class="text-gray-900">{{ $undangan->judul }}</p>
    </div>

    <div>
        <h4 class="text-sm font-bold text-gray-500">Rapat</h4>
        <p class="text-gray-900">{{ $undangan->rapat->judul }}</p>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <h4 class="text-sm font-bold text-gray-500">Tanggal</h4>
            <p class="text-gray-900">{{ $undangan->created_at->format('d/m/Y') }}</p>
        </div>
        <div>
            <h4 class="text-sm font-bold text-gray-500">Status</h4>
            <p class="text-gray-900">{{ ucfirst($undangan->status) }}</p>
        </div>
    </div>

    <div>
        <h4 class="text-sm font-bold text-gray-500">Template</h4>
        <p class="text-gray-900">{{ $undangan->template }}</p>
    </div>

    <div>
        <h4 class="text-sm font-bold text-gray-500">Isi</h4>
        <p class="text-gray-900">{{ str_replace('&nbsp;', ' ', strip_tags($undangan->isi)) ?? '-' }}</p>
    </div>
</div>