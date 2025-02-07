@extends('layouts.app')
@section('title', 'Buat Notulensi')
@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Buat Notulensi</h1>
    </div>

    <div class="bg-blue-200 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="{{ route('notulensi.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="rapat_id">
                    Rapat
                </label>
                <select name="rapat_id" id="rapat_id"
                    class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Pilih Rapat</option>
                    @foreach($rapats as $rapat)
                        <option value="{{ $rapat->id }}">{{ $rapat->judul }} </option>
                    @endforeach
                </select>
                @error('rapat_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="admin_id">
                    Admin Penanggung Jawab
                </label>
                <select name="admin_pj" id="admin_pj"
                    class="nama bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Pilih Admin</option>
                    @foreach($admin_pj as $admin)
                        <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                    @endforeach
                </select>
                @error('admin_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="isi">
                    Isi Notulensi
                </label>
                <textarea name="isi" id="isi" rows="10"
                    class="tinymce-editor isi bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                @error('isi')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                    Status
                </label>
                <select name="status" id="status"
                    class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="draft">Draft</option>
                    <option value="selesai">Selesai</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Simpan
                </button>
                <a href="{{ route('notulensi.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.nama').select2({
            placeholder: 'Cari nama...',
            allowClear: true
        });
    });
</script>
@endsection