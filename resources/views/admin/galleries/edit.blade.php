@extends('admin.layouts.app')
@section('title', 'Edit Gallery Image')
@section('content')
<div class="d-flex align-items-center mb-4">
    <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline-secondary me-3">
        <i class="fas fa-arrow-left"></i>
    </a>
    <h3 class="mb-0" style="color: #1A3C1A;"><i class="fas fa-edit me-2" style="color: #2E7D32;"></i>Edit Gallery Image</h3>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form method="POST" action="{{ route('admin.galleries.update', $gallery->id) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Current Image</label>
                    <div class="mb-3">
                        @if($gallery->image)
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="rounded" style="max-width:100%; max-height:250px; object-fit:cover;">
                        @else
                            <div class="rounded d-flex align-items-center justify-content-center bg-light text-muted" style="width:100%;height:250px;">
                                <i class="fas fa-image fa-4x"></i>
                            </div>
                        @endif
                    </div>
                    <label for="image" class="form-label">Replace Image</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                    <img id="imagePreview" src="#" alt="New Preview" class="mt-3 rounded" style="display:none; max-width:300px; max-height:200px; object-fit:cover;">
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $gallery->title) }}">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="category" id="category" class="form-select" required>
                            <option value="">Select Category</option>
                            @foreach(['Safari', 'Beach', 'Mountain', 'Cultural', 'Wildlife', 'Landscapes', 'Hotels'] as $cat)
                                <option value="{{ $cat }}" {{ old('category', $gallery->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check mt-4">
                        <input type="checkbox" name="featured" id="featured" class="form-check-input" value="1" {{ old('featured', $gallery->featured) ? 'checked' : '' }}>
                        <label for="featured" class="form-check-label fw-medium">
                            <i class="fas fa-star me-1" style="color:#2E7D32;"></i>Featured Image
                        </label>
                    </div>
                </div>
                <div class="col-12 border-top pt-3">
                    <button type="submit" class="btn btn-primary-custom btn-lg px-4">
                        <i class="fas fa-save me-2"></i>Update Image
                    </button>
                    <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline-secondary btn-lg px-4 ms-2">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewImage(event) {
    const preview = document.getElementById('imagePreview');
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.style.display = 'block';
}
</script>
@endpush
