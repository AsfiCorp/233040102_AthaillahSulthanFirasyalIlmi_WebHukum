<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', setting('seo_title', "D'Mahesa Legal Group - Keadilan | Integritas | Profesionalisme"))</title>
    <meta name="description" content="@yield('meta-description', setting('seo_description', "D'Mahesa Legal Group — Kantor hukum terkemuka yang menghadirkan keadilan, integritas, dan profesionalisme."))">
    <meta name="keywords" content="{{ setting('seo_keywords', 'law firm, dmahesa, hukum, advokat jakarta, pengacara') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    {{-- Material Symbols --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="antialiased overflow-x-hidden min-h-screen flex flex-col" style="background-color:#111415; color:#e1e3e4; font-family:'Inter',sans-serif;">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Main Content --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Floating Chatbot --}}
    @include('components.chatbot')

    {{-- Footer --}}
    @include('components.footer')

    @stack('scripts')
</body>
</html>
