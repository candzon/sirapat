@extends('layouts.app')
@section('title', 'Buat Undangan')
@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Buat Undangan</h1>
    </div>

    <div class="bg-blue-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="{{ route('undangan.store') }}" method="POST">
            @csrf
            <input type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}" hidden>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="rapat_id">
                    Rapat
                </label>
                <select name="rapat_id" id="rapat_id"
                    class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Pilih Rapat</option>
                    @foreach($rapats as $rapat)
                        <option value="{{ $rapat->id }}">{{ $rapat->judul }}</option>
                    @endforeach
                </select>
                @error('rapat_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">
                    Judul Undangan
                </label>
                <input type="text" name="judul" id="judul"
                    class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ old('judul') }}">
                @error('judul')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="isi">
                    Isi Undangan
                </label>
                <textarea name="isi" id="isi" rows="10"
                    class="tinymce-editor bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('isi') }}</textarea>
                @error('isi')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="template">
                    Template
                </label>
                <select name="template" id="template"
                    class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="default">Default</option>
                    <option value="formal">Formal</option>
                    <option value="casual">Casual</option>
                </select>
                @error('template')
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
                    <option value="terkirim">Terkirim</option>
                    <option value="dibatalkan">Dibatalkan</option>
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
                <a href="{{ route('undangan.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection