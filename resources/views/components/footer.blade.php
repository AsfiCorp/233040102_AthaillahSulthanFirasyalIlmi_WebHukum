{{-- Footer --}}
<footer class="w-full pt-24 pb-10" style="background-color:#111415; border-top:1px solid rgba(69,70,77,0.3); color:#e9c349; font-family:'Inter',sans-serif; font-size:16px; line-height:24px;">
    <div class="mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 mb-12" style="max-width:1280px; padding:0 32px;">

        {{-- Brand Column --}}
        <div class="md:col-span-1">
            <div class="flex items-center gap-3 font-bold mb-4" style="font-family:'Playfair Display',serif; font-size:40px; line-height:48px; color:#e9c349;">
                <img src="{{ setting('logo') ? \Storage::url(setting('logo')) : asset('images/logo.jpeg') }}" alt="Logo" style="height:48px; width:auto; object-fit:contain; border-radius:4px;">
                <span>{{ setting('brand_name', 'D\'MAHESA') }}</span>
            </div>
            <p style="color:#c6c6ce; font-size:16px; line-height:24px; margin-bottom:24px;">
                {{ setting('footer_desc', 'Elevating legal strategy with precision and authority.') }}
            </p>
            <div class="flex gap-4">
                @if(setting('social_linkedin'))
                <a href="{{ setting('social_linkedin') }}" target="_blank" rel="noopener noreferrer" style="color:#c6c6ce; transition:color 0.3s;" onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">
                    <span class="material-symbols-outlined">work</span>
                </a>
                @endif
                @if(setting('social_instagram'))
                <a href="{{ setting('social_instagram') }}" target="_blank" rel="noopener noreferrer" style="color:#c6c6ce; transition:color 0.3s;" onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">
                    <span class="material-symbols-outlined">photo_camera</span>
                </a>
                @endif
                @if(setting('social_facebook'))
                <a href="{{ setting('social_facebook') }}" target="_blank" rel="noopener noreferrer" style="color:#c6c6ce; transition:color 0.3s;" onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">
                    <span class="material-symbols-outlined">public</span>
                </a>
                @endif
            </div>
        </div>

        {{-- Firm Links --}}
        <div>
            <h4 class="mb-6" style="font-size:12px; line-height:16px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#e1e3e4;">Firm</h4>
            <ul class="space-y-4">
                @for ($i = 1; $i <= 3; $i++)
                @php
                    $text = setting("footer_firm_text_{$i}", ['About Us', 'Our Attorneys', 'News & Insights'][$i-1]);
                    $url = setting("footer_firm_url_{$i}", [route('home'), route('advocates.index'), route('news.index')][$i-1]);
                @endphp
                @if($text)
                <li><a href="{{ $url }}" style="color:#c6c6ce; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">{{ $text }}</a></li>
                @endif
                @endfor
            </ul>
        </div>

        {{-- Legal Links --}}
        <div>
            <h4 class="mb-6" style="font-size:12px; line-height:16px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#e1e3e4;">Legal</h4>
            <ul class="space-y-4">
                @for ($i = 1; $i <= 3; $i++)
                @php
                    $text = setting("footer_legal_text_{$i}", ['Privacy Policy', 'Terms of Service', 'Disclosures'][$i-1]);
                    $url = setting("footer_legal_url_{$i}", '#');
                @endphp
                @if($text)
                <li><a href="{{ $url }}" style="color:#c6c6ce; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">{{ $text }}</a></li>
                @endif
                @endfor
            </ul>
        </div>

        {{-- Contact --}}
        <div>
            <h4 class="mb-6" style="font-size:12px; line-height:16px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#e1e3e4;">Contact</h4>
            <ul class="space-y-4">
                <li><a href="{{ route('contact') }}" style="color:#c6c6ce; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">Contact Us</a></li>
                <li class="flex items-center gap-2" style="color:#c6c6ce;">
                    <span class="material-symbols-outlined" style="font-size:16px;">location_on</span>
                    {{ setting('footer_location', 'Jakarta, Indonesia') }}
                </li>
                <li class="flex items-center gap-2" style="color:#c6c6ce;">
                    <span class="material-symbols-outlined" style="font-size:16px;">mail</span>
                    {{ setting('footer_email', 'inquiries@dmahesa.com') }}
                </li>
            </ul>
        </div>
    </div>

    {{-- Copyright --}}
    <div class="mx-auto pt-8 flex flex-col md:flex-row justify-between items-center" style="max-width:1280px; padding:32px 32px 0; border-top:1px solid rgba(69,70,77,0.3); color:#c6c6ce; font-size:14px;">
        <p>© {{ date('Y') }} {{ setting('footer_copyright', 'D\'Mahesa Legal Group. All Rights Reserved.') }}</p>
    </div>
</footer>
