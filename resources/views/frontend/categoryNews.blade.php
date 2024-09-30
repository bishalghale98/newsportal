<x-frontend-layout>
    <section class="py-5">
        <div class="container mx-auto">
            <div class="grid grid-cols-12 gap-6">
                {{-- Post Section --}}
                <div class="col-span-12 md:col-span-8">
                    @foreach ($posts as $post)
                        <div
                            class="grid grid-cols-12 gap-3 items-center p-4 border-b border-gray-200 hover:bg-gray-100 transition duration-300 ease-in-out mb-5 rounded-md">
                            <a href="{{ route('news', $post->id) }}" class="col-span-12 md:col-span-4">
                                <div>
                                    <img src="{{ asset($post->image) }}" class="w-full h-auto object-cover rounded-lg"
                                        alt="{{ $post->title }}">
                                </div>
                            </a>
                            <div class="col-span-12 md:col-span-8">
                                <a href="{{ route('news', $post->id) }}">
                                    <h1 class="text-lg font-semibold text-gray-800 hover:text-blue-600 transition py-2">
                                        {{ $post->title }}
                                    </h1>
                                </a>
                                <p class="text-gray-600 text-sm mt-1 line-clamp-2 py-2">
                                    {!! Str::limit(strip_tags($post->description), 100) !!}
                                </p>
                                <small class="text-gray-500 block mt-2 py-2">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    {{ nepalidate($post->created_at) }}
                                </small>
                                <a href="{{ route('news', $post->id) }}"
                                    class="inline-block mt-2 text-center text-white bg-blue-600 hover:bg-blue-700 transition duration-300 ease-in-out rounded px-3 py-2 text-sm">
                                    पुरा पढ्नुहोस्
                                </a>
                            </div>
                        </div>
                    @endforeach

                    @if ($posts->count() > 10)
                        <div class="mt-6 p-4 bg-gray-100 rounded-lg shadow-md">
                            {{ $posts->links() }}
                        </div>
                    @endif
                </div>

                {{-- Advertisement Section --}}
                <div class="col-span-12 md:col-span-4">
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Advertisements</h2>
                        @foreach ($advertises as $ad)
                            <div
                                class="flex items-center w-fit h-fit mb-4 p-2 border border-gray-200 rounded hover:shadow-lg transition duration-300 ease-in-out">
                                <a href="{{ Str::startsWith($ad->link, ['http://', 'https://']) ? $ad->link : 'http://' . $ad->link }}"
                                    target="_blank" class="flex flex-col items-center">
                                    <img src="{{ asset($ad->image) }}" class="w-full h-auto object-cover rounded"
                                        alt="{{ $ad->company_name }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>
