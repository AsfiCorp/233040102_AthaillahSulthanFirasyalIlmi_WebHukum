<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>D'Mahesa Law Firm - Create Account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center relative overflow-hidden"
      style="background:#111415; color:#e1e3e4; font-family:'Inter',sans-serif;">

    {{-- Atmospheric Background --}}
    <div class="absolute inset-0 pointer-events-none opacity-20">
        <div class="absolute rounded-full blur-3xl" style="top:-20%; left:-10%; width:50vw; height:50vw; background:#0b132b;"></div>
        <div class="absolute rounded-full blur-3xl opacity-30" style="bottom:-20%; right:-10%; width:40vw; height:40vw; background:#af8d11;"></div>
    </div>

    {{-- Register Card --}}
    <div class="w-full z-10 px-5 md:px-0" style="max-width:480px;">
        <div class="relative overflow-hidden p-8 md:p-12" style="background:#1C2541; border:1px solid rgba(69,70,77,0.3); box-shadow:0 30px 60px -15px rgba(5,8,18,0.5);">

            {{-- Gold Accent Line --}}
            <div class="absolute top-0 left-0 right-0" style="height:2px; background:#e9c349; opacity:0.8;"></div>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="uppercase mb-2" style="font-family:'Playfair Display',serif; font-size:32px; line-height:40px; font-weight:600; color:#e9c349; letter-spacing:0.1em;">D'Mahesa Law Firm</h1>
                <p style="font-size:16px; color:#c6c6ce;">Create Your Account</p>
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
            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Name --}}
                <div class="relative group">
                    <label for="name" style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:4px;">Full Name</label>
                    <input type="text" id="name" name="name" required value="{{ old('name') }}"
                           placeholder="John Doe"
                           class="w-full bg-transparent border-0 py-2 transition-colors input-border-focus"
                           style="color:#e1e3e4; font-size:16px; padding-left:0;">
                </div>

                {{-- Email --}}
                <div class="relative group">
                    <label for="email" style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:4px;">Email Address</label>
                    <input type="email" id="email" name="email" required value="{{ old('email') }}"
                           placeholder="john.doe@example.com"
                           class="w-full bg-transparent border-0 py-2 transition-colors input-border-focus"
                           style="color:#e1e3e4; font-size:16px; padding-left:0;">
                </div>

                {{-- Password --}}
                <div class="relative group">
                    <label for="password" style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:4px;">Password</label>
                    <input type="password" id="password" name="password" required placeholder="••••••••"
                           class="w-full bg-transparent border-0 py-2 pr-10 transition-colors input-border-focus"
                           style="color:#e1e3e4; font-size:16px; padding-left:0;">
                    <button type="button" aria-label="Toggle password visibility"
                            class="absolute bottom-2 right-0" style="color:#c6c6ce;"
                            onclick="togglePass('password', this)"
                            onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">
                        <span class="material-symbols-outlined" style="font-size:20px;">visibility</span>
                    </button>
                </div>

                {{-- Confirm Password --}}
                <div class="relative group">
                    <label for="password_confirmation" style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:4px;">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="••••••••"
                           class="w-full bg-transparent border-0 py-2 transition-colors input-border-focus"
                           style="color:#e1e3e4; font-size:16px; padding-left:0;">
                </div>

                {{-- Submit --}}
                <div class="pt-4">
                    <button type="submit" class="w-full py-4 font-bold transition-colors duration-300"
                            style="background:#e9c349; color:#3c2f00; font-size:12px; letter-spacing:0.1em; text-transform:uppercase;"
                            onmouseover="this.style.background='#ffe088'" onmouseout="this.style.background='#e9c349'">
                        Create Account
                    </button>
                </div>
            </form>

            {{-- Divider --}}
            <div class="relative my-8">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full" style="border-top:1px solid rgba(69,70,77,0.3);"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4" style="background:#1C2541; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">OR</span>
                </div>
            </div>

            {{-- Google Sign Up --}}
            <a href="{{ route('auth.google') }}"
               class="w-full flex items-center justify-center gap-3 py-3 px-4 uppercase transition-colors duration-300 group"
               style="background:#e1e3e4; color:#111415; font-size:12px; letter-spacing:0.1em; font-weight:600; text-decoration:none; border:1px solid transparent;"
               onmouseover="this.style.background='#c6c6ce'" onmouseout="this.style.background='#e1e3e4'">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                Sign up with Google
            </a>

            {{-- Login Link --}}
            <div class="mt-8 text-center" style="font-size:16px; color:#c6c6ce;">
                Already have an account?
                <a href="{{ route('login') }}" style="color:#e9c349; text-decoration:none;"
                   onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">
                    Sign in
                </a>
            </div>
        </div>
    </div>

    <script>
        function togglePass(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector('span');
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                input.type = 'password';
                icon.textContent = 'visibility';
            }
        }
    </script>
</body>
</html>
