@extends('frontend.layouts.app')

@section('title', 'Contact Us')

@section('content')

<section class="breadcrumb-section">
    <div class="container">
        <h1 class="fw-bold mb-2" style="font-family:'Playfair Display',serif;">Get In Touch</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section-padding" style="background-color: var(--light);">
    <div class="container">
        <h2 class="section-heading">Get In Touch</h2>
        <div class="heading-underline"></div>

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>Please correct the errors below and try again.
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row g-4">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body p-4">
                        <h4 class="mb-4" style="font-family:'Playfair Display',serif;">Send Us a Message</h4>
                        <p class="text-muted mb-4">Have a question or ready to plan your next adventure? Fill out the form below and our team will get back to you within 24 hours.</p>
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Full Name *</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required placeholder="Your full name">
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required placeholder="Your email address">
                                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Your phone number">
                                    @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">Subject *</label>
                                    <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" required placeholder="Subject">
                                    @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Message *</label>
                                    <textarea name="message" id="message" rows="5" class="form-control @error('message') is-invalid @enderror" required placeholder="Tell us about your request...">{{ old('message') }}</textarea>
                                    @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg px-5">Send Message <i class="fas fa-paper-plane ms-2"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="mb-4">
                    <h4 class="mb-4" style="font-family:'Playfair Display',serif;">Contact Information</h4>
                    <div class="contact-info-item">
                        <div class="icon-box"><i class="fas fa-phone-alt"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Phone</h6>
                            <p class="mb-0 text-muted">{{ setting('phone', '+254 700 000 000') }}</p>
                            <p class="mb-0 text-muted small">{{ setting('phone_alt', '+254 711 111 111') }}</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="icon-box"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Email</h6>
                            <p class="mb-0 text-muted">{{ setting('email', 'info@entaikenya.com') }}</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Location</h6>
                            <p class="mb-0 text-muted">Nairobi, Kenya</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="icon-box"><i class="fas fa-clock"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Business Hours</h6>
                            <p class="mb-0 text-muted">Monday - Friday: 8:00 AM - 6:00 PM</p>
                            <p class="mb-0 text-muted">Saturday: 9:00 AM - 2:00 PM</p>
                            <p class="mb-0 text-muted">Sunday: Closed</p>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <h6 class="fw-bold mb-3">Follow Us</h6>
                    <div class="d-flex gap-2">
                        <a href="{{ setting('facebook_url', '#') }}" class="btn btn-outline-dark btn-sm rounded-circle" style="width:40px;height:40px;display:flex;align-items:center;justify-content:center;" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ setting('instagram_url', '#') }}" class="btn btn-outline-dark btn-sm rounded-circle" style="width:40px;height:40px;display:flex;align-items:center;justify-content:center;" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="{{ setting('twitter_url', '#') }}" class="btn btn-outline-dark btn-sm rounded-circle" style="width:40px;height:40px;display:flex;align-items:center;justify-content:center;" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="{{ setting('youtube_url', '#') }}" class="btn btn-outline-dark btn-sm rounded-circle" style="width:40px;height:40px;display:flex;align-items:center;justify-content:center;" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="rounded" style="background:#e0e0e0;height:280px;display:flex;align-items:center;justify-content:center;color:var(--text-muted);">
                    <span><i class="fas fa-map-marked-alt me-2"></i>Map - Nairobi, Kenya</span>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
