@extends('layouts.app')
@section('title', 'Daftar Undangan')
@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Daftar Undangan</h1>
            <a href="{{ route('undangan.create') }}" 
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Buat Undangan
            </a>
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
                        <th class="py-3 px-6 text-left">Judul</th>
                        <th class="py-3 px-6 text-left">Rapat</th>
                        <th class="py-3 px-6 text-left">Template</th>
                        <th class="py-3 px-6 text-left">Status</th>
                        <th class="py-3 px-6 text-left">Tanggal</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($undangans as $undangan)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">{{ $undangan->judul }}</td>
                            <td class="py-3 px-6 text-left">{{ $undangan->rapat->judul }}</td>
                            <td class="py-3 px-6 text-left">{{ $undangan->template }}</td>
                            <td class="py-3 px-6 text-left">
                                <span class="bg-{{ $undangan->status === 'terkirim' ? 'green' : ($undangan->status === 'draft' ? 'yellow' : 'red') }}-200 
                                           text-{{ $undangan->status === 'terkirim' ? 'green' : ($undangan->status === 'draft' ? 'yellow' : 'red') }}-600 
                                           py-1 px-3 rounded-full text-xs">
                                    {{ ucfirst($undangan->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                {{ $undangan->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <button @click="$dispatch('open-view-modal', {{ $undangan }})" 
                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                    <button @click="$dispatch('open-edit-modal', {{ $undangan }})" 
                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                    <form action="{{ route('undangan.destroy', $undangan) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus undangan ini?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- View Modal -->
        <div x-data="{ showViewModal: false, currentUndangan: null }"
             @open-view-modal.window="showViewModal = true; currentUndangan = $event.detail">
            <div x-show="showViewModal" 
                 class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0">
                <div class="relative top-20 mx-auto p-5 border w-4/5 md:w-2/3 lg:w-1/2 shadow-lg rounded-md bg-white">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium" x-text="currentUndangan?.judul"></h3>
                        <button @click="showViewModal = false" class="text-gray-400 hover:text-gray-600">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500 mb-2">Rapat: <span x-text="currentUndangan?.rapat.judul"></span></p>
                        <p class="text-sm text-gray-500 mb-2">Template: <span x-text="currentUndangan?.template"></span></p>
                        <p class="text-sm text-gray-500 mb-4">Status: <span x-text="currentUndangan?.status"></span></p>
                        <div class="border rounded p-4 bg-gray-50">
                            <p x-text="currentUndangan?.isi"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div x-data="{ showEditModal: false, editUndangan: null }"
             @open-edit-modal.window="showEditModal = true; editUndangan = $event.detail">
            <div x-show="showEditModal" 
                 class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0">
                <div class="relative top-20 mx-auto p-5 border w-4/5 md:w-2/3 lg:w-1/2 shadow-lg rounded-md bg-white">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium">Edit Undangan</h3>
                        <button @click="showEditModal = false" class="text-gray-400 hover:text-gray-600">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form :action="`/undangan/${editUndangan?.id}`" method="POST" class="mt-2">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_judul">Judul</label>
                            <input type="text" name="judul" id="edit_judul" 
                                   x-model="editUndangan?.judul"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_isi">Isi</label>
                            <textarea name="isi" id="edit_isi" rows="6"
                                      x-model="editUndangan?.isi"
                                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_status">Status</label>
                            <select name="status" id="edit_status"
                                    x-model="editUndangan?.status"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="draft">Draft</option>
                                <option value="terkirim">Terkirim</option>
                                <option value="dibatalkan">Dibatalkan</option>
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
        </div>
    </div>

    @push('scripts')
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endpush
@endsection 