@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0" style="color: #1A3C1A;"><i class="fas fa-tachometer-alt me-2" style="color: #2E7D32;"></i>Dashboard</h3>
    <div>
        <a href="{{ route('admin.packages.create') }}" class="btn btn-primary-custom me-2">
            <i class="fas fa-plus-circle me-1"></i> Add Package
        </a>
        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-envelope me-1"></i> View Inquiries
        </a>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm" style="border-left: 4px solid #1B6B3A;">
            <div class="card-body d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;background:rgba(139,69,19,0.1);">
                        <i class="fas fa-box fa-lg" style="color:#1B6B3A;"></i>
                    </div>
                </div>
                <div>
                    <h6 class="text-muted mb-1 small text-uppercase">Total Packages</h6>
                    <h3 class="mb-0 fw-bold" style="color:#1A3C1A;">{{ $totalPackages ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm" style="border-left: 4px solid #0dcaf0;">
            <div class="card-body d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;background:rgba(13,202,240,0.1);">
                        <i class="fas fa-envelope fa-lg" style="color:#0dcaf0;"></i>
                    </div>
                </div>
                <div>
                    <h6 class="text-muted mb-1 small text-uppercase">Total Inquiries</h6>
                    <h3 class="mb-0 fw-bold" style="color:#1A3C1A;">{{ $totalInquiries ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm" style="border-left: 4px solid #ffc107;">
            <div class="card-body d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;background:rgba(255,193,7,0.1);">
                        <i class="fas fa-star fa-lg" style="color:#ffc107;"></i>
                    </div>
                </div>
                <div>
                    <h6 class="text-muted mb-1 small text-uppercase">Testimonials</h6>
                    <h3 class="mb-0 fw-bold" style="color:#1A3C1A;">{{ $totalTestimonials ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm" style="border-left: 4px solid #198754;">
            <div class="card-body d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;background:rgba(25,135,84,0.1);">
                        <i class="fas fa-image fa-lg" style="color:#198754;"></i>
                    </div>
                </div>
                <div>
                    <h6 class="text-muted mb-1 small text-uppercase">Gallery Images</h6>
                    <h3 class="mb-0 fw-bold" style="color:#1A3C1A;">{{ $totalGalleries ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3" style="border-bottom: 2px solid #E8F5E9;">
        <h5 class="mb-0" style="color:#1A3C1A;"><i class="fas fa-clock me-2" style="color:#2E7D32;"></i>Recent Inquiries</h5>
        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead style="background-color:#F1F8F2;">
                    <tr>
                        <th class="ps-3">Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentInquiries ?? [] as $inquiry)
                    <tr>
                        <td class="ps-3 fw-medium">{{ $inquiry->name }}</td>
                        <td>{{ $inquiry->email }}</td>
                        <td>{{ Str::limit($inquiry->subject, 40) }}</td>
                        <td>
                            <span class="badge rounded-pill
                                @if($inquiry->status == 'new') bg-danger
                                @elseif($inquiry->status == 'read') bg-warning text-dark
                                @else bg-success @endif">
                                {{ ucfirst($inquiry->status) }}
                            </span>
                        </td>
                        <td class="text-muted small">{{ $inquiry->created_at->format('M d, Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">
                            <i class="fas fa-inbox fa-2x mb-2" style="color:#2E7D32;"></i>
                            <p class="mb-0">No recent inquiries found.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
