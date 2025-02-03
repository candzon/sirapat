<form action="{{ route('kehadiran.update', $kehadiran->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="bg-blue-100 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="rapat">
                Judul Rapat
            </label>
            <select class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="rapat" name="rapat" required>
                <option value="">Pilih Rapat</option>
                @foreach($rapats as $rapat)
                    <option value="{{ $rapat->id }}" {{ old('rapat', $kehadiran->rapat->id) == $rapat->id ? 'selected' : '' }}>
                        {{ $rapat->judul }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                Nama
            </label>
            <input class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="nama" type="text" name="nama" value="{{ old('nama', $kehadiran->nama) }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal">
                Tanggal
            </label>
            <input class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="tanggal" type="date" name="tanggal" value="{{ old('tanggal', $kehadiran->tanggal->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="keterangan">
                Keterangan
            </label>
            <select class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="keterangan" name="keterangan" required>
                <option value="">Pilih Keterangan</option>
                <option value="belum hadir" {{ old('keterangan', $kehadiran->keterangan) == "belum hadir" ? 'selected' : '' }}>belum hadir</option>
                <option value="hadir" {{ old('keterangan', $kehadiran->keterangan) == "hadir" ? 'selected' : '' }}>hadir</option>
            </select>
        </div>
    </div>

    <div class="bg-blue-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
            Simpan
        </button>
        <button type="button" onclick="closeEditModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Batal
        </button>
    </div>
</form>
