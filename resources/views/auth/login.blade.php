<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - D'Mahesa Law Firm</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center relative overflow-hidden"
      style="background:#111415; color:#e1e3e4; font-family:'Inter',sans-serif; selection-background:#e9c349; selection-color:#3c2f00;">

    {{-- Background --}}
    <div class="absolute inset-0 z-0 opacity-20 pointer-events-none"
         style="background-image:url('https://lh3.googleusercontent.com/aida-public/AB6AXuB9qouA7Mc1xFUNAdKE4LpJuz3aZ1vgwJDqQ3GqDRRJcr1I7AGcARyAQaBEbFxR6Z9XkFixZD-XRmX4KMiJMazuH-V3AFeheoOd55Df6Q3_-8-03BKbUK93U63f7t6o3UUkoAXFlCEvnccOxjfB1u9BeL10xOIyFunjN59HI909vcnUdQQJobL7OCFQ1aLfm54eCsy8BqJBdwERdpX0aX5-MyGqFHu9EzIdSgqTRHQKlvGj2UerijtXPA'); background-size:cover; background-position:center;">
    </div>
    <div class="absolute inset-0 z-0 pointer-events-none" style="background:linear-gradient(to top, #111415, transparent, transparent);"></div>

    {{-- Login Card --}}
    <main class="relative z-10 w-full px-5 md:px-0" style="max-width:480px;">
        <div class="glass-panel p-8 md:p-12" style="box-shadow:0 30px 60px -15px rgba(5,8,18,0.5);">

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="uppercase mb-4" style="font-family:'Playfair Display',serif; font-size:clamp(32px,8vw,64px); line-height:1.1; font-weight:700; color:#e9c349; letter-spacing:0.05em;">
                    D'Mahesa<br>
                    <span style="font-size:0.55em; opacity:0.85; letter-spacing:0.02em;">Law Firm</span>
                </h1>
                <p style="font-size:18px; line-height:28px; color:#c6c6ce;">Welcome Back</p>
            </div>

            {{-- Errors --}}
            @if($errors->any())
            <div class="mb-6 px-4 py-3 rounded" style="background:rgba(147,0,10,0.2); border:1px solid rgba(255,180,171,0.3); color:#ffb4ab; font-size:14px;">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">Email Address</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute" style="left:0; top:50%; transform:translateY(-50%); color:#c6c6ce; opacity:0.5; padding-bottom:8px;">mail</span>
                        <input type="email" id="email" name="email" required value="{{ old('email') }}"
                               placeholder="attorney@dmahesa.com"
                               class="w-full bg-transparent border-0 px-8 py-2 transition-colors input-border-focus"
                               style="color:#e1e3e4; font-size:16px;">
                    </div>
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">Password</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute" style="left:0; top:50%; transform:translateY(-50%); color:#c6c6ce; opacity:0.5; padding-bottom:8px;">lock</span>
                        <input type="password" id="password" name="password" required placeholder="••••••••"
                               class="w-full bg-transparent border-0 px-8 py-2 transition-colors input-border-focus"
                               style="color:#e1e3e4; font-size:16px;">
                    </div>
                </div>

                {{-- Remember & Forgot --}}
                <div class="flex items-center justify-between pt-2">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 cursor-pointer" style="accent-color:#e9c349;">
                        <label for="remember" class="ml-2 cursor-pointer" style="font-size:14px; color:#c6c6ce;">Remember Me</label>
                    </div>
                    <a href="#" style="font-size:14px; color:#e9c349; text-decoration:none; font-weight:500;"
                       onmouseover="this.style.color='#ffe088'" onmouseout="this.style.color='#e9c349'">Forgot Password?</a>
                </div>

                {{-- Submit --}}
                <div class="pt-4">
                    <button type="submit" class="w-full py-4 font-bold transition-colors duration-300"
                            style="background:#e9c349; color:#3c2f00; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; border:none;"
                            onmouseover="this.style.background='#ffe088'" onmouseout="this.style.background='#e9c349'">
                        Sign In
                    </button>
                </div>
            </form>

            {{-- Divider --}}
            <div class="mt-8 relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full" style="border-top:1px solid rgba(69,70,77,0.3);"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4" style="background:#111415; color:#c6c6ce; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase;">OR</span>
                </div>
            </div>

            {{-- Google Sign In --}}
            <div class="mt-8">
                <a href="{{ route('auth.google') }}"
                   class="w-full inline-flex justify-center items-center py-3 px-4 transition-colors duration-300"
                   style="border:1px solid rgba(69,70,77,0.3); background:#373a3b; color:#e1e3e4; text-decoration:none;"
                   onmouseover="this.style.background='#e1e3e4'; this.style.color='#111415'" onmouseout="this.style.background='#373a3b'; this.style.color='#e1e3e4'">
                    <span class="mr-2 font-bold" style="font-size:16px; font-family:sans-serif;">G</span>
                    <span style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase;">Sign in with Google</span>
                </a>
            </div>

            {{-- Register Link --}}
            <p class="mt-10 text-center" style="font-size:14px; color:#c6c6ce;">
                Don't have an account?
                <a href="{{ route('register') }}" style="color:#e9c349; text-decoration:none; font-weight:500;"
                   onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">
                    Register here
                </a>
            </p>
        </div>
    </main>
</body>
</html>
