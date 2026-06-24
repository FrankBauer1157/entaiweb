@extends('admin.layouts.app')
@section('title', 'Edit Package')
@section('content')
<div class="d-flex align-items-center mb-4">
    <a href="{{ route('admin.packages.index') }}" class="btn btn-outline-secondary me-3">
        <i class="fas fa-arrow-left"></i>
    </a>
    <h3 class="mb-0" style="color: #1A3C1A;"><i class="fas fa-edit me-2" style="color: #2E7D32;"></i>Edit Package</h3>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form method="POST" action="{{ route('admin.packages.update', $package->id) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $package->title) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                    <input type="text" name="category" id="category" class="form-control" value="{{ old('category', $package->category) }}" required>
                </div>
                <div class="col-12">
                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $package->description) }}</textarea>
                </div>
                <div class="col-md-4">
                    <label for="duration" class="form-label">Duration <span class="text-danger">*</span></label>
                    <input type="text" name="duration" id="duration" class="form-control" value="{{ old('duration', $package->duration) }}" required>
                </div>
                <div class="col-md-4">
                    <label for="price" class="form-label">Price ($) <span class="text-danger">*</span></label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $package->price) }}" step="0.01" min="0" required>
                </div>
                <div class="col-md-4">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" name="rating" id="rating" class="form-control" value="{{ old('rating', $package->rating) }}" step="0.1" min="0" max="5">
                </div>
                <div class="col-12">
                    <label for="inclusions" class="form-label">Inclusions</label>
                    <textarea name="inclusions" id="inclusions" class="form-control" rows="3" placeholder="One per line">{{ old('inclusions', $package->inclusions) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Current Image</label>
                    <div class="mb-2">
                        @if($package->image)
                            <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->title }}" class="rounded" style="max-width:300px; max-height:200px; object-fit:cover;">
                        @else
                            <div class="rounded d-flex align-items-center justify-content-center bg-light text-muted" style="width:300px;height:200px;">
                                <i class="fas fa-image fa-3x"></i>
                            </div>
                        @endif
                    </div>
                    <label for="image" class="form-label">Replace Image</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                    <img id="imagePreview" src="#" alt="New Preview" class="mt-3 rounded" style="display:none; max-width:300px; max-height:200px; object-fit:cover;">
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_featured" id="is_featured" class="form-check-input" value="1" {{ old('is_featured', $package->is_featured) ? 'checked' : '' }}>
                        <label for="featured" class="form-check-label fw-medium">Featured Package</label>
                    </div>
                </div>
                <div class="col-12 border-top pt-3">
                    <button type="submit" class="btn btn-primary-custom btn-lg px-4">
                        <i class="fas fa-save me-2"></i>Update Package
                    </button>
                    <a href="{{ route('admin.packages.index') }}" class="btn btn-outline-secondary btn-lg px-4 ms-2">Cancel</a>
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
