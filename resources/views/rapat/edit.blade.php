<form action="{{ route('rapat.update', $rapat->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">
                Judul Rapat
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="judul" type="text" name="judul" value="{{ old('judul', $rapat->judul) }}" required>
        </div>

        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal">
                    Tanggal
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="tanggal" type="date" name="tanggal" value="{{ old('tanggal', $rapat->tanggal->format('Y-m-d')) }}" required>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="waktu">
                    Waktu
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="waktu" type="time" name="waktu" value="{{ old('waktu', $rapat->waktu) }}" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="tempat">
                Tempat
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="tempat" type="text" name="tempat" value="{{ old('tempat', $rapat->tempat) }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="jenis_rapat_id">
                Jenis Rapat
            </label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="jenis_rapat_id" name="jenis_rapat_id" required>
                <option value="">Pilih Jenis Rapat</option>
                @foreach($jenis_rapats as $jenis)
                    <option value="{{ $jenis->id }}" {{ old('jenis_rapat_id', $rapat->jenis_rapat_id) == $jenis->id ? 'selected' : '' }}>
                        {{ $jenis->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="deskripsi">
                Deskripsi
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $rapat->deskripsi) }}</textarea>
        </div>
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
            Simpan
        </button>
        <button type="button" onclick="closeEditModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Batal
        </button>
    </div>
</form> 