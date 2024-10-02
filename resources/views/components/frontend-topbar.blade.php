<section class="py-3 bg-gray-200">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <!-- Company Logo -->
            <a href="{{ route('home') }}">
                <div class="flex justify-center md:justify-start">
                    <img src="{{ asset($company->logo) }}" width="200" alt="{{ $company->name }}"
                        class="max-w-full h-auto">
                </div>
            </a>

            <!-- HR Line (Visible on small screens and hidden on large screens) -->
            <hr class="w-full border-y border-gray-400 md:hidden">

            <!-- Date and Image -->
            <div class="flex flex-col items-center md:items-end text-center md:text-right space-y-2">
                <p class="text-lg md:text-xl text-gray-600">{{ nepalidate(now()) }}</p>
                <img src="/frontend/images/redline.png" width="160" alt="" class="max-w-full h-auto">
            </div>

            <!-- HR Line (Visible on small screens and hidden on large screens) -->
            <hr class="w-full border-y border-gray-400 md:hidden">

            <div class="md:hidden">
                {{-- Search Bar --}}
                <form id="searchForm" action="{{ route('search') }}" method="GET"
                    class="flex items-center md:mt-0 mt-4 md:gap-2">
                    <input type="text" name="q" id="searchInput" placeholder="Search..."
                        value="{{ $q ?? '' }}"
                        class="border border-gray-300 rounded-lg px-4 py-2 w-full md:w-48 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 text-black">
                    <button type="submit"
                        class="bg-gradient-to-r from-blue-500 to-purple-600 text-white hover:from-purple-600 hover:to-blue-500 transition duration-300 rounded-lg px-4 py-2 shadow-lg flex items-center justify-center space-x-1">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span>Search</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
