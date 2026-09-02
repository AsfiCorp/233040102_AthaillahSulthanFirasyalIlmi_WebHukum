@extends('layouts.admin')

@section('title', "Manage Users - D'Mahesa")
@section('page-title', 'Manage Users')

@section('content')

<div>
    <div class="flex items-center justify-between mb-6">
        <h2 style="font-family:'Playfair Display',serif; font-size:32px; line-height:40px; font-weight:600; color:#e1e3e4;">Daftar Pengguna</h2>
        <a href="{{ route('admin.users.create') }}"
           class="flex items-center gap-2 px-6 py-3 font-bold transition-colors"
           style="background:#e9c349; color:#0b132b; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; text-decoration:none;"
           onmouseover="this.style.background='#ffe088'" onmouseout="this.style.background='#e9c349'">
            <span class="material-symbols-outlined" style="font-size:18px;">add</span>
            Tambah Pengguna
        </a>
    </div>

    <div class="overflow-hidden" style="border:1px solid rgba(69,70,77,0.2);">
        <table class="w-full text-left">
            <thead>
                <tr style="background:#0b132b;">
                    <th class="px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Nama</th>
                    <th class="px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Email</th>
                    <th class="px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Peran</th>
                    <th class="px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Bergabung</th>
                    <th class="px-6 py-4" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; width:150px;">Aksi</th>
                </tr>
            </thead>
            <tbody style="background:#1c2541;">
                @forelse($users as $user)
                <tr style="border-top:1px solid rgba(69,70,77,0.2); transition:background 0.2s;"
                    onmouseover="this.style.background='rgba(11,19,43,0.5)'" onmouseout="this.style.background='transparent'">
                    <td class="px-6 py-4">
                        <span style="font-size:16px; line-height:24px; color:#e1e3e4; font-weight:600;">{{ $user->name }}</span>
                        @if(Auth::id() === $user->id)
                            <span class="ml-2 px-2 py-0.5 text-xs rounded-full" style="background:rgba(233,195,73,0.2); color:#e9c349;">Anda</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm" style="color:#c6c6ce;">{{ $user->email }}</td>
                    <td class="px-6 py-4">
                        @if($user->is_admin || $user->email === 'admin@dmahesa.com')
                            <span class="px-2 py-1" style="font-size:11px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; background:#e9c349; color:#3c2f00;">Admin</span>
                        @else
                            <span class="px-2 py-1" style="font-size:11px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; border:1px solid #c6c6ce; color:#c6c6ce;">User</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm" style="color:#767e9b;">{{ $user->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('admin.users.edit', $user) }}"
                               style="color:#bec5e5; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; text-decoration:none; transition:color 0.2s;"
                               onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#bec5e5'">
                                Edit
                            </a>
                            
                            @if(Auth::id() !== $user->id)
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini? Tindakan ini tidak dapat dibatalkan.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        style="color:#ffb4ab; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; text-decoration:none; transition:color 0.2s; background:transparent; border:none; cursor:pointer;"
                                        onmouseover="this.style.color='#ff6b6b'" onmouseout="this.style.color='#ffb4ab'">
                                    Hapus
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center" style="color:#c6c6ce;">Tidak ada data pengguna.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
