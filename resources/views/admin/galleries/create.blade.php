@extends('admin.layouts.app')
@section('title', 'Add Gallery Images')
@section('content')
<div class="d-flex align-items-center mb-4">
    <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline-secondary me-3">
        <i class="fas fa-arrow-left"></i>
    </a>
    <h3 class="mb-0" style="color: #1A3C1A;"><i class="fas fa-cloud-upload-alt me-2" style="color: #2E7D32;"></i>Upload Gallery Images</h3>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form method="POST" action="{{ route('admin.galleries.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                    <select name="category" id="category" class="form-select" required>
                        <option value="">Select Category</option>
                        <option value="Safari" {{ old('category') == 'Safari' ? 'selected' : '' }}>Safari</option>
                        <option value="Beach" {{ old('category') == 'Beach' ? 'selected' : '' }}>Beach</option>
                        <option value="Mountain" {{ old('category') == 'Mountain' ? 'selected' : '' }}>Mountain</option>
                        <option value="Cultural" {{ old('category') == 'Cultural' ? 'selected' : '' }}>Cultural</option>
                        <option value="Wildlife" {{ old('category') == 'Wildlife' ? 'selected' : '' }}>Wildlife</option>
                        <option value="Landscapes" {{ old('category') == 'Landscapes' ? 'selected' : '' }}>Landscapes</option>
                        <option value="Hotels" {{ old('category') == 'Hotels' ? 'selected' : '' }}>Hotels</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="images" class="form-label">Images <span class="text-danger">*</span></label>
                    <input type="file" name="images[]" id="images" class="form-control" accept="image/*" multiple required>
                    <small class="text-muted">You can select multiple images at once.</small>
                </div>
                <div class="col-12">
                    <div id="previewContainer" class="row g-2 mt-2"></div>
                </div>
                <div class="col-12 border-top pt-3">
                    <button type="submit" class="btn btn-primary-custom btn-lg px-4">
                        <i class="fas fa-cloud-upload-alt me-2"></i>Upload Images
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
document.getElementById('images').addEventListener('change', function(e) {
    const container = document.getElementById('previewContainer');
    container.innerHTML = '';
    for (const file of e.target.files) {
        const reader = new FileReader();
        reader.onload = function(ev) {
            const col = document.createElement('div');
            col.className = 'col-4 col-md-3 col-lg-2';
            col.innerHTML = '<img src="' + ev.target.result + '" class="img-thumbnail rounded" style="height:100px;width:100%;object-fit:cover;">';
            container.appendChild(col);
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endpush
