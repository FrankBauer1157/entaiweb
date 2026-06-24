@extends('admin.layouts.app')
@section('title', 'Inquiries')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0" style="color: #1A3C1A;"><i class="fas fa-envelope me-2" style="color: #2E7D32;"></i>Inquiries</h3>
    <a href="{{ route('admin.inquiries.export') }}" class="btn btn-success">
        <i class="fas fa-file-csv me-1"></i> Export CSV
    </a>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body bg-cream">
        <form method="GET" action="{{ route('admin.inquiries.index') }}" class="row g-2">
            <div class="col-md-7">
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                    <input type="text" name="search" class="form-control" placeholder="Search by name, email, or subject..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">All Statuses</option>
                    <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                    <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Read</option>
                    <option value="replied" {{ request('status') == 'replied' ? 'selected' : '' }}>Replied</option>
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
                    <th class="ps-3">Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th class="text-end pe-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inquiries ?? [] as $inquiry)
                <tr>
                    <td class="ps-3 fw-medium">{{ $inquiry->name }}</td>
                    <td>{{ $inquiry->email }}</td>
                    <td>{{ $inquiry->phone ?? '—' }}</td>
                    <td>{{ Str::limit($inquiry->subject, 35) }}</td>
                    <td>
                        <span class="badge rounded-pill
                            @if($inquiry->status == 'new') bg-danger
                            @elseif($inquiry->status == 'read') bg-warning text-dark
                            @else bg-success @endif">
                            {{ ucfirst($inquiry->status) }}
                        </span>
                    </td>
                    <td class="text-muted small">{{ $inquiry->created_at->format('M d, Y') }}</td>
                    <td class="text-end pe-3">
                        <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="btn btn-sm btn-outline-info me-1" title="View">
                            <i class="fas fa-eye"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-outline-danger" title="Delete"
                                onclick="confirmDelete({{ $inquiry->id }}, '{{ $inquiry->name }}')">
                            <i class="fas fa-trash"></i>
                        </button>
                        <form id="delete-form-{{ $inquiry->id }}" action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" class="d-none">
                            @csrf @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5 text-muted">
                        <i class="fas fa-inbox fa-3x mb-3" style="color:#2E7D32;"></i>
                        <p class="mb-0">No inquiries found.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if(isset($inquiries) && $inquiries->hasPages())
    <div class="card-footer bg-white">
        {{ $inquiries->links() }}
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
function confirmDelete(id, name) {
    if (confirm('Are you sure you want to delete the inquiry from "' + name + '"? This cannot be undone.')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endpush
