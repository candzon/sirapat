@extends('layouts.app')
@section('title', 'Edit Notulensi')
@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Edit Notulensi</h1>
    </div>

    <div class="bg-blue-200 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="{{ route('notulensi.update', $notulen->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="bg-blue-100 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="rapat">
                        Rapat
                    </label>
                    <select
                        class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="rapat" name="rapat_id" required>
                        <option value="">Pilih Rapat</option>
                        @foreach($rapats as $rapat)
                            <option value="{{ $rapat->id }}" {{ old('rapat', $notulen->rapat->id) == $rapat->id ? 'selected' : '' }}>
                                {{ $rapat->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="admin"></label>
                    Admin PJ
                    </label>
                    <select
                        class="bg-blue-50 shadow appearance-dnone border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="admin_pj" name="admin_pj" required>
                        <option value="">Pilih Admin</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('admin', $notulen->admin_pj) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="isi">
                        Isi
                    </label>
                    <textarea
                        class="tinymce-editor isi bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="isi" name="isi" rows="4">{{ old('isi', $notulen->isi) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                        Status
                    </label>
                    <select
                        class="bg-blue-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="status" name="status" required>
                        <option value="">Pilih Status</option>
                        <option value="draft" {{ old('status', $notulen->status) == "draft" ? 'selected' : '' }}>draft
                        </option>
                        <option value="selesai" {{ old('status', $notulen->status) == "selesai" ? 'selected' : '' }}>
                            selesai
                        </option>
                    </select>
                </div>
            </div>

            <div class="bg-blue-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Simpan
                </button>
                <a href="{{ route('notulensi.index') }}"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Kembali
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
