<x-frontend-layout>

    {{-- Article Section and advertisement section --}}
    <section class="py-5">
        <div class="container mx-auto">
            <div class="grid grid-cols-12 gap-6">
                {{-- Article Section --}}
                <div class="col-span-12 md:col-span-8">
                    <article class="bg-white p-6 rounded-lg shadow-lg mt-4">
                        <!-- News Header Section -->
                        <header class="flex flex-col md:flex-row items-center gap-4 border-b pb-4 mb-4">
                            <!-- Company Logo and Name -->
                            <div class="flex items-center gap-2">
                                <img src="{{ asset($company->logo) }}" alt="{{ $company->name }}"
                                    class="w-12 h-12 object-cover rounded-full shadow-md">
                                <h2 class="text-lg md:text-xl font-semibold primary">{{ $company->name }}</h2>
                            </div>

                            <!-- Publication Date -->
                            <div
                                class="flex flex-col sm:flex-row items-start sm:items-center gap-1 sm:gap-2 text-gray-600 text-xs sm:text-sm md:text-base">
                                <i class="fa-regular fa-calendar-days text-indigo-500 text-base sm:text-lg"></i>
                                <div class="flex items-center gap-1">
                                    <span>प्रकाशित मितिः</span>
                                    <span class="date font-medium">{{ nepalidate($news->created_at) }}</span>
                                </div>
                            </div>


                            <!-- Views -->
                            <div class="flex items-center gap-2 text-gray-600 text-sm md:text-base">
                                <i class="fa-regular fa-newspaper text-indigo-500"></i>
                                <span class="views font-medium">{{ $news->views }} पटक पढिएको</span>
                            </div>
                        </header>




                        <!-- News Title -->
                        <h1 class="text-xl md:text-2xl font-bold text-gray-800 mb-4 py-4">{{ $news->title }}</h1>

                        <!-- News Image -->
                        <div class="mb-4 pb-4">
                            <img src="{{ asset($news->image) }}" alt="{{ $news->title }}"
                                class="w-full h-auto object-cover rounded-lg shadow-md aspect-video">
                        </div>

                        <!-- News Description -->
                        <div class="prose prose-lg text-gray-700 overflow-hidden text-justify items-center">
                            {!! $news->description !!}
                        </div>

                        {{-- share buttons --}}
                        <!-- AddToAny BEGIN -->
                        <div
                            class="a2a_kit a2a_kit_size_32 a2a_default_style flex flex-wrap justify-center items-center gap-2 p-2">
                            <a class="a2a_dd hidden" href="https://www.addtoany.com/share"></a>
                            <a class="a2a_button_facebook" title="Share on Facebook"></a>
                            <a class="a2a_button_email" title="Share via Email"></a>
                            <a class="a2a_button_copy_link" title="Copy Link"></a>
                            <a class="a2a_button_print" title="Print"></a>
                            <a class="a2a_button_telegram" title="Share on Telegram"></a>
                            <a class="a2a_button_linkedin" title="Share on LinkedIn"></a>
                            <a class="a2a_button_google_gmail" title="Share on Gmail"></a>
                        </div>

                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->

                        {{-- End share buttons --}}

                        <livewire:comments :model="$news" />


                    </article>
                </div>

                {{-- Advertisement Section --}}
                <div class="col-span-12 md:col-span-4 ">
                    <div class="bg-white rounded-lg shadow-lg p-6 mt-4 md:mt-0">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Advertisements</h2>
                        @foreach ($advertises as $ad)
                            <div class="mb-4 border-2 border-gray-200 rounded-md">
                                <a href="{{ Str::startsWith($ad->link, ['http://', 'https://']) ? $ad->link : 'http://' . $ad->link }}"
                                    target="_blank" class="flex items-center justify-center">
                                    <img src="{{ asset($ad->image) }}"
                                        class="w-full h-auto object-cover rounded-lg shadow-md"
                                        alt="{{ $ad->company_name }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Article Section and advertisement section end --}}


    {{-- Related News Section --}}
    <section class="py-5">
        <div class="container">
            <div>
                <div>
                    <h1 class="primary text-2xl md:text-2xl font-semibold">सम्बन्धित खबर</h1>
                    <img src="/frontend/images/redline.png" class="w-24 md:w-36" alt="redline">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                    @foreach ($news->categories as $category)
                        @foreach ($category->posts as $relatedPost)
                            <div
                                class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform hover:scale-105">
                                <a href="{{ route('news', $relatedPost->id) }}" class="block">
                                    <img src="{{ asset($relatedPost->image) }}" alt="{{ $relatedPost->title }}"
                                        class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        <h1 class="text-lg font-semibold text-gray-800 hover:text-blue-600 transition">
                                            {{ $relatedPost->title }}</h1>
                                        <small class="text-gray-500 flex items-center mt-2">
                                            <i class="fa-regular fa-calendar-days mr-1"></i>
                                            {{ nepalidate($relatedPost->created_at) }}
                                        </small>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endforeach
                </div>

            </div>
        </div>

    </section>

</x-frontend-layout>
