<x-frontend-layout>
    {{-- Home Section --}}
    <section class="pt-5">
        <div class="container">
            <div class="grid grid-cols-12 gap-3">
                <!-- Latest news section -->
                <a href="{{ route('news', $latest_news->id) }}" class="col-span-12 md:col-span-8">

                    <img src="{{ asset($latest_news->image) }}"
                        class="h-[200px] sm:h-[300px] md:h-[400px] lg:h-[500px] w-full object-cover rounded-md shadow-md"
                        alt="{{ $latest_news->title }}">
                    <h1 class="text-xl sm:text-2xl md:text-3xl font-bold pt-4">{{ $latest_news->title }}</h1>
                    <p class="text-gray-600 text-sm mt-1 line-clamp-2 py-2">
                        {!! Str::limit(strip_tags($latest_news->description), 300) !!}
                    </p>

                </a>

                <!-- Trending news section (hidden on small screens) -->
                <div class="hidden md:block col-span-12 md:col-span-4">
                    <div>
                        <h3 class="bg-[#D507071a] font-bold text-[#D50707] py-4 border-l-8 border-[#D50707] px-2">
                            ट्रेन्डिङ
                        </h3>
                    </div>

                    @foreach ($trending_news as $news)
                        <x-frontend-news-card :news="$news" />
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    {{-- Home Section --}}





    {{-- News By Category --}}
    <section class="py-5">
        <div class="container">
            <div>
                @foreach ($categories as $category)
                    @if (count($category->posts) > 0)
                        <div class="pt-8">
                            <h1 class="primary text-2xl md:text-3xl font-semibold">{{ $category->nep_title }}</h1>
                            <img src="/frontend/images/redline.png" class="w-24 md:w-36" alt="redline">
                        </div>

                        <!-- Responsive grid layout -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                            @foreach ($category->posts as $news)
                                <x-frontend-news-card :news="$news" />
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    {{-- News By Category --}}


</x-frontend-layout>
