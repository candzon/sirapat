@extends('layouts.app')
@section('title', 'Daftar OPD')
@section('content')
<div class="container mx-auto px-4">
    <div class="flex space-x-2 mb-4">
        <a class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-gray-300 text-center" aria-current="page"
            href="javascript:void(0);" onclick="showTab('daftar-opd')">
            Daftar Kepala OPD
        </a>
        <a class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-gray-300 text-center" href="javascript:void(0);"
            onclick="showTab('verifikasi-opd')">
            Verifikasi User
        </a>
    </div>

    <div id="daftar-opd" class="tab-content hidden">
        @include('opd.daftar')
    </div>

    <div id="verifikasi-opd" class="tab-content hidden">
        @include('opd.verifikasi')
    </div>

</div>

<script>
    // Initialize first tab on page load
    document.addEventListener('DOMContentLoaded', function() {
        showTab('daftar-opd');
    });

    function showTab(tabId) {
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.add('hidden');
        });
        
        // Remove active state from all tabs
        document.querySelectorAll('[onclick^="showTab"]').forEach(tab => {
            tab.classList.remove('bg-blue-500', 'text-white');
            tab.classList.add('bg-gray-200', 'text-gray-700');
        });
        
        // Show selected tab content
        document.getElementById(tabId).classList.remove('hidden');
        
        // Set active state for selected tab
        document.querySelector(`[onclick="showTab('${tabId}')"]`).classList.remove('bg-gray-200', 'text-gray-700');
        document.querySelector(`[onclick="showTab('${tabId}')"]`).classList.add('bg-blue-500', 'text-white');
    }

    function openViewModal(id) {
        fetch(`/manajemen-opd/${id}`)
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
        fetch(`/manajemen-opd/${id}/edit`)
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
        document.getElementById('deleteForm').action = `/manajemen-opd/${id}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>

{{-- <!-- View Modal -->
<div x-data="{ showViewModal: false, currentOpd: null }"
    @open-view-modal.window="showViewModal = true; currentOpd = $event.detail">
    <div x-show="showViewModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium" x-text="currentOpd?.nama"></h3>
                <button @click="showViewModal = false" class="text-gray-400 hover:text-gray-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-2">
                <p class="text-sm text-gray-500 mb-2">Kepala: <span x-text="currentOpd?.kepala"></span></p>
                <p class="text-sm text-gray-500 mb-2">Email: <span x-text="currentOpd?.email"></span></p>
                <p class="text-sm text-gray-500 mb-2">Telepon: <span x-text="currentOpd?.telepon"></span></p>
                <p class="text-sm text-gray-500 mb-2">Alamat: <span x-text="currentOpd?.alamat"></span></p>
                <p class="text-sm text-gray-500 mb-2">Status: <span
                        x-text="currentOpd?.is_active ? 'Aktif' : 'Tidak Aktif'"></span></p>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div x-data="{ showEditModal: false, editOpd: null }"
    @open-edit-modal.window="showEditModal = true; editOpd = $event.detail">
    <div x-show="showEditModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium">Edit OPD</h3>
                <button @click="showEditModal = false" class="text-gray-400 hover:text-gray-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form :action="`/manajemen-opd/${editOpd?.id}`" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_nama">Nama OPD</label>
                    <input type="text" name="nama" id="edit_nama" x-model="editOpd?.nama"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_kepala">Kepala</label>
                    <input type="text" name="kepala" id="edit_kepala" x-model="editOpd?.kepala"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_email">Email</label>
                    <input type="email" name="email" id="edit_email" x-model="editOpd?.email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_telepon">Telepon</label>
                    <input type="text" name="telepon" id="edit_telepon" x-model="editOpd?.telepon"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_alamat">Alamat</label>
                    <textarea name="alamat" id="edit_alamat" rows="3" x-model="editOpd?.alamat"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_is_active">Status</label>
                    <select name="is_active" id="edit_is_active" x-model="editOpd?.is_active"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" @click="showEditModal = false"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Batal
                    </button>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
</div>

@push('scripts')
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
@endsection