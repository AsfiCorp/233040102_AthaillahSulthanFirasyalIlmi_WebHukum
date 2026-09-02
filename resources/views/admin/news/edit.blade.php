@extends('layouts.admin')

@section('title', "Edit Article - Admin")
@section('page-title', 'Edit Article')

@section('content')
<div class="mx-auto" style="max-width:768px;">
    <a href="{{ route('admin.news.index') }}"
       class="inline-flex items-center gap-2 mb-8 transition-colors"
       style="color:#c6c6ce; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; text-decoration:none;"
       onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">
        <span class="material-symbols-outlined" style="font-size:16px;">arrow_back</span> Back to List
    </a>

    <div class="p-8 md:p-12" style="background:#1c2541; border:1px solid rgba(233,195,73,0.2);">
        <h2 class="mb-8" style="font-family:'Playfair Display',serif; font-size:32px; color:#e9c349;">Edit Article</h2>

        @if($errors->any())
        <div class="mb-6 px-4 py-3" style="background:rgba(147,0,10,0.2); border:1px solid rgba(255,180,171,0.3); color:#ffb4ab; font-size:14px;">
            @foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach
        </div>
        @endif

        <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf @method('PUT')

            <div>
                <label for="title" style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">Title *</label>
                <input type="text" id="title" name="title" required value="{{ old('title', $news->title) }}"
                       class="w-full px-4 py-3"
                       style="background:#0b132b; border:1px solid rgba(69,70,77,0.3); color:#e1e3e4; font-size:16px;"
                       onfocus="this.style.borderColor='rgba(233,195,73,0.5)'" onblur="this.style.borderColor='rgba(69,70,77,0.3)'">
            </div>

            <div>
                <label style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">Article Type *</label>
                <div class="flex gap-4">
                    @foreach(['internal' => 'Internal Article', 'external' => 'External Source'] as $val => $label)
                    <label id="label-type-{{ $val }}" class="type-label flex items-center gap-3 cursor-pointer px-4 py-3 transition-all"
                           style="border:1px solid {{ old('type', $news->type) === $val ? '#e9c349' : 'rgba(69,70,77,0.3)' }};">
                        <input type="radio" name="type" value="{{ $val }}" class="hidden type-radio"
                               {{ old('type', $news->type) === $val ? 'checked' : '' }}
                               onchange="updateTypeUI()">
                        <span id="circle-type-{{ $val }}" class="type-circle w-4 h-4 rounded-full border-2 flex items-center justify-center"
                              style="border-color:{{ old('type', $news->type) === $val ? '#e9c349' : 'rgba(69,70,77,0.5)' }};">
                            <span id="dot-type-{{ $val }}" class="type-dot w-2 h-2 rounded-full" style="background:{{ old('type', $news->type) === $val ? '#e9c349' : 'transparent' }};"></span>
                        </span>
                        <span id="text-type-{{ $val }}" class="type-text" style="font-size:14px; color:#e1e3e4; font-weight:{{ old('type', $news->type) === $val ? '600' : '400' }}">{{ $label }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <div id="external-url-group" style="{{ old('type', $news->type) === 'external' ? '' : 'display:none;' }}">
                <label for="external_url" style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">External URL *</label>
                <input type="url" id="external_url" name="external_url" value="{{ old('external_url', $news->external_url) }}"
                       placeholder="https://example.com/article"
                       class="w-full px-4 py-3"
                       style="background:#0b132b; border:1px solid rgba(69,70,77,0.3); color:#e1e3e4; font-size:16px;"
                       onfocus="this.style.borderColor='rgba(233,195,73,0.5)'" onblur="this.style.borderColor='rgba(69,70,77,0.3)'">
            </div>

            <div id="content-group" style="{{ old('type', $news->type) === 'external' ? 'display:none;' : '' }}">
                <label for="content" style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">Content</label>
                <textarea id="content" name="content" rows="10"
                          class="w-full px-4 py-3 resize-y"
                          style="background:#0b132b; border:1px solid rgba(69,70,77,0.3); color:#e1e3e4; font-size:16px; line-height:24px; font-family:'Inter',monospace;"
                          onfocus="this.style.borderColor='rgba(233,195,73,0.5)'" onblur="this.style.borderColor='rgba(69,70,77,0.3)'">{{ old('content', $news->content) }}</textarea>
            </div>

            <div>
                <label for="image" style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">Cover Image</label>
                @if($news->image_path)
                <div class="mb-4 flex items-center gap-4">
                    <img src="{{ asset('storage/'.$news->image_path) }}" alt="{{ $news->title }}"
                         style="height:64px; border:1px solid rgba(233,195,73,0.2);">
                    <p style="font-size:12px; color:#c6c6ce;">Current cover. Upload to replace it.</p>
                </div>
                @endif
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
                    <span class="material-symbols-outlined" style="font-size:18px;">save</span> Update Article
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
function updateTypeUI() {
    const isExternal = document.querySelector('.type-radio:checked').value === 'external';

    // Update UI elements for Internal
    const internalLabel = document.getElementById('label-type-internal');
    const internalCircle = document.getElementById('circle-type-internal');
    const internalDot = document.getElementById('dot-type-internal');
    const internalText = document.getElementById('text-type-internal');

    // Update UI elements for External
    const externalLabel = document.getElementById('label-type-external');
    const externalCircle = document.getElementById('circle-type-external');
    const externalDot = document.getElementById('dot-type-external');
    const externalText = document.getElementById('text-type-external');

    if (isExternal) {
        externalLabel.style.borderColor = '#e9c349';
        externalCircle.style.borderColor = '#e9c349';
        externalDot.style.background = '#e9c349';
        externalText.style.fontWeight = '600';

        internalLabel.style.borderColor = 'rgba(69,70,77,0.3)';
        internalCircle.style.borderColor = 'rgba(69,70,77,0.5)';
        internalDot.style.background = 'transparent';
        internalText.style.fontWeight = '400';

        document.getElementById('external-url-group').style.display = '';
        document.getElementById('content-group').style.display = 'none';
    } else {
        internalLabel.style.borderColor = '#e9c349';
        internalCircle.style.borderColor = '#e9c349';
        internalDot.style.background = '#e9c349';
        internalText.style.fontWeight = '600';

        externalLabel.style.borderColor = 'rgba(69,70,77,0.3)';
        externalCircle.style.borderColor = 'rgba(69,70,77,0.5)';
        externalDot.style.background = 'transparent';
        externalText.style.fontWeight = '400';

        document.getElementById('external-url-group').style.display = 'none';
        document.getElementById('content-group').style.display = '';
    }
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
