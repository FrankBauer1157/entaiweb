@extends('admin.layouts.app')
@section('title', 'View Inquiry')
@section('content')
<div class="d-flex align-items-center mb-4">
    <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline-secondary me-3">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    <h3 class="mb-0" style="color: #1A3C1A;"><i class="fas fa-envelope-open-text me-2" style="color: #2E7D32;"></i>Inquiry Details</h3>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3" style="border-bottom: 2px solid #E8F5E9;">
                <h5 class="mb-0" style="color:#1A3C1A;">{{ $inquiry->subject }}</h5>
                <span class="badge rounded-pill fs-6
                    @if($inquiry->status == 'new') bg-danger
                    @elseif($inquiry->status == 'read') bg-warning text-dark
                    @else bg-success @endif">
                    {{ ucfirst($inquiry->status) }}
                </span>
            </div>
            <div class="card-body p-4">
                <div class="mb-4">
                    <p class="text-muted small mb-2">Message</p>
                    <div class="p-3 rounded" style="background-color:#F1F8F2; white-space:pre-wrap;">{{ $inquiry->message }}</div>
                </div>
                <p class="text-muted small mb-0">
                    <i class="far fa-clock me-1"></i> Received {{ $inquiry->created_at->format('F d, Y \a\t h:i A') }}
                </p>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3" style="border-bottom: 2px solid #E8F5E9;">
                <h5 class="mb-0" style="color:#1A3C1A;"><i class="fas fa-user me-2" style="color:#2E7D32;"></i>Contact Info</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <small class="text-muted d-block">Name</small>
                    <strong>{{ $inquiry->name }}</strong>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block">Email</small>
                    <a href="mailto:{{ $inquiry->email }}" style="color:#1B6B3A;">{{ $inquiry->email }}</a>
                </div>
                @if($inquiry->phone)
                <div class="mb-0">
                    <small class="text-muted d-block">Phone</small>
                    <strong>{{ $inquiry->phone }}</strong>
                </div>
                @endif
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3" style="border-bottom: 2px solid #E8F5E9;">
                <h5 class="mb-0" style="color:#1A3C1A;"><i class="fas fa-cogs me-2" style="color:#2E7D32;"></i>Actions</h5>
            </div>
            <div class="card-body">
                @if($inquiry->status == 'new')
                <form method="POST" action="{{ route('admin.inquiries.markRead', $inquiry->id) }}" class="mb-2">
                    @csrf @method('PATCH')
                    <button type="submit" class="btn btn-warning w-100">
                        <i class="fas fa-check me-1"></i> Mark as Read
                    </button>
                </form>
                @endif
                <form method="POST" action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" onsubmit="return confirm('Delete this inquiry? This cannot be undone.');">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger w-100">
                        <i class="fas fa-trash me-1"></i> Delete Inquiry
                    </button>
                </form>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3" style="border-bottom: 2px solid #E8F5E9;">
                <h5 class="mb-0" style="color:#1A3C1A;"><i class="fas fa-reply me-2" style="color:#2E7D32;"></i>Send Reply</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.inquiries.reply', $inquiry->id) }}">
                    @csrf
                    <div class="mb-3">
                        <textarea name="reply_message" class="form-control" rows="5" placeholder="Type your reply here..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary-custom w-100">
                        <i class="fas fa-paper-plane me-1"></i> Send Reply
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
