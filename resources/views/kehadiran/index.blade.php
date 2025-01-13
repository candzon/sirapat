@extends('layouts.app')
@section('title', 'Daftar Kehadiran')
@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Kehadiran</h1>
        @if(auth()->user()->role != 'user')
            <a href="{{ route('kehadiran.create') }}" 
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
               Buat Kehadiran Baru
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Rapat</th>
                    <th class="py-3 px-6 text-left">Nama</th>
                    <th class="py-3 px-6 text-left">Tanggal</th>
                    <th class="py-3 px-6 text-left">Keterangan</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse ($kehadirans as $kehadiran)
                    <tr id="kehadiran-{{ $kehadiran->id }}" class="border-b border-gray-200">
                        <td class="py-3 px-6">{{ $kehadiran->Rapat->judul }}</td>
                        <td class="py-3 px-6">{{ $kehadiran->nama }}</td>
                        <td class="py-3 px-6">{{ $kehadiran->tanggal->format('d M Y') }}</td>
                        <td class="py-3 px-6 keterangan">
                            <span class="bg-{{ $kehadiran->keterangan === 'belum hadir' ? 'yellow' : 'green' }}-200 text-{{ $kehadiran->keterangan === 'belum hadir' ? 'yellow' : 'green' }}-800 py-1 px-3 rounded-full text-xs">
                                {{ $kehadiran->keterangan }}
                            </span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <button onclick="openViewModal({{ $kehadiran->id }})" class="bg-green-500 text-white py-1 px-3 rounded mr-2">
                                Lihat
                            </button>
                            @if($kehadiran->keterangan != 'hadir')
                                <button onclick="confirmHadir({{ $kehadiran->id }})" class="bg-yellow-500 text-white py-1 px-3 rounded mr-2">
                                    Hadir
                                </button>
                            @endif
                            @if(auth()->user()->role != 'user')
                                <button onclick="openEditModal({{ $kehadiran->id }})" class="bg-blue-500 text-white py-1 px-3 rounded mr-2">
                                    Edit
                                </button>
                                <button onclick="confirmDelete({{ $kehadiran->id }})" class="bg-red-500 text-white py-1 px-3 rounded">
                                    Hapus
                                </button>
                            @endif
                        </td>
                    </tr>                
                @empty
                    <tr>
                        <td class="py-3 px-6 text-center" colspan="4">Tidak ada data kehadiran</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- View Modal -->
<div id="viewModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Detail Kehadiran</h3>
                <div id="viewModalContent">
                    <!-- Content will be loaded here -->
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" onclick="closeViewModal()"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div id="editModalContent">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div
                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor"></svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg font-medium text-gray-900">Hapus Kehadiran</h3>
                        <p class="text-sm text-gray-500">
                            Apakah Anda yakin ingin menghapus kehadiran ini? Tindakan ini tidak dapat dibatalkan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Hapus
                    </button>
                </form>
                <button type="button" onclick="closeDeleteModal()"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Hadir Confirmation Modal -->
<div id="hadirModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div
                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor"></svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg font-medium text-gray-900">Ubah Kehadiran</h3>
                        <p class="text-sm text-gray-500">
                            Apakah Anda yakin ingin menandai kehadiran ini sebagai hadir?
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <form id="hadirForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" id="keterangan" name="keterangan" value="hadir" hidden>
                    <button type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-600 text-base font-medium text-white hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Ya
                    </button>
                </form>
                <button type="button" onclick="closeHadirModal()"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function openViewModal(id) {
        fetch(`/kehadiran/${id}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('viewModalContent').innerHTML = html;
                document.getElementById('viewModal').classList.remove('hidden');
            });
    }

    function closeViewModal() {
        document.getElementById('viewModal').classList.add('hidden');
    }

    function openEditModal(id) {
        fetch(`/kehadiran/${id}/edit`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('editModalContent').innerHTML = html;
                document.getElementById('editModal').classList.remove('hidden');
            });
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function confirmDelete(id) {
        document.getElementById('deleteForm').action = `/kehadiran/${id}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }
    
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    function closeHadirModal() {
        document.getElementById('hadirModal').classList.add('hidden');
    }

    function confirmHadir(id) {
        document.getElementById('hadirForm').action = `/kehadiran/${id}/hadir`;
        document.getElementById('hadirModal').classList.remove('hidden');
    }
</script>
@endsection
