@extends('layouts.app')
@section('title', 'Buat Rapat')
@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Buat Rapat Baru</h1>
    </div>

    <div class="bg-blue-200 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="{{ route('rapat.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">
                    Judul Rapat
                </label>
                <input
                    class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('judul') border-red-500 @enderror"
                    id="judul" type="text" name="judul" value="{{ old('judul') }}" required>
                @error('judul')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="opd_nama">
                    Pimpinan Rapat
                </label>
                <div class="relative">
                    <select
                        class="select2-opd w-full bg-blue-50 border border-gray-300 text-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm py-2 px-3 @error('opd_nama') border-red-500 @enderror"
                        id="opd_nama" name="pimpinan_rapat" required>
                        <option value="">Pilih Pimpinan Rapat</option>
                        @foreach($opds as $opd)
                            <option value="{{ $opd->kepala }}" {{ old('pimpinan_rapat') == $opd->nama ? 'selected' : '' }}>
                                {{ $opd->kepala }} ({{ $opd->nama }})
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('opd_nama')
                    <p class="mt-1 text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal">
                        Tanggal
                    </label>
                    <input
                        class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tanggal') border-red-500 @enderror"
                        id="tanggal" type="date" name="tanggal" value="{{ old('tanggal') }}" required>
                    @error('tanggal')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="waktu">
                        Waktu
                    </label>
                    <input
                        class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('waktu') border-red-500 @enderror"
                        id="waktu" type="time" name="waktu" value="{{ old('waktu') }}" required>
                    @error('waktu')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tempat">
                    Tempat
                </label>
                <input
                    class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tempat') border-red-500 @enderror"
                    id="tempat" type="text" name="tempat" value="{{ old('tempat') }}" required>
                @error('tempat')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="jenis_rapat_id">
                    Jenis Rapat
                </label>
                <select
                    class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('jenis_rapat_id') border-red-500 @enderror"
                    id="jenis_rapat_id" name="jenis_rapat_id" required>
                    <option value="">Pilih Jenis Rapat</option>
                    @foreach($jenis_rapats as $jenis)
                        <option value="{{ $jenis->id }}" {{ old('jenis_rapat_id') == $jenis->id ? 'selected' : '' }}>
                            {{ $jenis->nama }}
                        </option>
                    @endforeach
                </select>
                @error('jenis_rapat_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="status"></label>
                Status Rapat
                </label>
                <select
                    class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('status') border-red-500 @enderror"
                    id="status" name="status" required>
                    <option value="">Pilih Status Rapat</option>
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="terjadwal" {{ old('status') == 'terjadwal' ? 'selected' : '' }}>Terjadwal</option>
                    <option value="berlangsung" {{ old('status') == 'berlangsung' ? 'selected' : '' }}>Berlangsung
                    </option>
                    <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="dibatalkan" {{ old('status') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="deskripsi">
                    Deskripsi
                </label>
                <textarea
                    class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('deskripsi') border-red-500 @enderror"
                    id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Simpan
                </button>
                <a href="{{ route('rapat.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#opd_nama').select2({
            placeholder: 'Cari pimpinan berdsarkan Nama Kepala & OPD',
            allowClear: true
        });
    });
</script>
@endsection