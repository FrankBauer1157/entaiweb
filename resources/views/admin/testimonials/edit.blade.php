@extends('admin.layouts.app')
@section('title', 'Edit Testimonial')
@section('content')
<div class="d-flex align-items-center mb-4">
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary me-3">
        <i class="fas fa-arrow-left"></i>
    </a>
    <h3 class="mb-0" style="color: #1A3C1A;"><i class="fas fa-edit me-2" style="color: #2E7D32;"></i>Edit Testimonial</h3>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form method="POST" action="{{ route('admin.testimonials.update', $testimonial->id) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="client_name" class="form-label">Client Name <span class="text-danger">*</span></label>
                    <input type="text" name="client_name" id="client_name" class="form-control" value="{{ old('client_name', $testimonial->client_name) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $testimonial->location) }}">
                </div>
                <div class="col-12">
                    <label for="testimonial" class="form-label">Testimonial <span class="text-danger">*</span></label>
                    <textarea name="testimonial" id="testimonial" class="form-control" rows="5" required>{{ old('testimonial', $testimonial->testimonial) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label for="rating" class="form-label">Rating</label>
                    <select name="rating" id="rating" class="form-select">
                        @for($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="published" {{ old('status', $testimonial->status) == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ old('status', $testimonial->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Current Photo</label>
                    <div class="mb-2">
                        @if($testimonial->image)
                            <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->client_name }}" class="rounded-circle" style="width:120px;height:120px;object-fit:cover;">
                        @else
                            <div class="rounded-circle d-flex align-items-center justify-content-center bg-light" style="width:120px;height:120px;">
                                <i class="fas fa-user fa-3x text-muted"></i>
                            </div>
                        @endif
                    </div>
                    <label for="image" class="form-label">Replace Photo</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                    <img id="imagePreview" src="#" alt="New Preview" class="mt-3 rounded-circle" style="display:none; width:120px; height:120px; object-fit:cover;">
                </div>
                <div class="col-12 border-top pt-3">
                    <button type="submit" class="btn btn-primary-custom btn-lg px-4">
                        <i class="fas fa-save me-2"></i>Update Testimonial
                    </button>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary btn-lg px-4 ms-2">Cancel</a>
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
