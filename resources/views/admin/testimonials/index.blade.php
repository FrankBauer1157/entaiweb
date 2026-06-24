@extends('admin.layouts.app')
@section('title', 'Testimonials')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0" style="color: #1A3C1A;"><i class="fas fa-star me-2" style="color: #2E7D32;"></i>Testimonials</h3>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary-custom">
        <i class="fas fa-plus-circle me-1"></i> Add Testimonial
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead style="background-color:#F1F8F2;">
                <tr>
                    <th class="ps-3" style="width:60px;">Image</th>
                    <th>Client Name</th>
                    <th>Location</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th class="text-end pe-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials ?? [] as $testimonial)
                <tr>
                    <td class="ps-3">
                        @if($testimonial->image)
                            <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->client_name }}" class="rounded-circle" style="width:48px;height:48px;object-fit:cover;">
                        @else
                            <div class="rounded-circle d-flex align-items-center justify-content-center bg-light" style="width:48px;height:48px;">
                                <i class="fas fa-user text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td class="fw-medium">{{ $testimonial->client_name }}</td>
                    <td>{{ $testimonial->location ?? '—' }}</td>
                    <td>
                        <span style="color:#2E7D32;">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star{{ $testimonial->rating >= $i ? '' : ' text-muted' }}"></i>
                            @endfor
                        </span>
                    </td>
                    <td>
                        <span class="badge rounded-pill {{ $testimonial->status == 'published' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($testimonial->status) }}
                        </span>
                    </td>
                    <td class="text-end pe-3">
                        <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-sm btn-outline-primary me-1" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-outline-danger" title="Delete"
                                onclick="confirmDelete({{ $testimonial->id }}, '{{ $testimonial->client_name }}')">
                            <i class="fas fa-trash"></i>
                        </button>
                        <form id="delete-form-{{ $testimonial->id }}" action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="d-none">
                            @csrf @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                        <i class="fas fa-comment-dots fa-3x mb-3" style="color:#2E7D32;"></i>
                        <p class="mb-0">No testimonials found. <a href="{{ route('admin.testimonials.create') }}" style="color:#1B6B3A;">Add your first testimonial</a></p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if(isset($testimonials) && $testimonials->hasPages())
    <div class="card-footer bg-white">
        {{ $testimonials->links() }}
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
function confirmDelete(id, name) {
    if (confirm('Are you sure you want to delete the testimonial from "' + name + '"? This cannot be undone.')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endpush
