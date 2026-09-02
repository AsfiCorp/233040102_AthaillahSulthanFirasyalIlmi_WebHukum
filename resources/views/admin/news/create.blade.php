@extends('layouts.admin')

@section('title', "Add Article - Admin")
@section('page-title', 'New Article')

@section('content')
<div class="mx-auto" style="max-width:768px;">
    <a href="{{ route('admin.news.index') }}"
       class="inline-flex items-center gap-2 mb-8 transition-colors"
       style="color:#c6c6ce; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; text-decoration:none;"
       onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">
        <span class="material-symbols-outlined" style="font-size:16px;">arrow_back</span> Back to List
    </a>

    <div class="p-8 md:p-12" style="background:#1c2541; border:1px solid rgba(233,195,73,0.2);">
        <h2 class="mb-8" style="font-family:'Playfair Display',serif; font-size:32px; color:#e9c349;">Publish New Article</h2>

        @if($errors->any())
        <div class="mb-6 px-4 py-3" style="background:rgba(147,0,10,0.2); border:1px solid rgba(255,180,171,0.3); color:#ffb4ab; font-size:14px;">
            @foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach
        </div>
        @endif

        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="title" style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">Title *</label>
                <input type="text" id="title" name="title" required value="{{ old('title') }}"
                       placeholder="Article headline..."
                       class="w-full px-4 py-3"
                       style="background:#0b132b; border:1px solid rgba(69,70,77,0.3); color:#e1e3e4; font-size:16px;"
                       onfocus="this.style.borderColor='rgba(233,195,73,0.5)'" onblur="this.style.borderColor='rgba(69,70,77,0.3)'">
            </div>

            {{-- Type Toggle --}}
            <div>
                <label style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">Article Type *</label>
                <div class="flex gap-4">
                    @foreach(['internal' => 'Internal Article', 'external' => 'External Source'] as $val => $label)
                    <label class="flex items-center gap-3 cursor-pointer px-4 py-3 transition-all"
                           style="border:1px solid {{ old('type', 'internal') === $val ? '#e9c349' : 'rgba(69,70,77,0.3)' }};">
                        <input type="radio" name="type" value="{{ $val }}" class="hidden type-radio"
                               {{ old('type', 'internal') === $val ? 'checked' : '' }}
                               onchange="toggleExternalUrl()">
                        <span class="w-4 h-4 rounded-full border-2 flex items-center justify-center"
                              style="border-color:#e9c349;">
                            @if(old('type', 'internal') === $val)
                            <span class="w-2 h-2 rounded-full" style="background:#e9c349;"></span>
                            @endif
                        </span>
                        <span style="font-size:14px; color:#e1e3e4; font-weight:{{ old('type', 'internal') === $val ? '600' : '400' }}">{{ $label }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- External URL (conditionally visible) --}}
            <div id="external-url-group" style="{{ old('type', 'internal') === 'external' ? '' : 'display:none;' }}">
                <label for="external_url" style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">External URL *</label>
                <input type="url" id="external_url" name="external_url" value="{{ old('external_url') }}"
                       placeholder="https://example.com/article"
                       class="w-full px-4 py-3"
                       style="background:#0b132b; border:1px solid rgba(69,70,77,0.3); color:#e1e3e4; font-size:16px;"
                       onfocus="this.style.borderColor='rgba(233,195,73,0.5)'" onblur="this.style.borderColor='rgba(69,70,77,0.3)'">
            </div>

            <div id="content-group" style="{{ old('type', 'internal') === 'external' ? 'display:none;' : '' }}">
                <label for="content" style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">Content</label>
                <p class="mb-2" style="font-size:12px; color:#c6c6ce; opacity:0.7;">Use blank lines to separate paragraphs. Start a line with # to make it a heading.</p>
                <textarea id="content" name="content" rows="10"
                          placeholder="Write article content here..."
                          class="w-full px-4 py-3 resize-y"
                          style="background:#0b132b; border:1px solid rgba(69,70,77,0.3); color:#e1e3e4; font-size:16px; line-height:24px; font-family:'Inter',monospace;"
                          onfocus="this.style.borderColor='rgba(233,195,73,0.5)'" onblur="this.style.borderColor='rgba(69,70,77,0.3)'">{{ old('content') }}</textarea>
            </div>

            <div>
                <label for="image" style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">Cover Image</label>
                <p class="mb-3" style="font-size:12px; color:#c6c6ce; opacity:0.7;">Accepted: JPG, PNG — Max: 2MB</p>
                <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png"
                       class="w-full px-4 py-3"
                       style="background:#0b132b; border:1px solid rgba(69,70,77,0.3); color:#c6c6ce; font-size:14px; cursor:pointer;"
                       onchange="previewImage(this)">
                <div id="image-preview" class="mt-4 hidden">
                    <img id="preview-img" src="#" alt="Preview" style="max-height:200px; border:1px solid rgba(233,195,73,0.2);">
                </div>
            </div>

            <div class="pt-4 flex gap-4">
                <button type="submit"
                        class="flex items-center gap-2 font-bold transition-colors"
                        style="background:#e9c349; color:#0b132b; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; padding:16px 32px;"
                        onmouseover="this.style.background='#ffe088'" onmouseout="this.style.background='#e9c349'">
                    <span class="material-symbols-outlined" style="font-size:18px;">publish</span> Publish
                </button>
                <a href="{{ route('admin.news.index') }}"
                   class="flex items-center gap-2 font-bold transition-colors"
                   style="border:1px solid rgba(69,70,77,0.4); color:#c6c6ce; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; padding:16px 24px; text-decoration:none;"
                   onmouseover="this.style.borderColor='rgba(233,195,73,0.4)'" onmouseout="this.style.borderColor='rgba(69,70,77,0.4)'">Cancel</a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function toggleExternalUrl() {
    const isExternal = document.querySelector('.type-radio:checked').value === 'external';
    document.getElementById('external-url-group').style.display = isExternal ? '' : 'none';
    document.getElementById('content-group').style.display = isExternal ? 'none' : '';
}
function previewImage(input) {
    const preview = document.getElementById('image-preview');
    const img = document.getElementById('preview-img');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) { img.src = e.target.result; preview.classList.remove('hidden'); };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
@endsection
