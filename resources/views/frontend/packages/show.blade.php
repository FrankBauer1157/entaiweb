@extends('frontend.layouts.app')

@section('title', isset($package) ? $package->title : 'Package Details')

@section('content')

<section class="breadcrumb-section">
    <div class="container">
        <h1 class="fw-bold mb-2" style="font-family:'Playfair Display',serif;">{{ isset($package) ? $package->title : 'Package Details' }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('packages.index') }}">Packages</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ isset($package) ? $package->title : 'Details' }}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section-padding" style="background-color: var(--light);">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <img src="{{ isset($package) && $package->image ? asset('storage/' . $package->image) : 'https://picsum.photos/seed/' . (isset($package) ? $package->slug : 'package-detail') . '/1200/600' }}" class="card-img-top" style="height:400px;object-fit:cover;" alt="{{ isset($package) ? $package->title : 'Package' }}">
                </div>

                <h2 class="fw-bold mb-3" style="font-family:'Playfair Display',serif;">
                    {{ isset($package) ? $package->title : 'Maasai Mara Safari' }}
                </h2>

                <div class="d-flex flex-wrap gap-3 mb-4">
                    <span class="badge-category">{{ isset($package) ? ($package->category->name ?? 'Safari') : 'Safari' }}</span>
                    <span class="text-muted"><i class="far fa-clock me-1"></i>{{ isset($package) ? $package->duration : '4 Days / 3 Nights' }}</span>
                    <span class="price">{{ isset($package) ? 'KSH ' . number_format($package->price) : 'KSH 45,000' }}</span>
                    <span class="rating">
                        @php $stars = isset($package) ? ($package->rating ?? 5) : 5; @endphp
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star" style="color:{{ $i <= $stars ? 'var(--accent)' : '#ddd' }};"></i>
                        @endfor
                    </span>
                </div>

                <h4 class="fw-bold mb-3" style="font-family:'Playfair Display',serif;">Description</h4>
                <div style="line-height:1.8;color:var(--dark);">
                    @if(isset($package))
                        {!! $package->description ?? '<p>Experience the adventure of a lifetime with this expertly curated package. Immerse yourself in breathtaking landscapes, rich culture, and unforgettable wildlife encounters. Our team ensures every detail is handled so you can focus on making memories.</p>' !!}
                    @else
                        <p>Experience the adventure of a lifetime with this expertly curated package. Immerse yourself in breathtaking landscapes, rich culture, and unforgettable wildlife encounters. Our team ensures every detail is handled so you can focus on making memories.</p>
                        <p>This package includes guided tours, comfortable accommodations, delicious meals, and all necessary transfers. Whether you're a solo traveler, couple, or group, this experience is designed to exceed your expectations.</p>
                    @endif
                </div>

                @if(isset($package) && !empty($package->inclusions))
                <h4 class="fw-bold mt-4 mb-3" style="font-family:'Playfair Display',serif;">Inclusions</h4>
                <div style="line-height:1.8;color:var(--dark);">
                    {!! $package->inclusions !!}
                </div>
                @else
                <h4 class="fw-bold mt-4 mb-3" style="font-family:'Playfair Display',serif;">Inclusions</h4>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check-circle me-2" style="color:var(--accent);"></i>Accommodation</li>
                            <li class="mb-2"><i class="fas fa-check-circle me-2" style="color:var(--accent);"></i>All meals</li>
                            <li class="mb-2"><i class="fas fa-check-circle me-2" style="color:var(--accent);"></i>Park entry fees</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check-circle me-2" style="color:var(--accent);"></i>Professional guide</li>
                            <li class="mb-2"><i class="fas fa-check-circle me-2" style="color:var(--accent);"></i>Game drives</li>
                            <li class="mb-2"><i class="fas fa-check-circle me-2" style="color:var(--accent);"></i>Airport transfers</li>
                        </ul>
                    </div>
                </div>
                @endif
            </div>

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-3" style="font-family:'Playfair Display',serif;">Book This Package</h4>
                        <button type="button" class="btn btn-accent btn-lg w-100 mb-3" data-bs-toggle="modal" data-bs-target="#bookingModal">
                            Book Now <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                        <hr>
                        <h6 class="fw-bold mb-3">Quick Summary</h6>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Duration:</span>
                            <span class="fw-medium">{{ isset($package) ? $package->duration : '4 Days / 3 Nights' }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Price:</span>
                            <span class="fw-bold price">{{ isset($package) ? 'KSH ' . number_format($package->price) : 'KSH 45,000' }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Category:</span>
                            <span class="fw-medium">{{ isset($package) ? ($package->category->name ?? 'Safari') : 'Safari' }}</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3"><i class="fas fa-headset me-2" style="color:var(--primary);"></i>Need Help?</h5>
                        <p class="small text-muted mb-2">Our travel experts are ready to assist you.</p>
                        <div class="mb-2"><i class="fas fa-phone-alt me-2" style="color:var(--primary);"></i>{{ setting('phone', '+254 757 709105') }}</div>
                        <div><i class="fas fa-envelope me-2" style="color:var(--primary);"></i>{{ setting('email', 'info@entaikenya.com') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h3 class="fw-bold mb-4 text-center" style="font-family:'Playfair Display',serif;">Related Packages</h3>
            <div class="row g-4">
                @forelse($relatedPackages ?? [] as $rp)
                <div class="col-md-4">
                    <div class="card package-card h-100">
                        <img src="{{ $rp->image ? asset('storage/' . $rp->image) : 'https://picsum.photos/seed/' . $rp->slug . '/600/400' }}" class="card-img-top" alt="{{ $rp->title }}">
                        <div class="card-body d-flex flex-column">
                            <span class="badge-category align-self-start mb-2">{{ $rp->category }}</span>
                            <h6 class="card-title fw-bold">{{ $rp->title }}</h6>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="small text-muted"><i class="far fa-clock me-1"></i>{{ $rp->duration }}</span>
                                <span class="price">KSH {{ number_format($rp->price) }}</span>
                            </div>
                            <div class="rating mb-2">
                                @for($j = 1; $j <= 5; $j++)
                                    <i class="fas fa-star{{ $rp->rating >= $j ? '' : ' text-muted' }}" style="color:var(--accent);"></i>
                                @endfor
                            </div>
                            <a href="{{ route('packages.show', $rp->slug) }}" class="btn btn-outline-primary btn-sm w-100 mt-2" style="border:1px solid var(--primary);color:var(--primary);">View Details</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center text-muted py-4">No related packages available.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background:var(--primary);color:#fff;">
                <h5 class="modal-title fw-bold" id="bookingModalLabel"><i class="fas fa-calendar-check me-2"></i>Book This Package</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <p class="small text-muted mb-3">Fill in your details and we'll get back to you with a customized quote.</p>
                <form action="{{ route('book.now') }}" method="POST">
                    @csrf
                    <input type="hidden" name="package_id" value="{{ isset($package) ? $package->id : '' }}">
                    <div class="mb-3">
                        <label for="bookingName" class="form-label">Full Name *</label>
                        <input type="text" name="name" id="bookingName" class="form-control" required placeholder="Your full name">
                    </div>
                    <div class="mb-3">
                        <label for="bookingEmail" class="form-label">Email Address *</label>
                        <input type="email" name="email" id="bookingEmail" class="form-control" required placeholder="Your email address">
                    </div>
                    <div class="mb-3">
                        <label for="bookingPhone" class="form-label">Phone Number *</label>
                        <input type="text" name="phone" id="bookingPhone" class="form-control" required placeholder="Your phone number">
                    </div>
                    <div class="mb-3">
                        <label for="bookingMessage" class="form-label">Message (Optional)</label>
                        <textarea name="message" id="bookingMessage" rows="3" class="form-control" placeholder="Any special requests or questions?"></textarea>
                    </div>
                    <button type="submit" class="btn btn-accent w-100">Submit Booking Request <i class="fas fa-paper-plane ms-2"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
