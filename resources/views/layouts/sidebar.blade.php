<aside class="w-64 h-screen bg-gray-800 text-white transition-all duration-200">
    <div class="p-4">
        <h1 class="text-2xl font-bold">SiRapat</h1>
    </div>
    
    <nav class="mt-4">
        <a href="{{ route('dashboard') }}" 
           class="flex items-center px-4 py-2 hover:bg-gray-700 transition-colors duration-150 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Dashboard
        </a>

        <!-- Manajemen Kehadiran Sidebar -->
        @if(auth()->user()->role !== 'notulis') <!-- Admin & User -->
        <div x-data="{ open: {{ request()->routeIs('kehadiran.*') ? 'true' : 'false' }} }" class="mt-4">
            <button @click="open = !open" 
                    class="w-full px-4 py-2 flex items-center justify-between hover:bg-gray-700 transition-colors duration-150">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-semibold">Kehadiran</span>
                </div>
                <svg class="w-4 h-4 transform transition-transform duration-150" 
                     :class="{'rotate-180': open}"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="transform opacity-0 -translate-y-2"
                 x-transition:enter-end="transform opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="transform opacity-100 translate-y-0"
                 x-transition:leave-end="transform opacity-0 -translate-y-2"
                 class="space-y-1">
                <a href="{{ route('kehadiran.index') }}" 
                   class="flex items-center px-8 py-2 hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('kehadiran.index') ? 'bg-gray-700' : '' }}">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    Daftar Hadir
                </a>
                @if(auth()->user()->role !== 'user') <!-- Admin Only -->
                <a href="{{ route('kehadiran.create') }}" 
                   class="flex items-center px-8 py-2 hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('kehadiran.create') ? 'bg-gray-700' : '' }}">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Hadir
                </a>
                @endif
            </div>
        </div>
        @endif

        @if(auth()->user()->role !== 'notulis' && auth()->user()->role !== 'user')
        <!-- Manajemen Rapat Sidebar -->
        <div x-data="{ open: {{ request()->routeIs('rapat.*') ? 'true' : 'false' }} }" class="mt-4">
            <button @click="open = !open" 
                    class="w-full px-4 py-2 flex items-center justify-between hover:bg-gray-700 transition-colors duration-150">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="font-semibold">Manajemen Rapat</span>
                </div>
                <svg class="w-4 h-4 transform transition-transform duration-150" 
                     :class="{'rotate-180': open}"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="transform opacity-0 -translate-y-2"
                 x-transition:enter-end="transform opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="transform opacity-100 translate-y-0"
                 x-transition:leave-end="transform opacity-0 -translate-y-2"
                 class="space-y-1">
                <a href="{{ route('rapat.index') }}" 
                   class="flex items-center px-8 py-2 hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('rapat.index') ? 'bg-gray-700' : '' }}">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    Daftar Rapat
                </a>
                <a href="{{ route('rapat.create') }}" 
                   class="flex items-center px-8 py-2 hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('rapat.create') ? 'bg-gray-700' : '' }}">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Buat Rapat
                </a>
                <a href="{{ route('rapat.jenis') }}" 
                   class="flex items-center px-8 py-2 hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('rapat.jenis') ? 'bg-gray-700' : '' }}">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    Jenis Rapat
                </a>
            </div>
        </div>
        @endif

        <!-- Manajemen Notulensi Sidebar -->
        <div x-data="{ open: {{ request()->routeIs('notulensi.*') ? 'true' : 'false' }} }" class="mt-4">
            <button @click="open = !open" 
                    class="w-full px-4 py-2 flex items-center justify-between hover:bg-gray-700 transition-colors duration-150">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span class="font-semibold">Notulensi</span>
                </div>
                <svg class="w-4 h-4 transform transition-transform duration-150" 
                     :class="{'rotate-180': open}"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="transform opacity-0 -translate-y-2"
                 x-transition:enter-end="transform opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="transform opacity-100 translate-y-0"
                 x-transition:leave-end="transform opacity-0 -translate-y-2"
                 class="space-y-1">
                <a href="{{ route('notulensi.index') }}" 
                   class="flex items-center px-8 py-2 hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('notulensi.index') ? 'bg-gray-700' : '' }}">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    Daftar Notulensi
                </a>
                @if(auth()->user()->role !== 'user') <!-- Admin & Notulis -->
                <a href="{{ route('notulensi.create') }}" 
                   class="flex items-center px-8 py-2 hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('notulensi.create') ? 'bg-gray-700' : '' }}">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Buat Notulensi
                </a>
                 @endif
            </div>
        </div>

        @if(auth()->user()->role !== 'notulis' && auth()->user()->role !== 'user')
         <!-- Manajemen Undangan Sidebar -->
        <div x-data="{ open: {{ request()->routeIs('undangan.*') ? 'true' : 'false' }} }" class="mt-4">
            <button @click="open = !open" 
                    class="w-full px-4 py-2 flex items-center justify-between hover:bg-gray-700 transition-colors duration-150">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="font-semibold">Undangan</span>
                </div>
                <svg class="w-4 h-4 transform transition-transform duration-150" 
                     :class="{'rotate-180': open}"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="transform opacity-0 -translate-y-2"
                 x-transition:enter-end="transform opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="transform opacity-100 translate-y-0"
                 x-transition:leave-end="transform opacity-0 -translate-y-2"
                 class="space-y-1">
                <a href="{{ route('undangan.index') }}" 
                   class="flex items-center px-8 py-2 hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('undangan.index') ? 'bg-gray-700' : '' }}">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    Daftar Undangan
                </a>
                <a href="{{ route('undangan.create') }}" 
                   class="flex items-center px-8 py-2 hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('undangan.create') ? 'bg-gray-700' : '' }}">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Buat Undangan
                </a>
            </div>
        </div>

        <!-- Manajemen OPD Sidebar -->
        <div x-data="{ open: {{ request()->routeIs('opd.*') ? 'true' : 'false' }} }" class="mt-4">
            <button @click="open = !open" 
                    class="w-full px-4 py-2 flex items-center justify-between hover:bg-gray-700 transition-colors duration-150">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span class="font-semibold">Manajemen OPD</span>
                </div>
                <svg class="w-4 h-4 transform transition-transform duration-150" 
                     :class="{'rotate-180': open}"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="transform opacity-0 -translate-y-2"
                 x-transition:enter-end="transform opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="transform opacity-100 translate-y-0"
                 x-transition:leave-end="transform opacity-0 -translate-y-2"
                 class="space-y-1">
                <a href="{{ route('opd.index') }}" 
                   class="flex items-center px-8 py-2 hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('opd.index') ? 'bg-gray-700' : '' }}">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    Daftar OPD
                </a>
                <a href="{{ route('opd.create') }}" 
                   class="flex items-center px-8 py-2 hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('opd.create') ? 'bg-gray-700' : '' }}">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah OPD
                </a>
            </div>
        </div>
        @endif

        <!-- Logout Sidebar -->
        <form method="POST" action="{{ route('logout') }}" class="mt-8">
            @csrf
            <button type="submit" 
                    class="w-full flex items-center px-4 py-2 hover:bg-gray-700 transition-colors duration-150 text-left">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Logout
            </button>
        </form>
    </nav>
</aside>

@push('scripts')
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush 