@extends('layouts.admin')

@section('title', "Add Advocate - Admin")
@section('page-title', 'Add New Advocate')

@section('content')
<div class="mx-auto" style="max-width:768px;">
    <a href="{{ route('admin.advocates.index') }}"
       class="inline-flex items-center gap-2 mb-8 transition-colors"
       style="color:#c6c6ce; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; text-decoration:none;"
       onmouseover="this.style.color='#e9c349'" onmouseout="this.style.color='#c6c6ce'">
        <span class="material-symbols-outlined" style="font-size:16px;">arrow_back</span> Back to List
    </a>

    <div class="p-8 md:p-12" style="background:#1c2541; border:1px solid rgba(233,195,73,0.2);">
        <h2 class="mb-8" style="font-family:'Playfair Display',serif; font-size:32px; color:#e9c349;">Add New Advocate</h2>

        @if($errors->any())
        <div class="mb-6 px-4 py-3" style="background:rgba(147,0,10,0.2); border:1px solid rgba(255,180,171,0.3); color:#ffb4ab; font-size:14px;">
            @foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach
        </div>
        @endif

        <form action="{{ route('admin.advocates.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="name" style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">Full Name *</label>
                <input type="text" id="name" name="name" required value="{{ old('name') }}"
                       placeholder="e.g. Adam Hasan SH, MH"
                       class="w-full px-4 py-3"
                       style="background:#0b132b; border:1px solid rgba(69,70,77,0.3); color:#e1e3e4; font-size:16px;"
                       onfocus="this.style.borderColor='rgba(233,195,73,0.5)'" onblur="this.style.borderColor='rgba(69,70,77,0.3)'">
            </div>

            <div>
                <label for="role" style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">Role *</label>
                <select id="role" name="role" required
                        class="w-full px-4 py-3"
                        style="background:#0b132b; border:1px solid rgba(69,70,77,0.3); color:#e1e3e4; font-size:16px;"
                        onfocus="this.style.borderColor='rgba(233,195,73,0.5)'" onblur="this.style.borderColor='rgba(69,70,77,0.3)'">
                    <option value="" disabled selected>Select a role...</option>
                    @foreach(['Senior Partner', 'Partner', 'Associate', 'Paralegal'] as $role)
                    <option value="{{ $role }}" {{ old('role') === $role ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="short_story" style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">Biography / Short Story</label>
                <textarea id="short_story" name="short_story" rows="5"
                          placeholder="Professional biography..."
                          class="w-full px-4 py-3 resize-y"
                          style="background:#0b132b; border:1px solid rgba(69,70,77,0.3); color:#e1e3e4; font-size:16px; line-height:24px;"
                          onfocus="this.style.borderColor='rgba(233,195,73,0.5)'" onblur="this.style.borderColor='rgba(69,70,77,0.3)'">{{ old('short_story') }}</textarea>
            </div>

            <div>
                <label for="image" style="display:block; font-size:12px; letter-spacing:0.1em; font-weight:600; text-transform:uppercase; color:#c6c6ce; margin-bottom:8px;">Profile Photo</label>
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
                    <span class="material-symbols-outlined" style="font-size:18px;">save</span> Save Advocate
                </button>
                <a href="{{ route('admin.advocates.index') }}"
                   class="flex items-center gap-2 font-bold transition-colors"
                   style="border:1px solid rgba(69,70,77,0.4); color:#c6c6ce; font-size:12px; letter-spacing:0.1em; text-transform:uppercase; padding:16px 24px; text-decoration:none;"
                   onmouseover="this.style.borderColor='rgba(233,195,73,0.4)'" onmouseout="this.style.borderColor='rgba(69,70,77,0.4)'">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
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
