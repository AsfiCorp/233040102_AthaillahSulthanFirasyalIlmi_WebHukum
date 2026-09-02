@extends('layouts.admin')

@section('title', "Admin Dashboard - D'Mahesa")
@section('page-title', 'Dashboard Overview')

@section('content')

{{-- Header Actions --}}
<div class="flex items-center justify-between mb-8">
    <h1 style="font-family:'Playfair Display',serif; font-size:32px; font-weight:600; color:#e1e3e4;">Dashboard Overview</h1>
    <a href="{{ route('admin.dashboard.report') }}"
       class="flex items-center gap-2 px-4 py-2 font-bold transition-colors shadow-lg"
       style="background:#e9c349; color:#0b132b; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; text-decoration:none; border-radius:4px;"
       onmouseover="this.style.background='#ffe088'" onmouseout="this.style.background='#e9c349'">
        <span class="material-symbols-outlined" style="font-size:18px;">picture_as_pdf</span>
        Download PDF Report
    </a>
</div>

{{-- Stats Row --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="p-6 flex flex-col gap-3 relative overflow-hidden group transition-all duration-300"
         style="background:#1c2541; border:1px solid rgba(69,70,77,0.2);"
         onmouseover="this.style.borderColor='rgba(233,195,73,0.4)'" onmouseout="this.style.borderColor='rgba(69,70,77,0.2)'">
        <span class="material-symbols-outlined" style="font-size:40px; color:#e9c349; font-variation-settings:'FILL' 1;">gavel</span>
        <p style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Total Advocates</p>
        <span style="font-family:'Playfair Display',serif; font-size:40px; font-weight:600; color:#e1e3e4;">{{ $advocatesCount }}</span>
    </div>

    <div class="p-6 flex flex-col gap-3 relative overflow-hidden group transition-all duration-300"
         style="background:#1c2541; border:1px solid rgba(69,70,77,0.2);"
         onmouseover="this.style.borderColor='rgba(233,195,73,0.4)'" onmouseout="this.style.borderColor='rgba(69,70,77,0.2)'">
        <span class="material-symbols-outlined" style="font-size:40px; color:#e9c349; font-variation-settings:'FILL' 1;">newspaper</span>
        <p style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Total Publications</p>
        <span style="font-family:'Playfair Display',serif; font-size:40px; font-weight:600; color:#e1e3e4;">{{ $newsCount }}</span>
    </div>

    <div class="p-6 flex flex-col gap-3 relative overflow-hidden group transition-all duration-300"
         style="background:#1c2541; border:1px solid rgba(69,70,77,0.2);"
         onmouseover="this.style.borderColor='rgba(233,195,73,0.4)'" onmouseout="this.style.borderColor='rgba(69,70,77,0.2)'">
        <span class="material-symbols-outlined" style="font-size:40px; color:#e9c349; font-variation-settings:'FILL' 1;">account_circle</span>
        <p style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Logged in as</p>
        <span style="font-size:16px; font-weight:600; color:#e1e3e4; line-height:1.3;">{{ Auth::user()->name }}</span>
    </div>

    <div class="p-6 flex flex-col gap-3 relative overflow-hidden group transition-all duration-300"
         style="background:#1c2541; border:1px solid rgba(69,70,77,0.2);"
         onmouseover="this.style.borderColor='rgba(233,195,73,0.4)'" onmouseout="this.style.borderColor='rgba(69,70,77,0.2)'">
        <span class="material-symbols-outlined" style="font-size:40px; color:#e9c349; font-variation-settings:'FILL' 1;">calendar_today</span>
        <p style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Today</p>
        <span style="font-size:14px; font-weight:600; color:#e1e3e4;">{{ now()->format('d M Y') }}</span>
    </div>
</div>

{{-- Recent Publications Table --}}
<div>
    <div class="flex items-center justify-between mb-6">
        <h2 style="font-family:'Playfair Display',serif; font-size:32px; line-height:40px; font-weight:600; color:#e1e3e4;">Recent Publications</h2>
        <a href="{{ route('admin.news.create') }}"
           class="flex items-center gap-2 px-6 py-3 font-bold transition-colors"
           style="background:#e9c349; color:#0b132b; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; text-decoration:none;"
           onmouseover="this.style.background='#ffe088'" onmouseout="this.style.background='#e9c349'">
            <span class="material-symbols-outlined" style="font-size:18px;">add</span>
            New Article
        </a>
    </div>

    <div class="overflow-hidden" style="border:1px solid rgba(69,70,77,0.2);">
        <table class="w-full">
            <thead>
                <tr style="background:#0b132b;">
                    <th class="text-left px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Title</th>
                    <th class="text-left px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Type</th>
                    <th class="text-left px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Date</th>
                    <th class="text-left px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Actions</th>
                </tr>
            </thead>
            <tbody style="background:#1c2541;">
                @forelse($recentNews as $item)
                <tr style="border-top:1px solid rgba(69,70,77,0.2); transition:background 0.2s;"
                    onmouseover="this.style.background='rgba(11,19,43,0.5)'" onmouseout="this.style.background='transparent'">
                    <td class="px-6 py-4">
                        <span style="font-size:16px; line-height:24px; color:#e1e3e4;">{{ Str::limit($item->title, 50) }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1" style="font-size:11px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase;
                              {{ $item->isExternal() ? 'background:#e9c349; color:#3c2f00;' : 'border:1px solid #e9c349; color:#e9c349;' }}">
                            {{ $item->type }}
                        </span>
                    </td>
                    <td class="px-6 py-4" style="color:#c6c6ce; font-size:14px;">{{ $item->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('admin.news.edit', $item) }}"
                               style="color:#bec5e5; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; text-decoration:none; transition:color 0.2s;"
                               onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#bec5e5'">
                                Edit
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center" style="color:#c6c6ce;">No publications yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Advocates Grid --}}
<div>
    <div class="flex items-center justify-between mb-6">
        <h2 style="font-family:'Playfair Display',serif; font-size:32px; line-height:40px; font-weight:600; color:#e1e3e4;">Our Advocates</h2>
        <a href="{{ route('admin.advocates.create') }}"
           class="flex items-center gap-2 px-6 py-3 font-bold transition-colors"
           style="background:#e9c349; color:#0b132b; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; text-decoration:none;"
           onmouseover="this.style.background='#ffe088'" onmouseout="this.style.background='#e9c349'">
            <span class="material-symbols-outlined" style="font-size:18px;">add</span>
            Add Advocate
        </a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        @forelse($advocates as $advocate)
        <div class="relative overflow-hidden transition-transform duration-300 group"
             style="background:#1c2541; border:1px solid rgba(69,70,77,0.2);"
             onmouseover="this.style.transform='translateY(-4px)'; this.style.borderColor='rgba(233,195,73,0.4)'"
             onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='rgba(69,70,77,0.2)'">
            <div style="aspect-ratio:3/4; overflow:hidden; background:#191c1d;">
                @if($advocate->image_path)
                    <img src="{{ asset('storage/'.$advocate->image_path) }}" alt="{{ $advocate->name }}"
                         class="w-full h-full object-cover" style="filter:grayscale(1); transition:filter 0.5s;"
                         onmouseover="this.style.filter='grayscale(0)'" onmouseout="this.style.filter='grayscale(1)'">
                @else
                    <div class="w-full h-full flex items-center justify-center" style="background:#1d2021;">
                        <span class="material-symbols-outlined" style="font-size:40px; color:#45464d;">person</span>
                    </div>
                @endif
            </div>
            <div class="p-3">
                <p style="font-size:14px; font-weight:600; color:#e1e3e4; margin-bottom:2px; font-family:'Playfair Display',serif;">{{ Str::limit($advocate->name, 20) }}</p>
                <p style="font-size:11px; letter-spacing:0.05em; text-transform:uppercase; color:#e9c349;">{{ $advocate->role }}</p>
            </div>
        </div>
        @empty
        <p class="col-span-6" style="color:#c6c6ce;">No advocates found.</p>
        @endforelse
    </div>
</div>

@endsection
