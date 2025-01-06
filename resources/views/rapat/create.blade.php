@extends('layouts.app')
@section('title', 'Buat Rapat')
@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Buat Rapat Baru</h1>
        </div>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="{{ route('rapat.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">
                        Judul Rapat
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('judul') border-red-500 @enderror"
                        id="judul" type="text" name="judul" value="{{ old('judul') }}" required>
                    @error('judul')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal">
                            Tanggal
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tanggal') border-red-500 @enderror"
                            id="tanggal" type="date" name="tanggal" value="{{ old('tanggal') }}" required>
                        @error('tanggal')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="waktu">
                            Waktu
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('waktu') border-red-500 @enderror"
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
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tempat') border-red-500 @enderror"
                        id="tempat" type="text" name="tempat" value="{{ old('tempat') }}" required>
                    @error('tempat')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="jenis_rapat_id">
                        Jenis Rapat
                    </label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('jenis_rapat_id') border-red-500 @enderror"
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
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="deskripsi">
                        Deskripsi
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('deskripsi') border-red-500 @enderror"
                        id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Simpan
                    </button>
                    <a href="{{ route('rapat.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection 