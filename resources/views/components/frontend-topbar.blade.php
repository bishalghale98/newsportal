<section class="py-3 bg-gray-200">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <!-- Company Logo -->
            <div class="flex justify-center md:justify-start">
                <img src="{{ asset($company->logo) }}" width="200" alt="{{ $company->name }}" class="max-w-full h-auto">
            </div>

            <!-- HR Line (Visible on small screens and hidden on large screens) -->
            <hr class="w-full border-y border-gray-400 md:hidden">

            <!-- Date and Image -->
            <div class="flex flex-col items-center md:items-end text-center md:text-right space-y-2">
                <p class="text-lg md:text-xl text-gray-600">{{ nepalidate(now()) }}</p>
                <img src="/frontend/images/redline.png" width="160" alt="" class="max-w-full h-auto">
            </div>
        </div>
    </div>
</section>
