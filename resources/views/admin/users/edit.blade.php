@extends('layouts.admin')

@section('title', "Edit User - D'Mahesa")
@section('page-title', 'Edit User Data')

@section('content')

<div class="max-w-2xl">
    <div class="p-8 shadow-2xl" style="background:rgba(28,37,65,0.7); border:1px solid rgba(69,70,77,0.3); border-radius:4px;">
        
        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="flex flex-col gap-6">
            @csrf
            @method('PUT')
            
            {{-- Nama Lengkap --}}
            <div class="flex flex-col gap-2">
                <label for="name" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                       class="w-full px-4 py-3 outline-none transition-colors"
                       style="background:rgba(11,19,43,0.6); border:1px solid rgba(69,70,77,0.5); color:#e1e3e4; font-family:'Inter',sans-serif;"
                       onfocus="this.style.borderColor='#e9c349'" onblur="this.style.borderColor='rgba(69,70,77,0.5)'">
                @error('name')
                    <span class="text-xs" style="color:#ffb4ab;">{{ $message }}</span>
                @enderror
            </div>
            
            {{-- Email --}}
            <div class="flex flex-col gap-2">
                <label for="email" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                       class="w-full px-4 py-3 outline-none transition-colors"
                       style="background:rgba(11,19,43,0.6); border:1px solid rgba(69,70,77,0.5); color:#e1e3e4; font-family:'Inter',sans-serif;"
                       onfocus="this.style.borderColor='#e9c349'" onblur="this.style.borderColor='rgba(69,70,77,0.5)'">
                @error('email')
                    <span class="text-xs" style="color:#ffb4ab;">{{ $message }}</span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="flex flex-col gap-2 pt-4" style="border-top:1px dashed rgba(69,70,77,0.5);">
                <p style="font-size:11px; color:#c6c6ce; margin-bottom:-4px;">Biarkan kosong jika tidak ingin mengubah password.</p>
                <label for="password" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Password Baru</label>
                <input type="password" id="password" name="password" minlength="8"
                       class="w-full px-4 py-3 outline-none transition-colors"
                       style="background:rgba(11,19,43,0.6); border:1px solid rgba(69,70,77,0.5); color:#e1e3e4; font-family:'Inter',sans-serif;"
                       onfocus="this.style.borderColor='#e9c349'" onblur="this.style.borderColor='rgba(69,70,77,0.5)'">
                @error('password')
                    <span class="text-xs" style="color:#ffb4ab;">{{ $message }}</span>
                @enderror
            </div>

            {{-- Konfirmasi Password --}}
            <div class="flex flex-col gap-2">
                <label for="password_confirmation" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce;">Konfirmasi Password Baru</label>
                <input type="password" id="password_confirmation" name="password_confirmation" minlength="8"
                       class="w-full px-4 py-3 outline-none transition-colors"
                       style="background:rgba(11,19,43,0.6); border:1px solid rgba(69,70,77,0.5); color:#e1e3e4; font-family:'Inter',sans-serif;"
                       onfocus="this.style.borderColor='#e9c349'" onblur="this.style.borderColor='rgba(69,70,77,0.5)'">
            </div>

            {{-- Role --}}
            <div class="flex items-center gap-3 mt-2">
                @php
                    $isDisabled = Auth::id() === $user->id; 
                    $isChecked = old('is_admin', $user->is_admin);
                @endphp
                <input type="checkbox" id="is_admin" name="is_admin" value="1" 
                       {{ $isChecked ? 'checked' : '' }} 
                       {{ $isDisabled ? 'disabled' : '' }}
                       class="w-5 h-5 accent-[#e9c349] cursor-pointer" style="background:rgba(11,19,43,0.6); border:1px solid rgba(69,70,77,0.5);">
                
                @if($isDisabled && $isChecked)
                    <input type="hidden" name="is_admin" value="1">
                @endif
                
                <div class="flex flex-col">
                    <label for="is_admin" class="{{ $isDisabled ? 'cursor-not-allowed opacity-50' : 'cursor-pointer' }}" style="font-size:14px; font-weight:600; color:#e1e3e4;">
                        Berikan hak akses Admin
                    </label>
                    @if($isDisabled)
                    <span style="font-size:11px; color:#e9c349;">You cannot remove your own admin privileges.</span>
                    @endif
                </div>
            </div>
            
            {{-- Submit --}}
            <div class="pt-6 border-t mt-2 flex items-center justify-between" style="border-color:rgba(69,70,77,0.3);">
                <a href="{{ route('admin.users.index') }}"
                   class="flex items-center gap-2 font-bold transition-colors"
                   style="border:1px solid rgba(69,70,77,0.4); color:#c6c6ce; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; padding:16px 24px; text-decoration:none;"
                   onmouseover="this.style.borderColor='rgba(233,195,73,0.4)'" onmouseout="this.style.borderColor='rgba(69,70,77,0.4)'">Cancel</a>

                <button type="submit"
                        class="flex items-center gap-2 font-bold transition-colors"
                        style="background:#e9c349; color:#0b132b; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; padding:16px 32px;"
                        onmouseover="this.style.background='#ffe088'" onmouseout="this.style.background='#e9c349'">
                    <span class="material-symbols-outlined" style="font-size:18px;">save</span> Update User
                </button>
            </div>
        </form>
        
    </div>
</div>

@endsection
