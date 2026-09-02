@extends('layouts.admin')

@section('title', "Manage News - Admin")
@section('page-title', 'Manage News')

@section('content')

{{-- Header Actions --}}
<div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between">
    <form method="GET" action="{{ route('admin.news.index') }}" class="flex gap-3 w-full sm:w-auto">
        <div class="relative flex-1 sm:w-72">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2" style="color:#c6c6ce; font-size:18px;">search</span>
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Search articles..."
                   class="w-full pl-10 pr-4 py-2"
                   style="background:#1c2541; border:1px solid rgba(69,70,77,0.3); color:#e1e3e4; font-size:16px;"
                   onfocus="this.style.borderColor='rgba(233,195,73,0.5)'" onblur="this.style.borderColor='rgba(69,70,77,0.3)'">
        </div>
        <button type="submit" class="px-4 py-2 transition-colors"
                style="background:#e9c349; color:#0b132b; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase;"
                onmouseover="this.style.background='#ffe088'" onmouseout="this.style.background='#e9c349'">Search</button>
        @if(request('search'))
        <a href="{{ route('admin.news.index') }}"
           class="px-4 py-2 transition-colors"
           style="border:1px solid rgba(69,70,77,0.3); color:#c6c6ce; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; text-decoration:none;"
           onmouseover="this.style.borderColor='rgba(233,195,73,0.4)'" onmouseout="this.style.borderColor='rgba(69,70,77,0.3)'">Clear</a>
        @endif
    </form>

    <a href="{{ route('admin.news.create') }}"
       class="flex items-center gap-2 px-6 py-2 font-bold transition-colors flex-shrink-0"
       style="background:#e9c349; color:#0b132b; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; text-decoration:none;"
       onmouseover="this.style.background='#ffe088'" onmouseout="this.style.background='#e9c349'">
        <span class="material-symbols-outlined" style="font-size:18px;">add</span> New Article
    </a>
</div>

{{-- Table --}}
<div class="overflow-x-auto" style="border:1px solid rgba(69,70,77,0.2);">
    <table class="w-full">
        <thead>
            <tr style="background:#0b132b;">
                <th class="text-left px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Cover</th>
                <th class="text-left px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Title</th>
                <th class="text-left px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Type</th>
                <th class="text-left px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Author</th>
                <th class="text-left px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Date</th>
                <th class="text-left px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Actions</th>
            </tr>
        </thead>
        <tbody style="background:#1c2541;">
            @forelse($news as $item)
            <tr style="border-top:1px solid rgba(69,70,77,0.2); transition:background 0.2s;"
                onmouseover="this.style.background='rgba(11,19,43,0.5)'" onmouseout="this.style.background='transparent'">
                <td class="px-6 py-4">
                    <div style="width:64px; height:48px; overflow:hidden; background:#191c1d;">
                        @if($item->image_path)
                            <img src="{{ \Storage::url($item->image_path) }}" alt="{{ $item->title }}"
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="material-symbols-outlined" style="font-size:20px; color:#45464d;">newspaper</span>
                            </div>
                        @endif
                    </div>
                </td>
                <td class="px-6 py-4">
                    <span style="font-size:16px; font-weight:600; color:#e1e3e4; display:block; max-width:256px;">{{ Str::limit($item->title, 50) }}</span>
                    @if($item->isExternal())
                    <a href="{{ $item->external_url }}" target="_blank" style="color:#c6c6ce; font-size:12px; text-decoration:none; display:flex; align-items:center; gap:4px; margin-top:4px;"
                       onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">
                        {{ Str::limit($item->external_url, 40) }} <span class="material-symbols-outlined" style="font-size:12px;">open_in_new</span>
                    </a>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1" style="font-size:11px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase;
                          {{ $item->isExternal() ? 'background:#e9c349; color:#3c2f00;' : 'border:1px solid #e9c349; color:#e9c349;' }}">
                        {{ $item->type }}
                    </span>
                </td>
                <td class="px-6 py-4" style="color:#c6c6ce; font-size:14px;">{{ $item->admin->name ?? 'Admin' }}</td>
                <td class="px-6 py-4" style="color:#c6c6ce; font-size:14px;">{{ $item->created_at->format('d M Y') }}</td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-4">
                        @if(!$item->isExternal())
                        <a href="{{ route('news.show', $item) }}" target="_blank"
                           style="color:#767e9b; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; text-decoration:none; transition:color 0.2s;"
                           onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#767e9b'">
                            View
                        </a>
                        @endif
                        <a href="{{ route('admin.news.edit', $item) }}"
                           style="color:#bec5e5; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; text-decoration:none; transition:color 0.2s;"
                           onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#bec5e5'">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('admin.news.destroy', $item) }}"
                              onsubmit="return confirm('Delete this article? This action cannot be undone.')">
                            @csrf @method('DELETE')
                            <button type="submit"
                                    style="color:rgba(255,180,171,0.7); font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; background:none; border:none; cursor:pointer; transition:color 0.2s;"
                                    onmouseover="this.style.color='#ffb4ab'" onmouseout="this.style.color='rgba(255,180,171,0.7)'">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-12" style="color:#c6c6ce;">
                    <span class="material-symbols-outlined" style="font-size:48px; display:block; margin-bottom:8px; color:#45464d;">newspaper</span>
                    No articles found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($news->hasPages())
<div class="mt-6 flex justify-center">{{ $news->links() }}</div>
@endif

@endsection
