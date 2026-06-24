@extends('admin.layouts.app')
@section('title', 'Gallery')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0" style="color: #1A3C1A;"><i class="fas fa-image me-2" style="color: #2E7D32;"></i>Gallery</h3>
    <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary-custom">
        <i class="fas fa-plus-circle me-1"></i> Add Images
    </a>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-2">
        <ul class="nav nav-pills" id="categoryTabs">
            <li class="nav-item">
                <a class="nav-link {{ !request('category') ? 'active' : '' }}" href="{{ route('admin.galleries.index') }}" style="{{ !request('category') ? 'background-color:#1B6B3A;color:#fff;' : 'color:#1B6B3A;' }}">All</a>
            </li>
            @php
                $categories = ['Safari', 'Beach', 'Mountain', 'Cultural', 'Wildlife', 'Landscapes', 'Hotels'];
            @endphp
            @foreach($categories as $cat)
            <li class="nav-item">
                <a class="nav-link {{ request('category') == $cat ? 'active' : '' }}"
                   href="{{ route('admin.galleries.index', ['category' => $cat]) }}"
                   style="{{ request('category') == $cat ? 'background-color:#1B6B3A;color:#fff;' : 'color:#1B6B3A;' }}">
                    {{ $cat }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="row g-3">
    @forelse($galleries ?? [] as $gallery)
    <div class="col-6 col-md-4 col-lg-3 col-xl-2">
        <div class="card border-0 shadow-sm h-100">
            <div class="position-relative">
                @if($gallery->image)
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="card-img-top" style="height:150px;object-fit:cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-light" style="height:150px;">
                        <i class="fas fa-image fa-3x text-muted"></i>
                    </div>
                @endif
                @if($gallery->featured)
                <span class="position-absolute top-0 end-0 m-2 badge" style="background-color:#2E7D32;">
                    <i class="fas fa-star"></i>
                </span>
                @endif
            </div>
            <div class="card-body p-2">
                <p class="card-text small fw-medium mb-1 text-truncate" title="{{ $gallery->title }}">{{ $gallery->title }}</p>
                <span class="badge bg-secondary small mb-2">{{ $gallery->category }}</span>
                <div class="d-flex justify-content-end gap-1">
                    <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button type="button" class="btn btn-sm btn-outline-danger" title="Delete"
                            onclick="confirmDelete({{ $gallery->id }}, '{{ $gallery->title }}')">
                        <i class="fas fa-trash"></i>
                    </button>
                    <form id="delete-form-{{ $gallery->id }}" action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" class="d-none">
                        @csrf @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5 text-muted">
        <i class="fas fa-images fa-3x mb-3" style="color:#2E7D32;"></i>
        <p class="mb-0">No gallery images found. <a href="{{ route('admin.galleries.create') }}" style="color:#1B6B3A;">Upload images</a></p>
    </div>
    @endforelse
</div>

@if(isset($galleries) && $galleries->hasPages())
<div class="mt-4">
    {{ $galleries->links() }}
</div>
@endif
@endsection

@push('scripts')
<script>
function confirmDelete(id, title) {
    if (confirm('Are you sure you want to delete "' + title + '"? This cannot be undone.')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endpush
