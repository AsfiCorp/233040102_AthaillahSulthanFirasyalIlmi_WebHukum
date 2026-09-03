<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', "Admin Portal | D'Mahesa Law Firm")</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    {{-- Material Symbols --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased min-h-screen flex" style="background-color:#111415; color:#e1e3e4; font-family:'Inter',sans-serif;">

    {{-- Sidebar Navigation --}}
    <nav style="background-color:#0b132b; border-right:1px solid rgba(233,195,73,0.1); box-shadow:-30px 0 30px rgba(5,8,18,0.2);"
         class="h-screen w-64 fixed left-0 top-0 flex flex-col z-50">

        {{-- Sidebar Header --}}
        <div class="px-6 py-8 border-b mb-6" style="border-color:rgba(233,195,73,0.1);">
            <h1 class="font-bold" style="font-family:'Playfair Display',serif; font-size:32px; line-height:40px; color:#e9c349;">LawFirm Admin</h1>
            <p class="mt-2" style="font-size:16px; line-height:24px; color:#767e9b;">D'Mahesa Legal Group</p>
        </div>

        {{-- Navigation Links --}}
        <div class="flex-1 flex flex-col gap-1 px-2">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded transition-all duration-200 active:scale-95 {{ request()->routeIs('admin.dashboard') ? 'border-r-2' : '' }}"
               style="{{ request()->routeIs('admin.dashboard') ? 'color:#e9c349; border-color:#e9c349; background:rgba(233,195,73,0.05); font-weight:700;' : 'color:#767e9b;' }}
                      {{ !request()->routeIs('admin.dashboard') ? 'hover:color:#e9c349;' : '' }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('admin.dashboard') ? "font-variation-settings:'FILL' 1;" : '' }}">dashboard</span>
                <span style="font-size:12px; line-height:16px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase;">Dashboard Overview</span>
            </a>

            <a href="{{ route('admin.advocates.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded transition-all duration-200 active:scale-95 {{ request()->routeIs('admin.advocates.*') ? 'border-r-2' : '' }}"
               style="{{ request()->routeIs('admin.advocates.*') ? 'color:#e9c349; border-color:#e9c349; background:rgba(233,195,73,0.05); font-weight:700;' : 'color:#767e9b;' }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('admin.advocates.*') ? "font-variation-settings:'FILL' 1;" : '' }}">gavel</span>
                <span style="font-size:12px; line-height:16px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase;">Manage Advocates</span>
            </a>

            <a href="{{ route('admin.news.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded transition-all duration-200 active:scale-95 {{ request()->routeIs('admin.news.*') ? 'border-r-2' : '' }}"
               style="{{ request()->routeIs('admin.news.*') ? 'color:#e9c349; border-color:#e9c349; background:rgba(233,195,73,0.05); font-weight:700;' : 'color:#767e9b;' }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('admin.news.*') ? "font-variation-settings:'FILL' 1;" : '' }}">newspaper</span>
                <span style="font-size:12px; line-height:16px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase;">Manage News</span>
            </a>

            <a href="{{ route('admin.settings.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded transition-all duration-200 active:scale-95 {{ request()->routeIs('admin.settings.*') ? 'border-r-2' : '' }}"
               style="{{ request()->routeIs('admin.settings.*') ? 'color:#e9c349; border-color:#e9c349; background:rgba(233,195,73,0.05); font-weight:700;' : 'color:#767e9b;' }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('admin.settings.*') ? "font-variation-settings:'FILL' 1;" : '' }}">settings</span>
                <span style="font-size:12px; line-height:16px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase;">Pengaturan Web</span>
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded transition-all duration-200 active:scale-95 {{ request()->routeIs('admin.users.*') ? 'border-r-2' : '' }}"
               style="{{ request()->routeIs('admin.users.*') ? 'color:#e9c349; border-color:#e9c349; background:rgba(233,195,73,0.05); font-weight:700;' : 'color:#767e9b;' }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('admin.users.*') ? "font-variation-settings:'FILL' 1;" : '' }}">group</span>
                <span style="font-size:12px; line-height:16px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase;">Manage Users</span>
            </a>
        </div>

        {{-- Footer / Actions --}}
        <div class="mt-auto px-4 py-6 flex flex-col gap-3" style="border-top:1px solid rgba(233,195,73,0.1);">
            <a href="{{ route('home') }}" target="_blank"
               class="w-full text-center py-3 font-bold transition-colors"
               style="background:#e9c349; color:#3c2f00; font-size:12px; letter-spacing:0.1em; text-transform:uppercase;">
                View Website
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="flex w-full items-center gap-3 px-4 py-3 rounded transition-all duration-200 active:scale-95"
                        style="color:#ffb4ab;"
                        onmouseover="this.style.background='rgba(255,180,171,0.1)'"
                        onmouseout="this.style.background='transparent'">
                    <span class="material-symbols-outlined">logout</span>
                    <span style="font-size:12px; line-height:16px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase;">Logout</span>
                </button>
            </form>
        </div>
    </nav>

    {{-- Main Content Wrapper --}}
    <div class="ml-64 w-[calc(100%-16rem)] min-h-screen relative flex flex-col">

        {{-- Top App Bar --}}
        <header class="fixed top-0 right-0 w-[calc(100%-16rem)] z-40 flex justify-between items-center h-16 px-8 transition-all duration-200"
                style="background:rgba(17,20,21,0.85); backdrop-filter:blur(12px); border-bottom:1px solid rgba(233,195,73,0.2);">
            <div class="flex items-center gap-4">
                <h2 class="font-bold" style="font-family:'Playfair Display',serif; font-size:32px; line-height:40px; color:#e9c349;">
                    @yield('page-title', 'Admin Portal')
                </h2>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-sm" style="color:#c6c6ce;">{{ Auth::user()->name }}</span>
                <div class="w-9 h-9 rounded-full flex items-center justify-center font-bold"
                     style="background:#e9c349; color:#3c2f00;">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
            </div>
        </header>

        {{-- Scrollable Content --}}
        <main class="pt-24 px-8 pb-24 flex-1 flex flex-col gap-10">
            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="px-6 py-4 rounded" style="background:rgba(233,195,73,0.1); border:1px solid rgba(233,195,73,0.4); color:#e9c349;">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="px-6 py-4 rounded" style="background:rgba(255,180,171,0.1); border:1px solid rgba(255,180,171,0.4); color:#ffb4ab;">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>
</html>
