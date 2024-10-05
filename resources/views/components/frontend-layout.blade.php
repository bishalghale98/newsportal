<!DOCTYPE html>
<html lang="en">

@props(['title', 'meta_keywords', 'meta_description', 'image'])


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="/frontend/images/redline.png" type="image/x-icon">
    <link rel="shortcut icon" href="/" type="image/x-icon">

    {{-- for seo sections for google --}}
    <title>{{ $title ?? 'Jawaaf News Portal' }}</title>
    <meta name="description" content="{{ $meta_description ?? 'Jawaaf News' }}">
    <meta name="author" content="Jawaaf News">
    <meta name="robots" content="index, follow">

    {{-- meta keywords ma maximum 10 ota rakhda ramro --}}
    <meta name="keywords" content="{{ $meta_keywords ?? 'Jawaaf News' }}">


    {{-- for social media --}}
    <meta property="og:title" content="{{ $title ?? 'Jawaaf News Portal' }}" />
    <meta property="og:description" content="{{ $meta_description ?? 'Jawaaf News Portal' }}" />
    <meta property="og:image" content="{{ $image ?? asset("$company->logo") }}" />
    <meta property="og:url" content="{{ $url ?? url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ $title ?? 'Jawaaf News Portal' }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:locale:alternate" content="en_GB" />
    <meta property="og:locale:alternate" content="fr_FR" />
    <meta property="og:locale:alternate" content="es_ES" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="/frontend/css/style.css">

</head>

<body>

    {{-- sweet alert --}}
    @include('sweetalert::alert')
    {{-- sweet alert end --}}



    <header>
        <x-frontend-topbar />
    </header>

    <main>
        <x-frontend-navbar />
        {{ $slot }}
    </main>

    <footer>

    </footer>

</body>



{{-- search --}}

<script>
    // On page load, retrieve the search term from localStorage
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const storedSearchTerm = localStorage.getItem('searchTerm');

        if (storedSearchTerm) {
            searchInput.value = storedSearchTerm;
        }
    });

    // Save the search term to localStorage when the form is submitted
    document.getElementById('searchForm').addEventListener('submit', function() {
        const searchInput = document.getElementById('searchInput');
        localStorage.setItem('searchTerm', searchInput.value);
    });
</script>



</html>
