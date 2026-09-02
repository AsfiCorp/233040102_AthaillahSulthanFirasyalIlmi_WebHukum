@extends('layouts.app')

@section('title', "D'Mahesa Legal Group - Keadilan | Integritas | Profesionalisme")
@section('meta-description', "Kantor hukum terkemuka yang menghadirkan keadilan, integritas, dan profesionalisme dalam setiap kasus hukum.")

@section('content')

{{-- Hero Section --}}
<section class="relative min-h-screen flex items-center" style="padding-top:80px;">

    {{-- Background --}}
    <div class="absolute inset-0 z-0">
        <div class="w-full h-full bg-cover bg-center opacity-40"
             style="background-image:url('{{ asset('images/hero-bg.jpeg') }}');">
        </div>
        <div class="absolute inset-0" style="background:linear-gradient(to right, rgba(11,19,43,0.92), rgba(11,19,43,0.45));"></div>
    </div>

    <div class="relative z-10 mx-auto w-full grid grid-cols-1 md:grid-cols-12 gap-8" style="max-width:1280px; padding:0 32px;">
        <div class="md:col-span-8 lg:col-span-7 flex flex-col justify-center py-24">

            @php
                $heroLines = explode("\n", str_replace("\r", "", setting('hero_title', "Keadilan\nIntegritas\nProfesionalisme")));
                $lastLine = array_pop($heroLines);
            @endphp
            <h1 class="mb-8 leading-tight" style="font-family:'Playfair Display',serif; font-size:clamp(40px,6vw,64px); line-height:1.1; font-weight:700; color:#e1e3e4;">
                @foreach($heroLines as $line)
                    <span class="block">{{ $line }}</span>
                @endforeach
                <span class="block text-gradient">{{ $lastLine }}</span>
            </h1>

            <p class="mb-10 max-w-2xl" style="font-size:18px; line-height:28px; color:#c6c6ce;">
                {{ setting('hero_subtitle', 'Uncompromising legal expertise for those who demand excellence. We secure your legacy through strategic litigation, meticulous counsel, and relentless dedication to justice.') }}
            </p>

            <div class="flex flex-wrap gap-4">
                <a href="{{ setting('hero_btn1_url', route('advocates.index')) }}"
                   class="flex items-center gap-2 font-bold transition-colors duration-300"
                   style="background:#e9c349; color:#0b132b; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; padding:16px 32px; text-decoration:none; border:1px solid #e9c349;"
                   onmouseover="this.style.background='#ffe088'" onmouseout="this.style.background='#e9c349'">
                    {{ setting('hero_btn1_text', 'Meet Our Team') }}
                    <span class="material-symbols-outlined">arrow_forward</span>
                </a>
                <a href="{{ setting('hero_btn2_url', route('news.index')) }}"
                   class="font-bold transition-colors duration-300 flex items-center"
                   style="border:1px solid #e9c349; color:#e9c349; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; padding:16px 32px; text-decoration:none;"
                   onmouseover="this.style.background='rgba(11,19,43,0.5)'" onmouseout="this.style.background='transparent'">
                    {{ setting('hero_btn2_text', 'News & Insights') }}
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Services Section --}}
<section id="services" style="background:#111415; padding:120px 0;">
    <div class="mx-auto" style="max-width:1280px; padding:0 32px;">

        <div class="text-center mb-20">
            <span style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#e9c349; display:block; margin-bottom:16px;">Layanan Kami</span>
            <h2 style="font-family:'Playfair Display',serif; font-size:40px; line-height:48px; font-weight:600; color:#e1e3e4; margin-bottom:24px;">Bidang Keahlian Hukum</h2>
            <div style="width:64px; height:1px; background:#e9c349; margin:0 auto;"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @for($i = 1; $i <= 3; $i++)
            @php
                $defaultIcons = ['gavel', 'balance', 'business_center'];
                $defaultTitles = ['Litigasi Korporat', 'Arbitrase Internasional', 'Hukum Bisnis'];
                $defaultDescs = ['Pertahanan strategis dan penuntutan dalam sengketa komersial yang kompleks.', 'Penyelesaian sengketa lintas batas dengan keahlian hukum internasional.', 'Konsultasi komprehensif untuk transaksi bisnis dan kepatuhan regulasi.'];
            @endphp
            <div class="p-8 transition-all duration-300 group"
                 style="background:#1d2021; border:1px solid rgba(69,70,77,0.3);"
                 onmouseover="this.style.borderColor='rgba(233,195,73,0.5)'"
                 onmouseout="this.style.borderColor='rgba(69,70,77,0.3)'">
                <span class="material-symbols-outlined mb-6 block" style="font-size:40px; color:#e9c349;">{{ setting('service_'.$i.'_icon', $defaultIcons[$i-1]) }}</span>
                <h3 style="font-family:'Playfair Display',serif; font-size:24px; font-weight:600; color:#e1e3e4; margin-bottom:12px;">{{ setting('service_'.$i.'_title', $defaultTitles[$i-1]) }}</h3>
                <p style="color:#c6c6ce; font-size:16px; line-height:24px;">{{ setting('service_'.$i.'_desc', $defaultDescs[$i-1]) }}</p>
            </div>
            @endfor
        </div>
    </div>
</section>

