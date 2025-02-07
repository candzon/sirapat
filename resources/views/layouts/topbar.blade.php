<div class="bg-blue-200">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0">
                    <h1 class="text-xl font-bold text-blue-800"></h1>
                </div>
            </div>
            <div class="flex items-center">
                <span class="font-bold text-blue-500">
                    @if(Auth::user()->role == 'opd')
                        Welcome, Kepala: {{ Auth::user()->name }}
                    @else
                        Welcome, {{ Auth::user()->name }}
                    @endif
                </span>
            </div>
        </div>
    </div>
</div>