{{-- Footer --}}
<footer class="w-full pt-24 pb-10" style="background-color:#111415; border-top:1px solid rgba(69,70,77,0.3); color:#e9c349; font-family:'Inter',sans-serif; font-size:16px; line-height:24px;">
    <div class="mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 mb-12" style="max-width:1280px; padding:0 32px;">

        {{-- Brand Column --}}
        <div class="md:col-span-1">
            <div class="font-bold mb-4" style="font-family:'Playfair Display',serif; font-size:40px; line-height:48px; color:#e9c349;">D'MAHESA</div>
            <p style="color:#c6c6ce; font-size:16px; line-height:24px; margin-bottom:24px;">
                Elevating legal strategy with precision and authority.
            </p>
        </div>

        {{-- Firm Links --}}
        <div>
            <h4 class="mb-6" style="font-size:12px; line-height:16px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#e1e3e4;">Firm</h4>
            <ul class="space-y-4">
                <li><a href="{{ route('home') }}" style="color:#c6c6ce; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">About Us</a></li>
                <li><a href="{{ route('advocates.index') }}" style="color:#c6c6ce; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">Our Attorneys</a></li>
                <li><a href="{{ route('news.index') }}" style="color:#c6c6ce; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">News & Insights</a></li>
            </ul>
        </div>

        {{-- Legal Links --}}
        <div>
            <h4 class="mb-6" style="font-size:12px; line-height:16px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#e1e3e4;">Legal</h4>
            <ul class="space-y-4">
                <li><a href="#" style="color:#c6c6ce; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">Privacy Policy</a></li>
                <li><a href="#" style="color:#c6c6ce; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">Terms of Service</a></li>
                <li><a href="#" style="color:#c6c6ce; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">Disclosures</a></li>
            </ul>
        </div>

        {{-- Contact --}}
        <div>
            <h4 class="mb-6" style="font-size:12px; line-height:16px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#e1e3e4;">Contact</h4>
            <ul class="space-y-4">
                <li><a href="{{ route('contact') }}" style="color:#c6c6ce; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">Contact Us</a></li>
                <li class="flex items-center gap-2" style="color:#c6c6ce;">
                    <span class="material-symbols-outlined" style="font-size:16px;">location_on</span>
                    Jakarta, Indonesia
                </li>
                <li class="flex items-center gap-2" style="color:#c6c6ce;">
                    <span class="material-symbols-outlined" style="font-size:16px;">mail</span>
                    inquiries@dmahesa.com
                </li>
            </ul>
        </div>
    </div>

    {{-- Copyright --}}
    <div class="mx-auto pt-8 flex flex-col md:flex-row justify-between items-center" style="max-width:1280px; padding:32px 32px 0; border-top:1px solid rgba(69,70,77,0.3); color:#c6c6ce; font-size:14px;">
        <p>© {{ date('Y') }} D'Mahesa Legal Group. All Rights Reserved.</p>
    </div>
</footer>
