<header x-data="{ sidebar: false }" class="w-full bg-blue-600 p-4 xl:hidden">
    <div class="flex items-center justify-between">
        <a href="index.html"
            class="text-white text-2xl font-estedad-bold uppercase hover:text-gray-300">{{ config('app.name') }}</a>
        <button @click="sidebar = !sidebar" class="text-white text-3xl focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </div>

    <div x-show="sidebar" class="fixed top-0 right-0 min-w-80 shadow h-full">
        @include('layouts.sidebar')
    </div>
</header>
