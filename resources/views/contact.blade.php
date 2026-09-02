@extends('layouts.app')

@section('title', "Contact Us - D'MAHESA Legal Group")
@section('meta-description', "Hubungi D'Mahesa Legal Group untuk konsultasi hukum yang profesional dan rahasia.")

@section('content')
<div style="background:#0b132b; padding-top:80px; min-height:100vh;">
    <main class="flex-grow mx-auto w-full" style="max-width:1280px; padding:128px 32px 120px;">

        {{-- Header --}}
        <div class="mb-20 md:w-8/12">
            <h1 style="font-family:'Playfair Display',serif; font-size:clamp(40px,6vw,64px); line-height:1.1; font-weight:700; color:#e1e3e4; margin-bottom:24px;">Contact Us</h1>
            <p style="font-size:18px; line-height:28px; color:#c6c6ce; max-width:672px;">
                Schedule a confidential consultation with our legal experts. We represent high-net-worth individuals and corporate entities with uncompromising expertise.
            </p>
        </div>

        @if(session('success'))
        <div class="mb-8 px-6 py-4" style="background:rgba(233,195,73,0.1); border:1px solid rgba(233,195,73,0.4); color:#e9c349;">
            {{ session('success') }}
        </div>
        @endif

        {{-- Bento Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">

            {{-- Contact Form --}}
            <div class="md:col-span-8 p-8 md:p-12 relative overflow-hidden"
                 style="background:#1c2541; border:1px solid rgba(233,195,73,0.3);">
                <h2 class="mb-8" style="font-family:'Playfair Display',serif; font-size:40px; line-height:48px; font-weight:600; color:#e1e3e4;">Submit Inquiry</h2>

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-8">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="flex flex-col">
                            <label for="full_name" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">Full Name</label>
                            <input type="text" id="full_name" name="full_name" required value="{{ old('full_name') }}"
                                   class="bg-transparent border-0 py-2 input-border-focus"
                                   style="color:#e1e3e4; font-size:16px;">
                            @error('full_name')<span style="color:#ffb4ab; font-size:12px;">{{ $message }}</span>@enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="email" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">Email Address</label>
                            <input type="email" id="email" name="email" required value="{{ old('email') }}"
                                   class="bg-transparent border-0 py-2 input-border-focus"
                                   style="color:#e1e3e4; font-size:16px;">
                            @error('email')<span style="color:#ffb4ab; font-size:12px;">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <label for="phone" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">Phone Number</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                               class="bg-transparent border-0 py-2 input-border-focus"
                               style="color:#e1e3e4; font-size:16px;">
                    </div>
                    <div class="flex flex-col">
                        <label for="matter_summary" style="font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">Matter Summary</label>
                        <textarea id="matter_summary" name="matter_summary" required rows="4"
                                  class="bg-transparent border-0 py-2 input-border-focus resize-none"
                                  style="color:#e1e3e4; font-size:16px;">{{ old('matter_summary') }}</textarea>
                        @error('matter_summary')<span style="color:#ffb4ab; font-size:12px;">{{ $message }}</span>@enderror
                    </div>
                    <div class="pt-4">
                        <button type="submit"
                                class="inline-flex items-center gap-2 font-bold transition-colors duration-300"
                                style="background:#e9c349; color:#0b132b; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; padding:16px 32px;"
                                onmouseover="this.style.background='#ffe088'" onmouseout="this.style.background='#e9c349'">
                            Submit Inquiry
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </button>
                    </div>
                </form>
            </div>

            {{-- WhatsApp Card --}}
            <div class="md:col-span-4 flex flex-col gap-8">
                <div class="p-8 flex flex-col justify-between h-full"
                     style="background:#1c2541; border:1px solid rgba(233,195,73,0.3);">
                    <div class="mb-6">
                        <span class="material-symbols-outlined mb-4 block" style="font-size:40px; color:#e9c349; font-variation-settings:'FILL' 1;">chat</span>
                        <h3 style="font-family:'Playfair Display',serif; font-size:32px; font-weight:600; color:#e1e3e4; margin-bottom:8px;">Instant Support</h3>
                        <p style="font-size:16px; line-height:24px; color:#c6c6ce;">
                            Connect directly with our client relations team via WhatsApp for immediate assistance.
                        </p>
                    </div>
                    <a href="https://wa.me/#"
                       class="flex items-center justify-center gap-2 mt-auto transition-colors duration-300"
                       style="border:1px solid #e9c349; color:#e9c349; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; padding:16px 24px; text-decoration:none;"
                       onmouseover="this.style.background='rgba(233,195,73,0.1)'" onmouseout="this.style.background='transparent'">
                        Chat on WhatsApp
                        <span class="material-symbols-outlined">open_in_new</span>
                    </a>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
