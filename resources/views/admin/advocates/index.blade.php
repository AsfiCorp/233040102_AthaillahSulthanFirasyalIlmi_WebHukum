@extends('layouts.admin')

@section('title', "Manage Advocates - Admin")
@section('page-title', 'Manage Advocates')

@section('content')

{{-- Header Actions --}}
<div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between">
    {{-- Search --}}
    <form method="GET" action="{{ route('admin.advocates.index') }}" class="flex gap-3 w-full sm:w-auto">
        <div class="relative flex-1 sm:w-72">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2" style="color:#c6c6ce; font-size:18px;">search</span>
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Search advocates..."
                   class="w-full pl-10 pr-4 py-2 text-sm"
                   style="background:#1c2541; border:1px solid rgba(69,70,77,0.3); color:#e1e3e4; font-size:16px;"
                   onfocus="this.style.borderColor='rgba(233,195,73,0.5)'" onblur="this.style.borderColor='rgba(69,70,77,0.3)'">
        </div>
        <button type="submit" class="px-4 py-2 transition-colors"
                style="background:#e9c349; color:#0b132b; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase;"
                onmouseover="this.style.background='#ffe088'" onmouseout="this.style.background='#e9c349'">
            Search
        </button>
        @if(request('search'))
        <a href="{{ route('admin.advocates.index') }}"
           class="px-4 py-2 transition-colors"
           style="background:transparent; border:1px solid rgba(69,70,77,0.3); color:#c6c6ce; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; text-decoration:none;"
           onmouseover="this.style.borderColor='rgba(233,195,73,0.4)'" onmouseout="this.style.borderColor='rgba(69,70,77,0.3)'">
            Clear
        </a>
        @endif
    </form>

    <a href="{{ route('admin.advocates.create') }}"
       class="flex items-center gap-2 px-6 py-2 font-bold transition-colors flex-shrink-0"
       style="background:#e9c349; color:#0b132b; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; text-decoration:none;"
       onmouseover="this.style.background='#ffe088'" onmouseout="this.style.background='#e9c349'">
        <span class="material-symbols-outlined" style="font-size:18px;">add</span>
        Add Advocate
    </a>
</div>

{{-- Table --}}
<div class="overflow-x-auto" style="border:1px solid rgba(69,70,77,0.2);">
    <table class="w-full">
        <thead>
            <tr style="background:#0b132b;">
                <th class="text-left px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Photo</th>
                <th class="text-left px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Name</th>
                <th class="text-left px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Role</th>
                <th class="text-left px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Bio Excerpt</th>
                <th class="text-left px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Actions</th>
            </tr>
        </thead>
        <tbody style="background:#1c2541;">
            @forelse($advocates as $advocate)
            <tr style="border-top:1px solid rgba(69,70,77,0.2); transition:background 0.2s;"
                onmouseover="this.style.background='rgba(11,19,43,0.5)'" onmouseout="this.style.background='transparent'">
                <td class="px-6 py-4">
                    <div class="w-14 h-14 overflow-hidden" style="border-radius:4px; background:#191c1d;">
                        @if($advocate->image_path)
                            <img src="{{ \Storage::url($advocate->image_path) }}" alt="{{ $advocate->name }}"
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="material-symbols-outlined" style="font-size:28px; color:#45464d;">person</span>
                            </div>
                        @endif
                    </div>
                </td>
                <td class="px-6 py-4">
                    <span style="font-size:16px; line-height:24px; font-weight:600; color:#e1e3e4; font-family:'Playfair Display',serif;">{{ $advocate->name }}</span>
                </td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1" style="border:1px solid #e9c349; color:#e9c349; font-size:11px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase;">{{ $advocate->role }}</span>
                </td>
                <td class="px-6 py-4" style="color:#c6c6ce; font-size:14px; max-width:256px;">
                    {{ Str::limit($advocate->short_story, 80) ?? '—' }}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-4">
                        <a href="{{ route('admin.advocates.edit', $advocate) }}"
                           style="color:#bec5e5; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; text-decoration:none; transition:color 0.2s;"
                           onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#bec5e5'">
                            <span class="material-symbols-outlined" style="font-size:18px; vertical-align:middle; margin-right:4px;">edit</span>Edit
                        </a>
                        <form method="POST" action="{{ route('admin.advocates.destroy', $advocate) }}"
                              onsubmit="return confirm('Delete advocate {{ $advocate->name }}? This action cannot be undone.')">
                            @csrf @method('DELETE')
                            <button type="submit"
                                    style="color:rgba(255,180,171,0.7); font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; background:none; border:none; cursor:pointer; transition:color 0.2s;"
                                    onmouseover="this.style.color='#ffb4ab'" onmouseout="this.style.color='rgba(255,180,171,0.7)'">
                                <span class="material-symbols-outlined" style="font-size:18px; vertical-align:middle; margin-right:4px;">delete</span>Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-12" style="color:#c6c6ce;">
                    <span class="material-symbols-outlined" style="font-size:48px; display:block; margin-bottom:8px; color:#45464d;">gavel</span>
                    No advocates found.
                    @if(request('search'))<a href="{{ route('admin.advocates.index') }}" style="color:#e9c349;">Clear search</a>@endif
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Pagination --}}
@if($advocates->hasPages())
<div class="mt-6 flex justify-center">
    {{ $advocates->links() }}
</div>
@endif

@endsection
