<div class="bg-transparent shadow">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0">
                    <h1 class="text-xl font-bold text-gray-800"></h1>
                </div>
            </div>
            <div class="flex items-center">
                <span class="text-gray-500">Welcome, {{ Auth::user()->name }}</span>
            </div>
        </div>
    </div>
</div>