@extends('layouts.app')

@section('title', $news->title . " | D'Mahesa Legal Group")
@section('meta-description', Str::limit(strip_tags((string) $news->content), 160))

@section('content')
<div style="background:#0b132b; padding-top:80px;">
    <main style="min-height:100vh;">

        {{-- Hero Image --}}
        <div class="mx-auto pt-12 pb-8" style="max-width:1280px; padding:48px 32px 32px;">
            <a href="{{ route('news.index') }}"
               class="inline-flex items-center mb-12 transition-colors"
               style="color:#e9c349; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; text-decoration:none;"
               onmouseover="this.style.color='#ffe088'" onmouseout="this.style.color='#e9c349'">
                <span class="material-symbols-outlined mr-2" style="font-size:16px;">arrow_back</span>
                Back to News
            </a>

            @if($news->image_path)
            <div class="relative overflow-hidden group mb-12" style="width:100%; aspect-ratio:21/9; background:#111415;">
                <img src="{{ asset('storage/'.$news->image_path) }}" alt="{{ $news->title }}"
                     class="w-full h-full object-cover transition-transform duration-700"
                     onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                <div class="absolute inset-0" style="border:1px solid rgba(233,195,73,0.2); pointer-events:none;"></div>
            </div>
            @else
            <div class="relative overflow-hidden group mb-12 flex items-center justify-center" style="width:100%; aspect-ratio:21/9; background:linear-gradient(135deg,#1d2021,#282a2b); border:1px solid rgba(233,195,73,0.2);">
                <span class="material-symbols-outlined" style="font-size:80px; color:rgba(69,70,77,0.5);">newspaper</span>
            </div>
            @endif
        </div>

        {{-- Content --}}
        <div class="mx-auto pb-24" style="max-width:1280px; padding:0 32px 96px;">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                {{-- Article --}}
                <article class="lg:col-span-8 overflow-hidden" style="padding-right:0;">

                    <header class="mb-12 pb-8" style="border-bottom:1px solid rgba(233,195,73,0.2);">
                        <div class="flex items-center gap-4 mb-6" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:rgba(225,227,228,0.6);">
                            <span>{{ $news->created_at->format('d M Y') }}</span>
                            <span class="w-1 h-1 rounded-full" style="background:#e9c349;"></span>
                            <span>{{ $news->admin->name ?? 'Admin' }}</span>
                            <span class="w-1 h-1 rounded-full" style="background:#e9c349;"></span>
                            <span>{{ $news->isExternal() ? 'External' : 'Firm News' }}</span>
                        </div>

                        <h1 class="break-words" style="font-family:'Playfair Display',serif; font-size:clamp(32px,5vw,64px); line-height:1.1; font-weight:700; color:#e9c349; margin-bottom:24px; word-wrap:break-word;">
                            {{ $news->title }}
                        </h1>
                    </header>

                    {{-- Article Body --}}
                    <div class="article-content" style="color:rgba(225,227,228,0.9); font-size:18px; line-height:1.8; word-wrap:break-word; overflow-wrap:break-word; word-break:break-word;">
                        @foreach(explode("\n", str_replace("\r", "", $news->content ?? '')) as $para)
                            @if(str_starts_with(trim($para), '#'))
                                <h2 style="font-family:'Playfair Display',serif; font-size:28px; color:#e1e3e4; margin-top:32px; margin-bottom:16px;">{{ ltrim($para, '# ') }}</h2>
                            @elseif(trim($para) === '')
                                <br>
                            @else
                                <p style="margin-bottom:16px;">{{ $para }}</p>
                            @endif
                        @endforeach
                    </div>

                    {{-- Tags --}}
                    <div class="mt-12 pt-8 flex flex-wrap justify-between items-center gap-4"
                         style="border-top:1px solid rgba(233,195,73,0.2);">
                        <div class="flex gap-2">
                            <span class="px-3 py-1 text-sm" style="background:#1d2021; border:1px solid rgba(69,70,77,0.3); color:rgba(225,227,228,0.7); font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase;">
                                {{ $news->isExternal() ? 'External' : 'Internal' }}
                            </span>
                            <span class="px-3 py-1 text-sm" style="background:#1d2021; border:1px solid rgba(69,70,77,0.3); color:rgba(225,227,228,0.7); font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase;">
                                D'Mahesa
                            </span>
                        </div>
                        <div class="flex items-center gap-4" style="color:#e9c349;">
                            <span style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:rgba(225,227,228,0.5);">Share</span>
                            <button style="color:#e9c349; cursor:pointer;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#e9c349'">
                                <span class="material-symbols-outlined">share</span>
                            </button>
                        </div>
                    </div>
                </article>

                {{-- Sidebar --}}
                <aside class="lg:col-span-4 mt-16 lg:mt-0">
                    <div class="sticky top-32">

                        {{-- Consultation Widget --}}
                        <div class="p-8 mb-8 relative overflow-hidden group"
                             style="background:#111415; border:1px solid rgba(233,195,73,0.2);">
                            <div class="absolute inset-0 opacity-0 transition-opacity duration-500 group-hover:opacity-100"
                                 style="background:linear-gradient(135deg, rgba(233,195,73,0.05), transparent); pointer-events:none;"></div>
                            <h3 class="relative z-10 mb-4" style="font-family:'Playfair Display',serif; font-size:32px; font-weight:600; color:#e9c349;">Strategic Counsel</h3>
                            <p class="relative z-10 mb-8" style="font-size:16px; line-height:24px; color:rgba(225,227,228,0.8);">
                                Require sophisticated legal representation? Our senior partners are available for confidential consultations.
                            </p>
                            <a href="{{ route('contact') }}"
                               class="w-full flex items-center justify-center gap-2 relative z-10 transition-all duration-300"
                               style="border:1px solid #e9c349; color:#e9c349; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; padding:16px; text-decoration:none;"
                               onmouseover="this.style.background='#e9c349'; this.style.color='#0b132b'"
                               onmouseout="this.style.background='transparent'; this.style.color='#e9c349'">
                                Request Consultation
                                <span class="material-symbols-outlined" style="font-size:16px;">arrow_forward</span>
                            </a>
                        </div>

                        {{-- Related News --}}
                        @if($relatedNews->count() > 0)
                        <div class="pt-8">
                            <h4 class="mb-6 pb-2" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:rgba(225,227,228,0.5); border-bottom:1px solid rgba(233,195,73,0.2);">Related Insights</h4>
                            <div class="flex flex-col gap-6">
                                @foreach($relatedNews as $related)
                                <a href="{{ route('news.show', $related) }}" class="group block" style="text-decoration:none;">
                                    <span style="color:#e9c349; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; display:block; margin-bottom:4px;">
                                        {{ $related->created_at->format('d M Y') }}
                                    </span>
                                    <h5 style="font-family:'Playfair Display',serif; font-size:20px; line-height:1.3; color:#e1e3e4; transition:color 0.3s;"
                                        onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#e1e3e4'">
                                        {{ $related->title }}
                                    </h5>
                                </a>
                                @if(!$loop->last)<div style="height:1px; background:rgba(69,70,77,0.2);"></div>@endif
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </aside>

            </div>
        </div>
    </main>
</div>
@endsection
