@extends('layouts.app')

@section('title', $advocate->name . " - " . $advocate->role . " | D'MAHESA")
@section('meta-description', "Profil advokat {{ $advocate->name }}, {{ $advocate->role }} di D'Mahesa Legal Group.")

@section('content')
<div style="background:#0b132b; padding-top:80px;">
    <main class="mx-auto w-full grid grid-cols-1 md:grid-cols-12 gap-8 items-start"
          style="max-width:1280px; padding:64px 32px 120px;">

        {{-- Portrait Column --}}
        <div class="md:col-span-5 flex flex-col gap-6 sticky top-32">
            <div class="relative w-full overflow-hidden group" style="aspect-ratio:3/4; background:#1c2541; border:1px solid rgba(233,195,73,0.1);">
                @if($advocate->image_path)
                    <img src="{{ asset('storage/'.$advocate->image_path) }}" alt="{{ $advocate->name }}"
                         class="w-full h-full object-cover transition-transform duration-700"
                         style="opacity:0.9;"
                         onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                @else
                    <div class="w-full h-full flex items-center justify-center" style="background:linear-gradient(135deg,#1c2541,#0b132b);">
                        <span class="material-symbols-outlined" style="font-size:120px; color:#45464d;">person</span>
                    </div>
                @endif
                <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(11,19,43,0.8), transparent);"></div>
            </div>
        </div>

        {{-- Bio Column --}}
        <div class="md:col-span-7 flex flex-col justify-start">

            {{-- Back Link --}}
            <a href="{{ route('advocates.index') }}"
               class="inline-flex items-center gap-2 mb-10 transition-colors duration-300"
               style="color:#c6c6ce; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; text-decoration:none;"
               onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">
                <span class="material-symbols-outlined" style="font-size:16px;">arrow_back</span>
                Back to Advocates
            </a>

            {{-- Header --}}
            <div class="mb-12 pb-8" style="border-bottom:1px solid rgba(233,195,73,0.2);">
                <h1 style="font-family:'Playfair Display',serif; font-size:clamp(32px,4vw,64px); line-height:1.1; font-weight:700; color:#e9c349; margin-bottom:16px;">
                    {{ $advocate->name }}
                </h1>
                <p style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:rgba(225,227,228,0.8);">
                    {{ $advocate->role }}
                </p>
            </div>

            {{-- Biography --}}
            @if($advocate->short_story)
            <div class="mb-12" style="font-size:18px; line-height:28px; color:rgba(225,227,228,0.9);">
                @foreach(explode("\n\n", $advocate->short_story) as $paragraph)
                    <p class="mb-6 leading-relaxed">{{ $paragraph }}</p>
                @endforeach
            </div>
            @else
            <div class="mb-12" style="font-size:18px; line-height:28px; color:rgba(225,227,228,0.9);">
                <p class="mb-6 leading-relaxed">
                    {{ $advocate->name }} adalah {{ $advocate->role }} di D'Mahesa Legal Group yang berpengalaman dalam menangani berbagai kasus hukum kompleks dengan dedikasi dan profesionalisme tinggi.
                </p>
            </div>
            @endif

            {{-- Expertise Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-16">
                <div class="p-6" style="background:#1c2541; border:1px solid rgba(233,195,73,0.1);">
                    <h3 style="font-family:'Playfair Display',serif; font-size:20px; color:#e9c349; margin-bottom:8px;">Litigasi Hukum</h3>
                    <p style="font-size:16px; line-height:24px; color:rgba(225,227,228,0.7);">Penanganan sengketa hukum dengan strategi yang terencana dan terukur.</p>
                </div>
                <div class="p-6" style="background:#1c2541; border:1px solid rgba(233,195,73,0.1);">
                    <h3 style="font-family:'Playfair Display',serif; font-size:20px; color:#e9c349; margin-bottom:8px;">Konsultasi Hukum</h3>
                    <p style="font-size:16px; line-height:24px; color:rgba(225,227,228,0.7);">Memberikan nasihat hukum komprehensif untuk keputusan bisnis dan personal.</p>
                </div>
            </div>

            {{-- CTA --}}
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('contact') }}"
                   class="inline-flex justify-center items-center font-bold transition-colors duration-300"
                   style="background:#e9c349; color:#0b132b; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; padding:16px 32px; text-decoration:none;"
                   onmouseover="this.style.background='#ffe088'" onmouseout="this.style.background='#e9c349'">
                    Book a Consultation
                </a>
                <a href="https://wa.me/#"
                   class="inline-flex justify-center items-center gap-2 font-bold transition-colors duration-300"
                   style="border:1px solid #e9c349; color:#e9c349; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; padding:16px 32px; text-decoration:none;"
                   onmouseover="this.style.background='rgba(233,195,73,0.1)'" onmouseout="this.style.background='transparent'">
                    <span class="material-symbols-outlined" style="font-size:18px;">chat</span>
                    Contact via WhatsApp
                </a>
            </div>
        </div>
    </main>
</div>
@endsection
