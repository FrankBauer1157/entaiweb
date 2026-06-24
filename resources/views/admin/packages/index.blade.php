@extends('admin.layouts.app')
@section('title', 'Packages')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0" style="color: #1A3C1A;"><i class="fas fa-box me-2" style="color: #2E7D32;"></i>Manage Packages</h3>
    <a href="{{ route('admin.packages.create') }}" class="btn btn-primary-custom">
        <i class="fas fa-plus-circle me-1"></i> Add Package
    </a>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body bg-cream">
        <form method="GET" action="{{ route('admin.packages.index') }}" class="row g-2">
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                    <input type="text" name="search" class="form-control" placeholder="Search packages..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-3">
                <select name="category" class="form-select">
                    <option value="">All Categories</option>
                    <option value="Safari" {{ request('category') == 'Safari' ? 'selected' : '' }}>Safari</option>
                    <option value="Beach" {{ request('category') == 'Beach' ? 'selected' : '' }}>Beach</option>
                    <option value="Mountain" {{ request('category') == 'Mountain' ? 'selected' : '' }}>Mountain</option>
                    <option value="Cultural" {{ request('category') == 'Cultural' ? 'selected' : '' }}>Cultural</option>
                    <option value="Adventure" {{ request('category') == 'Adventure' ? 'selected' : '' }}>Adventure</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="is_featured" class="form-select">
                    <option value="">All Packages</option>
                    <option value="1" {{ request('is_featured') == '1' ? 'selected' : '' }}>Featured</option>
                    <option value="0" {{ request('is_featured') == '0' ? 'selected' : '' }}>Non-Featured</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary-custom w-100"><i class="fas fa-filter me-1"></i>Filter</button>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead style="background-color:#F1F8F2;">
                <tr>
                    <th class="ps-3" style="width:60px;">Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Duration</th>
                    <th>Price</th>
                    <th>Rating</th>
                    <th>Featured</th>
                    <th class="text-end pe-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($packages ?? [] as $package)
                <tr>
                    <td class="ps-3">
                        @if($package->image)
                            <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->title }}" class="rounded" style="width:48px;height:48px;object-fit:cover;">
                        @else
                            <div class="rounded d-flex align-items-center justify-content-center bg-light" style="width:48px;height:48px;">
                                <i class="fas fa-image text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td class="fw-medium">{{ $package->title }}</td>
                    <td><span class="badge bg-secondary">{{ $package->category }}</span></td>
                    <td>{{ $package->duration }}</td>
                    <td class="fw-semibold">KSH {{ number_format($package->price) }}</td>
                    <td>
                        <span style="color:#2E7D32;">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star{{ $package->rating >= $i ? '' : ($package->rating >= $i - 0.5 ? '-half-alt' : '') }}"></i>
                            @endfor
                        </span>
                        <small class="text-muted">({{ $package->rating }})</small>
                    </td>
                    <td>
                        @if($package->is_featured)
                            <span class="badge rounded-pill" style="background-color:#2E7D32;color:#212529;">
                                <i class="fas fa-star me-1"></i>Featured
                            </span>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td class="text-end pe-3">
                        <a href="{{ route('admin.packages.edit', $package->id) }}" class="btn btn-sm btn-outline-primary me-1" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-outline-danger" title="Delete"
                                onclick="confirmDelete({{ $package->id }}, '{{ $package->title }}')">
                            <i class="fas fa-trash"></i>
                        </button>
                        <form id="delete-form-{{ $package->id }}" action="{{ route('admin.packages.destroy', $package->id) }}" method="POST" class="d-none">
                            @csrf @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-5 text-muted">
                        <i class="fas fa-box-open fa-3x mb-3" style="color:#2E7D32;"></i>
                        <p class="mb-0">No packages found. <a href="{{ route('admin.packages.create') }}" style="color:#1B6B3A;">Add your first package</a></p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if(isset($packages) && $packages->hasPages())
    <div class="card-footer bg-white">
        {{ $packages->links() }}
    </div>
    @endif
</div>
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
