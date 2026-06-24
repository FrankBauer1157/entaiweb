@extends('admin.layouts.app')
@section('title', 'Add Testimonial')
@section('content')
<div class="d-flex align-items-center mb-4">
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary me-3">
        <i class="fas fa-arrow-left"></i>
    </a>
    <h3 class="mb-0" style="color: #1A3C1A;"><i class="fas fa-plus-circle me-2" style="color: #2E7D32;"></i>Add Testimonial</h3>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="client_name" class="form-label">Client Name <span class="text-danger">*</span></label>
                    <input type="text" name="client_name" id="client_name" class="form-control" value="{{ old('client_name') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}" placeholder="e.g. Nairobi, Kenya">
                </div>
                <div class="col-12">
                    <label for="testimonial" class="form-label">Testimonial <span class="text-danger">*</span></label>
                    <textarea name="testimonial" id="testimonial" class="form-control" rows="5" required>{{ old('testimonial') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label for="rating" class="form-label">Rating</label>
                    <select name="rating" id="rating" class="form-select">
                        <option value="5" {{ old('rating') == '5' ? 'selected' : '' }}>5 Stars</option>
                        <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>4 Stars</option>
                        <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>3 Stars</option>
                        <option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>2 Stars</option>
                        <option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>1 Star</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="image" class="form-label">Client Photo</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                    <img id="imagePreview" src="#" alt="Preview" class="mt-3 rounded-circle" style="display:none; width:120px; height:120px; object-fit:cover;">
                </div>
                <div class="col-12 border-top pt-3">
                    <button type="submit" class="btn btn-primary-custom btn-lg px-4">
                        <i class="fas fa-save me-2"></i>Create Testimonial
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
