<nav class="bg-primary py-3 border-y-2 text-white font-semibold relative  border-black">
    <div class="container px-4 ">
        <!-- Mobile Menu Toggle -->
        <div class="flex items-center justify-end md:hidden">
            <!-- Mobile View -->
            <button id="menu-toggle" class="text-white focus:outline-none">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <!-- Menu Items -->
        <div id="menu"
            class="absolute top-0 left-0 pb-10 md:pb-0 w-full bg-primary bg-white transform -translate-x-full transition-transform duration-300 ease-in-out md:relative md:translate-x-0 md:flex md:items-center md:w-auto md:h-auto z-50 gap-4">

            <!-- Close Button and Logo (Visible in Mobile View) -->
            <div class="flex justify-end items-center bg-primary p-4 md:hidden ">
                <!-- Close Button -->
                <button id="menu-close" class="px-7 py-2 text-gray-600 hover:text-red-600 transition duration-300">
                    <i class="fa-solid fa-times text-2xl text-white"></i>
                </button>
            </div>

            <!-- Menu List -->
            <ul class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6 p-4 md:p-0">
                <li class="{{ Request::routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}"
                        class="block py-2 md:py-0 hover:bg-gray-200 hover:px-3 hover:py-2 rounded-md transition duration-300">गृहपृष्ठ</a>
                </li>

                @foreach ($categories as $category)
                    <li class="{{ Request::segment(2) == $category->slug ? 'active' : '' }}">
                        <a href="{{ route('cat', $category->slug) }}"
                            class="block py-2 md:py-0 hover:bg-gray-200 hover:px-3 hover:py-2 rounded-md transition duration-300">{{ $category->nep_title }}</a>
                    </li>
                @endforeach
            </ul>

            {{-- Search Bar --}}
            <form id="searchForm" action="{{ route('search') }}" method="GET"
                class="flex items-center md:mt-0 mt-4 md:gap-2 ">
                <input type="text" name="q" id="searchInput" placeholder="Search..."
                    value="{{ $q ?? '' }}"
                    class="border border-gray-300 rounded-lg px-4 py-2 w-full md:w-48 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 text-black">
                <button type="submit"
                    class="bg-blue-600 text-white hover:bg-blue-700 transition duration-300 rounded-lg px-4 py-2 shadow-md">
                    Search
                </button>
            </form>
        </div>

    </div>
</nav>

<script>
    // JavaScript to toggle the menu in mobile view with slide-in effect
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');
    const menuClose = document.getElementById('menu-close');

    menuToggle.addEventListener('click', () => {
        menu.classList.toggle('-translate-x-full');
    });

    menuClose.addEventListener('click', () => {
        menu.classList.add('-translate-x-full');
    });
</script>



