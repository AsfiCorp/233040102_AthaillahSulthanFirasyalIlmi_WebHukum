@extends('layouts.admin')

@section('title', 'Web Settings')
@section('header', 'Web Settings (UI & Content)')

@section('content')

@if(session('success'))
    <div class="mb-4 bg-green-900/50 border border-green-500 text-green-200 px-4 py-3 rounded">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
    @csrf
    @method('PUT')

    {{-- HEADER / NAVBAR SETTINGS --}}
    <div class="bg-slate-800 rounded-lg border border-slate-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-700 bg-slate-900/50">
            <h2 class="text-lg font-semibold text-white">Header & Navigasi</h2>
        </div>
        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-300 mb-2">Logo Website (Opsional, max 2MB)</label>
                    <div class="flex items-center gap-4">
                        @if(isset($settings['logo']))
                        <div class="bg-slate-900 p-2 rounded-lg border border-slate-700 h-16 flex items-center justify-center">
                            <img src="{{ \Storage::url($settings['logo']) }}" alt="Current Logo" class="h-10 w-auto object-contain">
                        </div>
                        @endif
                        <input type="file" name="logo" accept="image/*" class="flex-1 bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-500 file:text-slate-900 hover:file:bg-amber-600">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Nama Brand (Logo Text)</label>
                    <input type="text" name="brand_name" value="{{ $settings['brand_name'] ?? 'D\'MAHESA' }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Teks Tombol WhatsApp</label>
                    <input type="text" name="wa_btn_text" value="{{ $settings['wa_btn_text'] ?? 'WhatsApp Consultation' }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-300 mb-2">Link WhatsApp (URL)</label>
                    <input type="text" name="wa_btn_url" value="{{ $settings['wa_btn_url'] ?? 'https://wa.me/#' }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
                </div>
            </div>
        </div>
    </div>

    {{-- HERO SETTINGS --}}
    <div class="bg-slate-800 rounded-lg border border-slate-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-700 bg-slate-900/50">
            <h2 class="text-lg font-semibold text-white">Beranda: Hero Section</h2>
        </div>
        <div class="p-6 space-y-6">
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Background Hero (Opsional, max 5MB)</label>
                @if(isset($settings['hero_bg']))
                <div class="mb-3 w-full h-32 bg-slate-900 rounded-lg border border-slate-700 overflow-hidden relative">
                    <img src="{{ \Storage::url($settings['hero_bg']) }}" alt="Hero Background" class="w-full h-full object-cover opacity-50">
                </div>
                @endif
                <input type="file" name="hero_bg" accept="image/*" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-500 file:text-slate-900 hover:file:bg-amber-600">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Judul Utama (Gunakan <br> untuk baris baru)</label>
                <textarea name="hero_title" rows="3" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">{{ $settings['hero_title'] ?? "Keadilan\nIntegritas\nProfesionalisme" }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Sub Judul / Deskripsi</label>
                <textarea name="hero_subtitle" rows="2" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">{{ $settings['hero_subtitle'] ?? 'Uncompromising legal expertise for those who demand excellence.' }}</textarea>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Teks Tombol Kiri</label>
                    <input type="text" name="hero_btn1_text" value="{{ $settings['hero_btn1_text'] ?? 'Meet Our Team' }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Link Tombol Kiri (URL/Route)</label>
                    <input type="text" name="hero_btn1_url" value="{{ $settings['hero_btn1_url'] ?? route('advocates.index') }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Teks Tombol Kanan</label>
                    <input type="text" name="hero_btn2_text" value="{{ $settings['hero_btn2_text'] ?? 'News & Insights' }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Link Tombol Kanan (URL/Route)</label>
                    <input type="text" name="hero_btn2_url" value="{{ $settings['hero_btn2_url'] ?? route('news.index') }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
                </div>
            </div>
        </div>
    </div>

    {{-- SERVICES SETTINGS --}}
    <div class="bg-slate-800 rounded-lg border border-slate-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-700 bg-slate-900/50">
            <h2 class="text-lg font-semibold text-white">Beranda: Layanan Kami</h2>
        </div>
        <div class="p-6 space-y-8">
            @for ($i = 1; $i <= 3; $i++)
            <div class="p-4 border border-slate-700 rounded bg-slate-800/50">
                <h3 class="text-md font-medium text-amber-500 mb-4">Layanan {{ $i }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1">Nama Ikon (Google Material)</label>
                        <input type="text" name="service_{{ $i }}_icon" value="{{ $settings["service_{$i}_icon"] ?? ['gavel', 'balance', 'business_center'][$i-1] }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1">Judul Layanan</label>
                        <input type="text" name="service_{{ $i }}_title" value="{{ $settings["service_{$i}_title"] ?? ['Litigasi Korporat', 'Arbitrase Internasional', 'Hukum Bisnis'][$i-1] }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-300 mb-1">Deskripsi Layanan</label>
                        <textarea name="service_{{ $i }}_desc" rows="2" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">{{ $settings["service_{$i}_desc"] ?? ['Pertahanan strategis...', 'Penyelesaian sengketa...', 'Konsultasi komprehensif...'][$i-1] }}</textarea>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>

    {{-- FOOTER SETTINGS --}}
    <div class="bg-slate-800 rounded-lg border border-slate-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-700 bg-slate-900/50">
            <h2 class="text-lg font-semibold text-white">Footer</h2>
        </div>
        <div class="p-6 space-y-6">
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Deskripsi Singkat Footer</label>
                <textarea name="footer_desc" rows="2" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">{{ $settings['footer_desc'] ?? 'Elevating legal strategy with precision and authority.' }}</textarea>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Alamat / Lokasi</label>
                    <input type="text" name="footer_location" value="{{ $settings['footer_location'] ?? 'Jakarta, Indonesia' }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Email Kontak</label>
                    <input type="text" name="footer_email" value="{{ $settings['footer_email'] ?? 'inquiries@dmahesa.com' }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-300 mb-2">Teks Hak Cipta (Copyright)</label>
                    <input type="text" name="footer_copyright" value="{{ $settings['footer_copyright'] ?? 'D\'Mahesa Legal Group. All Rights Reserved.' }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
                </div>
            </div>

            <hr class="border-slate-700 my-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Firm Links --}}
                <div>
                    <h3 class="text-md font-medium text-amber-500 mb-4">Firm Links</h3>
                    @for ($i = 1; $i <= 3; $i++)
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="footer_firm_text_{{ $i }}" value="{{ $settings["footer_firm_text_{$i}"] ?? ['About Us', 'Our Attorneys', 'News & Insights'][$i-1] }}" placeholder="Teks Link {{ $i }}" class="w-1/2 bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white text-sm focus:outline-none focus:border-amber-500">
                        <input type="text" name="footer_firm_url_{{ $i }}" value="{{ $settings["footer_firm_url_{$i}"] ?? [route('home'), route('advocates.index'), route('news.index')][$i-1] }}" placeholder="URL {{ $i }}" class="w-1/2 bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white text-sm focus:outline-none focus:border-amber-500">
                    </div>
                    @endfor
                </div>
                {{-- Legal Links --}}
                <div>
                    <h3 class="text-md font-medium text-amber-500 mb-4">Legal Links</h3>
                    @for ($i = 1; $i <= 3; $i++)
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="footer_legal_text_{{ $i }}" value="{{ $settings["footer_legal_text_{$i}"] ?? ['Privacy Policy', 'Terms of Service', 'Disclosures'][$i-1] }}" placeholder="Teks Link {{ $i }}" class="w-1/2 bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white text-sm focus:outline-none focus:border-amber-500">
                        <input type="text" name="footer_legal_url_{{ $i }}" value="{{ $settings["footer_legal_url_{$i}"] ?? '#' }}" placeholder="URL {{ $i }}" class="w-1/2 bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white text-sm focus:outline-none focus:border-amber-500">
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

    {{-- CONTACT PAGE SETTINGS --}}
    <div class="bg-slate-800 rounded-lg border border-slate-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-700 bg-slate-900/50">
            <h2 class="text-lg font-semibold text-white">Contact Page</h2>
        </div>
        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-300 mb-2">Contact Us Title</label>
                    <input type="text" name="contact_title" value="{{ $settings['contact_title'] ?? 'Contact Us' }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-300 mb-2">Contact Us Description</label>
                    <textarea name="contact_desc" rows="2" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">{{ $settings['contact_desc'] ?? 'Schedule a confidential consultation with our legal experts. We represent high-net-worth individuals and corporate entities with uncompromising expertise.' }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">WhatsApp Card Title</label>
                    <input type="text" name="contact_wa_title" value="{{ $settings['contact_wa_title'] ?? 'Instant Support' }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">WhatsApp Card Description</label>
                    <textarea name="contact_wa_desc" rows="2" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">{{ $settings['contact_wa_desc'] ?? 'Connect directly with our client relations team via WhatsApp for immediate assistance.' }}</textarea>
                </div>
            </div>
        </div>
    </div>

    {{-- SOCIAL MEDIA SETTINGS --}}
    <div class="bg-slate-800 rounded-lg border border-slate-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-700 bg-slate-900/50">
            <h2 class="text-lg font-semibold text-white">Social Media Links (Footer)</h2>
        </div>
        <div class="p-6 space-y-6">
            <p class="text-xs text-slate-400">Biarkan kosong jika Anda tidak ingin menampilkannya di footer.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">LinkedIn URL</label>
                    <input type="url" name="social_linkedin" value="{{ $settings['social_linkedin'] ?? '' }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Instagram URL</label>
                    <input type="url" name="social_instagram" value="{{ $settings['social_instagram'] ?? '' }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Facebook URL</label>
                    <input type="url" name="social_facebook" value="{{ $settings['social_facebook'] ?? '' }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
                </div>
            </div>
        </div>
    </div>

    {{-- SEO SETTINGS --}}
    <div class="bg-slate-800 rounded-lg border border-slate-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-700 bg-slate-900/50">
            <h2 class="text-lg font-semibold text-white">Global SEO Meta Tags</h2>
        </div>
        <div class="p-6 space-y-6">
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Default Meta Title</label>
                <input type="text" name="seo_title" value="{{ $settings['seo_title'] ?? 'D\'Mahesa Legal Group - Keadilan | Integritas | Profesionalisme' }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Default Meta Description</label>
                <textarea name="seo_description" rows="2" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">{{ $settings['seo_description'] ?? 'D\'Mahesa Legal Group — Kantor hukum terkemuka yang menghadirkan keadilan, integritas, dan profesionalisme.' }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Meta Keywords (pisahkan dengan koma)</label>
                <input type="text" name="seo_keywords" value="{{ $settings['seo_keywords'] ?? 'law firm, dmahesa, hukum, advokat jakarta, pengacara' }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-amber-500">
            </div>
        </div>
    </div>
    <div class="flex justify-end">
        <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-slate-900 font-semibold py-3 px-8 rounded-lg shadow transition-colors flex items-center gap-2">
            <span class="material-symbols-outlined" style="font-size:18px;">save</span>
            Save Settings
        </button>
    </div>
</form>
@endsection
