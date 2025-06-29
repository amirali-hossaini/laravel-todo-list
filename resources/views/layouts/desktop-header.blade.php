<header class="w-full items-center bg-white py-2 border-b border-secondary-gray px-6 hidden xl:flex">
    <div class="w-1/2"></div>
    <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
        <button @click="isOpen = !isOpen"
            class="realtive z-10 size-12 rounded-full overflow-hidden border border-secondary-gray">
            <img src="{{ auth()->user()->avatar() }}">
        </button>
        <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
        <div x-show="isOpen" class="absolute text-center bg-white rounded-lg shadow-lg p-3 mt-16">
            <a href="#"
                class="block px-4 text-nowrap py-2 bg-primary-gray rounded-lg hover:text-blue-600 transition-all duration-300">پروفایل</a>
            <a href="#"
                class="block px-4 text-nowrap py-2 bg-primary-gray rounded-lg my-2 hover:text-blue-600 transition-all duration-300">تنظیمات</a>
            <button onclick="document.getElementById('logout').submit()"
                class="block px-4 text-nowrap py-2 bg-primary-gray rounded-lg hover:cursor-pointer text-red-400 hover:text-red-600 transition-all duration-300">خروج
                از حساب</button>
        </div>
    </div>
</header>

<form action="{{ route('logout') }}" class="hidden" method="POST" id="logout">

    @csrf

</form>
