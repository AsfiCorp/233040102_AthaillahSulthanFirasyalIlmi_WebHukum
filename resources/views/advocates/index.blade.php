@extends('layouts.app')

@section('title', "D'Mahesa Advokat & Paralegal - Our People")
@section('meta-description', "Tim advokat dan paralegal profesional D'Mahesa Legal Group.")

@section('content')
<div style="padding-top:80px;">

    {{-- Hero Section --}}
    <section class="mx-auto" style="max-width:1280px; padding:128px 32px 120px;">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            <div class="md:col-span-8 flex flex-col justify-center">
                <span style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#e9c349; display:block; margin-bottom:16px;">D'Mahesa Advokat</span>
                <h1 style="font-family:'Playfair Display',serif; font-size:clamp(40px,6vw,64px); line-height:1.1; font-weight:700; color:#e1e3e4; margin-bottom:24px;">
                    D'Mahesa Advokat & Paralegal
                </h1>
                <p style="font-size:18px; line-height:28px; color:#c6c6ce; max-width:672px;">
                    D'Mahesa telah berdiri dengan fondasi yang kokoh didukung oleh Advokat dan Paralegal yang luar biasa, sehingga dapat beroperasi dan menuntaskan lebih dari beberapa kasus dari 2023 - sekarang.
                </p>
            </div>
        </div>
    </section>

    {{-- Advocates Section --}}
    @php $advocates = $allAdvocates->whereNotIn('role', ['Paralegal']); @endphp
    @if($advocates->count() > 0)
    <section class="mx-auto" style="max-width:1280px; padding:0 32px 120px;">
        <div class="flex items-center gap-6 mb-12">
            <h2 style="font-family:'Playfair Display',serif; font-size:40px; font-weight:600; color:#e1e3e4; white-space:nowrap;">Advokat Kami:</h2>
            <div style="flex:1; height:1px; background:rgba(69,70,77,0.3);"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($advocates as $advocate)
            <a href="{{ route('advocates.show', $advocate) }}"
               class="group block relative overflow-hidden transition-transform duration-300"
               style="background:#1c2541; border:1px solid rgba(69,70,77,0.2); text-decoration:none;"
               onmouseover="this.style.transform='translateY(-4px)'; this.style.borderColor='rgba(233,195,73,0.5)'"
               onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='rgba(69,70,77,0.2)'">

                <div style="aspect-ratio:3/4; overflow:hidden; background:#191c1d;">
                    @if($advocate->image_path)
                        <img src="{{ \Storage::url($advocate->image_path) }}" alt="{{ $advocate->name }}"
                             class="w-full h-full object-cover transition-all duration-500"
                             style="filter:grayscale(1);"
                             onmouseover="this.style.filter='grayscale(0)'" onmouseout="this.style.filter='grayscale(1)'">
                    @else
                        <div class="w-full h-full flex items-center justify-center" style="background:linear-gradient(135deg,#1d2021,#282a2b);">
                            <span class="material-symbols-outlined" style="font-size:80px; color:#45464d;">person</span>
                        </div>
                    @endif
                </div>

                <div class="p-6 relative">
                    <h3 style="font-family:'Playfair Display',serif; font-size:32px; line-height:40px; font-weight:600; color:#e1e3e4; margin-bottom:4px; transition:color 0.3s;"
                        onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#e1e3e4'">{{ $advocate->name }}</h3>
                    <p style="font-size:16px; color:#e9c349; margin-top:4px;">{{ $advocate->role }}</p>
                    <div class="slide-border absolute bottom-0" style="height:1px; background:#e9c349;"></div>
                </div>
            </a>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Paralegal Section --}}
    @php $paralegals = $allAdvocates->where('role', 'Paralegal'); @endphp
    @if($paralegals->count() > 0)
    <section class="mx-auto" style="max-width:1280px; padding:0 32px 120px;">
        <div class="flex items-center gap-6 mb-12">
            <h2 style="font-family:'Playfair Display',serif; font-size:32px; font-weight:600; color:#e1e3e4; white-space:nowrap;">Paralegal Kami:</h2>
            <div style="flex:1; height:1px; background:rgba(69,70,77,0.3);"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($paralegals as $advocate)
            <a href="{{ route('advocates.show', $advocate) }}"
               class="group block relative overflow-hidden transition-transform duration-300"
               style="background:#1c2541; border:1px solid rgba(69,70,77,0.2); text-decoration:none;"
               onmouseover="this.style.transform='translateY(-4px)'; this.style.borderColor='rgba(233,195,73,0.5)'"
               onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='rgba(69,70,77,0.2)'">
                <div style="aspect-ratio:3/4; overflow:hidden; background:#191c1d;">
                    @if($advocate->image_path)
                        <img src="{{ \Storage::url($advocate->image_path) }}" alt="{{ $advocate->name }}"
                             class="w-full h-full object-cover" style="filter:grayscale(1);"
                             onmouseover="this.style.filter='grayscale(0)'" onmouseout="this.style.filter='grayscale(1)'">
                    @else
                        <div class="w-full h-full flex items-center justify-center" style="background:#1d2021;">
                            <span class="material-symbols-outlined" style="font-size:64px; color:#45464d;">person</span>
                        </div>
                    @endif
                </div>
                <div class="p-6 relative">
                    <h3 style="font-family:'Playfair Display',serif; font-size:24px; font-weight:600; color:#e1e3e4; margin-bottom:4px;">{{ $advocate->name }}</h3>
                    <p style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Paralegal</p>
                    <div class="slide-border absolute bottom-0" style="height:1px; background:#e9c349;"></div>
                </div>
            </a>
            @endforeach
        </div>
    </section>
    @endif

</div>
@endsection
