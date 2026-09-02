@extends('layouts.app')

@section('title', "News & Insights - D'Mahesa Legal Group")
@section('meta-description', "Informasi terbaru seputar hukum, kemenangan kasus, dan wawasan hukum dari D'Mahesa Legal Group.")

@section('content')
<div style="padding-top:80px; background:#0b132b;">

    <main class="mx-auto pt-16 pb-24" style="max-width:1280px; padding:128px 32px 120px;">

        {{-- Header --}}
        <header class="mb-24 text-center">
            <h1 style="font-family:'Playfair Display',serif; font-size:clamp(40px,6vw,64px); line-height:1.1; font-weight:700; color:#e1e3e4; margin-bottom:24px;">
                News & Insights
            </h1>
            <p style="font-size:18px; line-height:28px; color:#c6c6ce; max-width:672px; margin:0 auto;">
                Stay informed with the latest developments in law, global economic shifts, and landmark cases handled by D'Mahesa Legal Group.
            </p>
            <div style="width:64px; height:1px; background:#e9c349; margin:48px auto 0;"></div>
        </header>

        {{-- News Grid --}}
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($news as $item)
            <article class="group flex flex-col h-full transition-transform duration-500 overflow-hidden relative"
                     style="background:#1c2541; border:{{ $item->isExternal() ? '1px solid transparent' : '1px solid rgba(233,195,73,0.3)' }};"
                     onmouseover="this.style.transform='translateY(-8px)'; this.style.borderColor='rgba(233,195,73,0.3)'"
                     onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='{{ $item->isExternal() ? 'transparent' : 'rgba(233,195,73,0.3)' }}'">

                {{-- Image --}}
                <div style="height:192px; overflow:hidden; position:relative;">
                    @if($item->image_path)
                        <img src="{{ \Storage::url($item->image_path) }}" alt="{{ $item->title }}"
                             class="w-full h-full object-cover transition-transform duration-700"
                             style="opacity:0.8; {{ !$item->isExternal() ? 'filter:grayscale(1);' : '' }}"
                             onmouseover="this.style.transform='scale(1.05)'; this.style.filter='none'"
                             onmouseout="this.style.transform='scale(1)'; this.style.filter='{{ !$item->isExternal() ? 'grayscale(1)' : 'none' }}'">
                    @else
                        <div class="w-full h-full flex items-center justify-center" style="background:linear-gradient(135deg,#1d2021,#282a2b);">
                            <span class="material-symbols-outlined" style="font-size:48px; color:#45464d;">newspaper</span>
                        </div>
                    @endif
                    <div class="absolute inset-0" style="background:linear-gradient(to top, #1c2541, transparent);"></div>
                </div>

                {{-- Content --}}
                <div class="p-8 flex flex-col flex-grow relative z-10 -mt-12 mx-4"
                     style="background:rgba(28,37,65,0.92); backdrop-filter:blur(4px);
                     {{ $item->isExternal() ? 'border-top:1px solid rgba(233,195,73,0.2);' : '' }}">

                    <span class="inline-block px-3 py-1 mb-4 w-fit"
                          style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase;
                          {{ $item->isExternal() ? 'background:#e9c349; color:#3c2f00;' : 'border:1px solid #e9c349; color:#e9c349;' }}">
                        {{ $item->isExternal() ? 'External Source' : 'Firm News' }}
                    </span>

                    <h2 class="mb-4 transition-colors duration-300 flex-grow break-words line-clamp-2" style="font-family:'Playfair Display',serif; font-size:24px; line-height:32px; font-weight:600; color:#e1e3e4;"
                        onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#e1e3e4'">
                        {{ $item->title }}
                    </h2>

                    <p class="mb-8 flex-grow break-words line-clamp-3" style="font-size:16px; line-height:24px; color:#c6c6ce; display:-webkit-box; -webkit-box-orient:vertical; overflow:hidden;">
                        {{ Str::limit(strip_tags($item->content), 120) }}
                    </p>

                    @if($item->isExternal())
                    <a href="{{ $item->external_url }}" target="_blank" rel="noopener noreferrer"
                       class="flex items-center gap-2 font-semibold transition-colors"
                       style="color:#e9c349; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; text-decoration:none;"
                       onmouseover="this.style.color='#ffe088'" onmouseout="this.style.color='#e9c349'">
                        Read on Source
                        <span class="material-symbols-outlined" style="font-size:14px;">open_in_new</span>
                    </a>
                    @else
                    <a href="{{ route('news.show', $item) }}"
                       class="flex items-center gap-2 font-semibold transition-colors"
                       style="color:#e9c349; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; text-decoration:none;"
                       onmouseover="this.style.color='#ffe088'" onmouseout="this.style.color='#e9c349'">
                        Read More
                        <span class="material-symbols-outlined" style="font-size:14px;">arrow_forward</span>
                    </a>
                    @endif
                </div>
            </article>
            @empty
            <div class="col-span-3 text-center py-16" style="color:#c6c6ce;">
                <span class="material-symbols-outlined" style="font-size:64px; color:#45464d; display:block; margin-bottom:16px;">newspaper</span>
                <p style="font-size:18px;">Belum ada berita yang dipublikasikan.</p>
            </div>
            @endforelse
        </section>

        {{-- Pagination --}}
        @if($news->hasPages())
        <div class="mt-16 flex justify-center">
            {{ $news->links() }}
        </div>
        @endif

    </main>
</div>
@endsection
