@extends('layouts.app')
@section('title', 'Buat Kehadiran')
@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Buat Kehadiran Baru</h1>
    </div>

    <div class="bg-blue-200 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="{{ route('kehadiran.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="rapat_id">
                    Rapat
                </label>
                <select
                    class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('rapat_id') border-red-500 @enderror"
                    id="rapat_id" name="rapat_id" required>
                    <option value="">Pilih Rapat</option>
                    @foreach($rapats as $rapat)
                        <option value="{{ $rapat->id }}" {{ old('rapat_id') == $rapat->id ? 'selected' : '' }}>
                            {{ $rapat->judul }}
                        </option>
                    @endforeach
                </select>
                @error('rapat_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                        Nama
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama') border-red-500 @enderror"
                        id="nama" type="text" name="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div> -->

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                    Nama
                </label>
                <select
                    class="select2-nama bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama') border-red-500 @enderror"
                    id="nama" name="nama" required>
                    <option value="">Pilih Nama</option>
                    @foreach($users as $user)
                        <option value="{{ $user->name }}" {{ old('nama') == $user->name ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('nama')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Simpan
                </button>
                <a href="{{ route('kehadiran.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#nama').select2({
            placeholder: 'Cari nama...',
            allowClear: true
        });
    });
</script>
@endsection