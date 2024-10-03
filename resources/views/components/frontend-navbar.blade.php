<nav class="bg-primary py-3 border-y-2 text-white font-semibold relative border-black">
    <div class="container mx-auto px-4">
        <!-- Mobile Menu Toggle -->
        <div class="flex items-center justify-between lg:hidden">
            <!-- Logo (Visible in Mobile View) -->
            <a href="{{ route('home') }}" class="text-white text-lg font-bold">{{ $company->name }}</a>
            <button id="menu-toggle" class="text-white focus:outline-none">
                <i class="fa-solid fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Menu Items -->
        <div id="menu"
            class="lg:flex lg:flex-wrap lg:justify-between absolute top-0 left-0 h-screen w-full bg-primary text-white transform -translate-x-full transition-transform duration-300 ease-in-out lg:relative lg:h-auto lg:w-auto lg:translate-x-0 lg:items-start z-50 gap-4">

            <!-- Close Button and Logo (Visible in Mobile View) -->
            <div class="flex justify-between items-center bg-primary p-4 lg:hidden">
                <!-- Close Button -->
                <a href="{{ route('home') }}" class="text-white text-lg font-bold">{{ $company->name }}</a>
                <button id="menu-close" class="px-4 py-2 text-white">
                    <i class="fa-solid fa-times text-2xl"></i>
                </button>
            </div>

            <hr class="w-full border-gray-400 lg:hidden">

            <!-- Menu List -->
            <ul class="lg:flex lg:flex-wrap lg:justify-between w-full p-4 lg:p-0">

                <li>
                    <ul
                        class="{{ $categories->count() < 9 ? 'lg:flex lg:flex-wrap lg:flex-row gap-6 lg:p-0 w-full flex flex-col ' : 'flex flex-col lg:grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 lg:p-0 w-full' }} ">
                        <!-- Home item -->
                        <li
                            class="{{ Request::routeIs('home') ? 'bg-[#ad1616] active shadow-lg transform hover:scale-105 transition-all duration-300 ease-out rounded-lg' : '' }}">
                            <a href="{{ route('home') }}"
                                class="block py-3 px-4 rounded-lg font-bold text-lg lg:text-base hover:bg-[#d12d2d] transition-colors duration-300 ease-in-out">गृहपृष्ठ</a>
                        </li>

                        <!-- Loop through categories -->
                        @foreach ($categories as $category)
                            <li
                                class="{{ Request::segment(2) == $category->slug ? 'bg-[#ad1616] active shadow-lg transform hover:scale-105 transition-all duration-300 ease-out  rounded-lg' : '' }}">
                                <a href="{{ route('cat', $category->slug) }}"
                                    class="block py-3 px-4 rounded-lg font-semibold text-lg lg:text-base hover:bg-[#d12d2d] transition-colors duration-300 ease-in-out">{{ $category->nep_title }}</a>
                            </li>
                        @endforeach
                </li>

            </ul>
            <li>
                <!-- Search Bar -->
                <form id="searchForm" action="{{ route('search') }}" method="GET"
                    class="flex items-center justify-end mt-4 lg:mt-0 gap-2 w-full lg:w-auto p-4 lg:p-0 lg:flex-wrap {{ $categories->count() < 9 ? 'hidden lg:flex' : 'hidden' }}">
                    <input type="text" name="q" id="searchInput" placeholder="Search..."
                        value="{{ $q ?? '' }}"
                        class="border border-gray-300 rounded-lg px-4 py-2 w-full lg:w-48 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 text-black">
                    <button type="submit"
                        class="bg-blue-600 text-white hover:bg-blue-700 transition duration-300 rounded-lg px-4 py-2 shadow-md">
                        Search
                    </button>
                </form>
            </li>
            </ul>




            <!-- Search Bar -->
            <form id="searchForm" action="{{ route('search') }}" method="GET"
                class="inline-flex items-center justify-end mt-4 lg:mt-0 gap-2 w-full lg:w-auto p-4 lg:p-0 lg:flex-wrap  {{ $categories->count() < 9 ? 'hidden' : 'flex' }}">
                <input type="text" name="q" id="searchInput" placeholder="Search..."
                    value="{{ $q ?? '' }}"
                    class="border border-gray-300 rounded-lg px-4 py-2 w-full lg:w-48 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 text-black">
                <button type="submit"
                    class="bg-blue-600 text-white hover:bg-blue-700 transition duration-300 rounded-lg px-4 py-2 shadow-md">
                    Search
                </button>
            </form>
        </div>

    </div>
</nav>

<script>
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