{{-- Featured Advocates --}}
@if($advocates->count() > 0)
<section style="background:#0b132b; padding:120px 0;">
    <div class="mx-auto" style="max-width:1280px; padding:0 32px;">
        <div class="flex items-center gap-6 mb-16">
            <h2 style="font-family:'Playfair Display',serif; font-size:40px; font-weight:600; color:#e1e3e4; white-space:nowrap;">Tim Kami</h2>
            <div style="flex:1; height:1px; background:rgba(69,70,77,0.4);"></div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($advocates->take(4) as $advocate)
            <a href="{{ route('advocates.show', $advocate) }}"
               class="group block relative overflow-hidden transition-transform duration-300"
               style="background:#1c2541; border:1px solid rgba(69,70,77,0.2); text-decoration:none;"
               onmouseover="this.style.transform='translateY(-4px)'; this.style.borderColor='rgba(233,195,73,0.5)'"
               onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='rgba(69,70,77,0.2)'">
                <div style="aspect-ratio:3/4; overflow:hidden; background:#191c1d;">
                    @if($advocate->image_path)
                        <img src="{{ asset('storage/'.$advocate->image_path) }}" alt="{{ $advocate->name }}"
                             style="width:100%; height:100%; object-fit:cover; filter:grayscale(1); transition:filter 0.5s;"
                             onmouseover="this.style.filter='grayscale(0)'" onmouseout="this.style.filter='grayscale(1)'">
                    @else
                        <div class="w-full h-full flex items-center justify-center" style="background:#1d2021;">
                            <span class="material-symbols-outlined" style="font-size:64px; color:#45464d;">person</span>
                        </div>
                    @endif
                </div>
                <div class="p-5 relative">
                    <h3 style="font-family:'Playfair Display',serif; font-size:20px; font-weight:600; color:#e1e3e4; margin-bottom:4px;">{{ $advocate->name }}</h3>
                    <p style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#e9c349;">{{ $advocate->role }}</p>
                    <div class="slide-border absolute bottom-0" style="height:1px; background:#e9c349;"></div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('advocates.index') }}"
               class="inline-flex items-center gap-2 font-bold transition-colors duration-300"
               style="border:1px solid #e9c349; color:#e9c349; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; padding:16px 32px; text-decoration:none;"
               onmouseover="this.style.background='rgba(233,195,73,0.1)'" onmouseout="this.style.background='transparent'">
                Lihat Semua Tim
                <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>
    </div>
</section>
@endif

{{-- Latest News --}}
@if($latestNews->count() > 0)
<section style="background:#111415; padding:120px 0;">
    <div class="mx-auto" style="max-width:1280px; padding:0 32px;">
        <div class="flex items-center gap-6 mb-16">
            <h2 style="font-family:'Playfair Display',serif; font-size:40px; font-weight:600; color:#e1e3e4; white-space:nowrap;">News & Insights</h2>
            <div style="flex:1; height:1px; background:rgba(69,70,77,0.4);"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($latestNews as $news)
            <article class="group flex flex-col h-full transition-transform duration-500 overflow-hidden"
                     style="background:#1c2541; border:1px solid rgba(69,70,77,0.2);"
                     onmouseover="this.style.transform='translateY(-8px)'; this.style.borderColor='rgba(233,195,73,0.3)'"
                     onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='rgba(69,70,77,0.2)'">

                @if($news->image_path)
                <div style="height:192px; overflow:hidden;">
                    <img src="{{ asset('storage/'.$news->image_path) }}" alt="{{ $news->title }}"
                         style="width:100%; height:100%; object-fit:cover; opacity:0.8; transition:transform 0.7s;"
                         onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                </div>
                @endif

                <div class="p-8 flex flex-col flex-grow">
                    <span class="inline-block px-3 py-1 mb-4 w-fit" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase;
                        {{ $news->isExternal() ? 'background:#e9c349; color:#3c2f00;' : 'border:1px solid #e9c349; color:#e9c349;' }}">
                        {{ $news->isExternal() ? 'External Source' : 'Firm News' }}
                    </span>

                    <h3 class="mb-4 transition-colors duration-300" style="font-family:'Playfair Display',serif; font-size:24px; font-weight:600; color:#e1e3e4; flex-grow:1;">
                        {{ $news->title }}
                    </h3>

                    <div class="flex items-center justify-between mt-4">
                        <span style="color:#c6c6ce; font-size:12px;">{{ $news->created_at->format('d M Y') }}</span>

                        @if($news->isExternal())
                        <a href="{{ $news->external_url }}" target="_blank" rel="noopener noreferrer"
                           class="flex items-center gap-1 font-semibold transition-colors"
                           style="color:#e9c349; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; text-decoration:none;"
                           onmouseover="this.style.color='#ffe088'" onmouseout="this.style.color='#e9c349'">
                            Read on Source <span class="material-symbols-outlined" style="font-size:14px;">open_in_new</span>
                        </a>
                        @else
                        <a href="{{ route('news.show', $news) }}"
                           class="flex items-center gap-1 font-semibold transition-colors"
                           style="color:#e9c349; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; text-decoration:none;"
                           onmouseover="this.style.color='#ffe088'" onmouseout="this.style.color='#e9c349'">
                            Read More <span class="material-symbols-outlined" style="font-size:14px;">arrow_forward</span>
                        </a>
                        @endif
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('news.index') }}"
               class="inline-flex items-center gap-2 font-bold transition-colors duration-300"
               style="border:1px solid #e9c349; color:#e9c349; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; padding:16px 32px; text-decoration:none;"
               onmouseover="this.style.background='rgba(233,195,73,0.1)'" onmouseout="this.style.background='transparent'">
                Lihat Semua Berita
                <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>
    </div>
</section>
@endif

@endsection
