@props(['news'])

<a href="{{ route('news', $news->id) }}">
    <div class="grid grid-cols-12 items-center justify-center gap-2 mt-5 hover:shadow-md overflow-hidden py-2">
        <div class="col-span-3">
            <img src="{{ asset($news->image) }}" class="rounded-md w-full h-[80px] object-cover "
                alt="{{ $news->title }}">
        </div>
        <div class=" col-span-9 ">
            <h1 class="font-bold">{{ $news->title }}</h1>
            <small><i class="fa-solid fa-calendar-days"></i>
                {{ nepalidate($news->created_at) }}</small>
        </div>
    </div>
</a>
