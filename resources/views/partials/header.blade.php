<!-- resources/views/partials/header.blade.php -->
<header class="bg-white shadow-md py-4 fixed top-0 w-full z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6">
    <a href="/" class="text-2xl font-bold" style="color: #b85b18;">SeoulHairArt</a>
        <nav class="hidden md:flex space-x-6">
            <a href="/" class="text-gray-600 hover:text-gray-900">Home</a>
            <a href="/newDesign" class="text-gray-600 hover:text-gray-900">NewDesign</a>
            <a href="/short" class="text-gray-600 hover:text-gray-900">Short</a>
            <a href="/color" class="text-gray-600 hover:text-gray-900">Color</a>
            <a href="/reservation" class="text-gray-600 hover:text-gray-900">Reservation</a>
        </nav>

        <!-- 모바일 햄버거 메뉴 -->
        <div x-data="{ open: false }" class="md:hidden">
            <button @click="open = !open" class="text-gray-600 hover:text-gray-900">
                <!-- 햄버거 아이콘 -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

            <!-- 모바일 메뉴 -->
            <div x-show="open" class="absolute top-16 left-0 w-full bg-white shadow-lg">
                <ul class="flex flex-col space-y-4 py-4 text-center">
                    <li><a href="/" class="text-gray-600 hover:text-gray-900">Home</a></li>
                    <li><a href="/newDesign" class="text-gray-600 hover:text-gray-900">NewDesign</a></li>
                    <li><a href="/short" class="text-gray-600 hover:text-gray-900">Short</a></li>
                    <li><a href="/color" class="text-gray-600 hover:text-gray-900">Color</a></li>
                    <li><a href="/reservation" class="text-gray-600 hover:text-gray-900">Reservation</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
