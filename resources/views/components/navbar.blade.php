{{-- Navbar --}}
<header class="fixed top-0 w-full z-50 transition-all duration-300 ease-in-out"
        id="navbar"
        style="background:rgba(17,20,21,0.85); backdrop-filter:blur(12px); border-bottom:1px solid rgba(233,195,73,0.2); box-shadow:0 1px 3px rgba(0,0,0,0.3);">
    <div class="mx-auto flex justify-between items-center h-20" style="max-width:1280px; padding:0 32px;">

        {{-- Brand --}}
        <a href="{{ route('home') }}" class="font-bold tracking-tighter"
           style="font-family:'Playfair Display',serif; font-size:32px; line-height:40px; color:#e1e3e4; text-decoration:none;">
            D'MAHESA
        </a>

        {{-- Desktop Navigation --}}
        <nav class="hidden md:flex space-x-8 items-center" style="font-size:12px; line-height:16px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase;">
            <a href="{{ route('home') }}"
               style="color:{{ request()->routeIs('home') ? '#e9c349' : 'rgba(225,227,228,0.7)' }};
                      {{ request()->routeIs('home') ? 'border-bottom:1px solid #e9c349; padding-bottom:4px;' : '' }}
                      transition:color 0.3s; text-decoration:none;"
               onmouseover="if(!{{ request()->routeIs('home') ? 'true' : 'false' }}) this.style.color='#e9c349'"
               onmouseout="if(!{{ request()->routeIs('home') ? 'true' : 'false' }}) this.style.color='rgba(225,227,228,0.7)'">
                Beranda
            </a>
            <a href="{{ route('advocates.index') }}"
               style="color:{{ request()->routeIs('advocates.*') ? '#e9c349' : 'rgba(225,227,228,0.7)' }};
                      {{ request()->routeIs('advocates.*') ? 'border-bottom:1px solid #e9c349; padding-bottom:4px;' : '' }}
                      transition:color 0.3s; text-decoration:none;"
               onmouseover="if(!{{ request()->routeIs('advocates.*') ? 'true' : 'false' }}) this.style.color='#e9c349'"
               onmouseout="if(!{{ request()->routeIs('advocates.*') ? 'true' : 'false' }}) this.style.color='rgba(225,227,228,0.7)'">
                Our People
            </a>
            <a href="{{ route('news.index') }}"
               style="color:{{ request()->routeIs('news.*') ? '#e9c349' : 'rgba(225,227,228,0.7)' }};
                      {{ request()->routeIs('news.*') ? 'border-bottom:1px solid #e9c349; padding-bottom:4px;' : '' }}
                      transition:color 0.3s; text-decoration:none;"
               onmouseover="if(!{{ request()->routeIs('news.*') ? 'true' : 'false' }}) this.style.color='#e9c349'"
               onmouseout="if(!{{ request()->routeIs('news.*') ? 'true' : 'false' }}) this.style.color='rgba(225,227,228,0.7)'">
                News
            </a>
            <a href="{{ route('contact') }}"
               style="color:{{ request()->routeIs('contact') ? '#e9c349' : 'rgba(225,227,228,0.7)' }};
                      {{ request()->routeIs('contact') ? 'border-bottom:1px solid #e9c349; padding-bottom:4px;' : '' }}
                      transition:color 0.3s; text-decoration:none;"
               onmouseover="if(!{{ request()->routeIs('contact') ? 'true' : 'false' }}) this.style.color='#e9c349'"
               onmouseout="if(!{{ request()->routeIs('contact') ? 'true' : 'false' }}) this.style.color='rgba(225,227,228,0.7)'">
                Contact
            </a>

            @guest
                <a href="{{ route('login') }}"
                   style="color:rgba(225,227,228,0.7); transition:color 0.3s; text-decoration:none;"
                   onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='rgba(225,227,228,0.7)'">
                    Login
                </a>
            @else
                <a href="{{ route('admin.dashboard') }}"
                   style="color:rgba(225,227,228,0.7); transition:color 0.3s; text-decoration:none;"
                   onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='rgba(225,227,228,0.7)'">
                    Admin
                </a>
            @endguest
        </nav>

        {{-- CTA Button --}}
        <div class="hidden md:flex items-center">
            <a href="https://wa.me/#"
               class="flex items-center gap-2 font-bold px-6 py-3 transition-colors duration-300"
               style="background:#e9c349; color:#0b132b; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; text-decoration:none;"
               onmouseover="this.style.background='#ffe088'" onmouseout="this.style.background='#e9c349'">
                <span class="material-symbols-outlined" style="font-size:18px;">forum</span>
                WhatsApp Consultation
            </a>
        </div>

        {{-- Mobile Menu --}}
        <button class="md:hidden" style="color:#e1e3e4;" id="mobile-menu-toggle">
            <span class="material-symbols-outlined">menu</span>
        </button>
    </div>

    {{-- Mobile Dropdown --}}
    <div id="mobile-menu" class="hidden md:hidden px-6 pb-6" style="border-top:1px solid rgba(233,195,73,0.1);">
        <div class="flex flex-col space-y-4 pt-4" style="font-size:12px; letter-spacing:0.1em; text-transform:uppercase; font-weight:600;">
            <a href="{{ route('home') }}" style="color:rgba(225,227,228,0.7); text-decoration:none;">Beranda</a>
            <a href="{{ route('advocates.index') }}" style="color:rgba(225,227,228,0.7); text-decoration:none;">Our People</a>
            <a href="{{ route('news.index') }}" style="color:rgba(225,227,228,0.7); text-decoration:none;">News</a>
            <a href="{{ route('contact') }}" style="color:rgba(225,227,228,0.7); text-decoration:none;">Contact</a>
            @guest
                <a href="{{ route('login') }}" style="color:#e9c349; text-decoration:none;">Login</a>
            @else
                <a href="{{ route('admin.dashboard') }}" style="color:#e9c349; text-decoration:none;">Admin Panel</a>
            @endguest
        </div>
    </div>
</header>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });

    // Navbar scroll effect
    window.addEventListener('scroll', () => {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.style.borderBottomColor = 'rgba(233,195,73,0.4)';
            navbar.style.boxShadow = '0 4px 6px rgba(0,0,0,0.4)';
        } else {
            navbar.style.borderBottomColor = 'rgba(233,195,73,0.2)';
            navbar.style.boxShadow = '0 1px 3px rgba(0,0,0,0.3)';
        }
    });
</script>
