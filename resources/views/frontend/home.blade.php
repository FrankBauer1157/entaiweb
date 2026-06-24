@extends('frontend.layouts.app')

@section('title', 'Entai Kenya - Escapes, Events & Logistics')

@section('content')

<section class="hero-section" style="background-image: url('{{ setting('hero_image') ? asset('storage/' . setting('hero_image')) : 'https://picsum.photos/seed/entai-hero/1600/900' }}');">
    <div class="hero-overlay"></div>
    <div class="hero-content container">
        <h1 class="hero-heading">Entai Kenya</h1>
        <p class="hero-subheading">Elegant experience in Escapes, Events &amp; Logistics</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="#services" class="btn btn-primary btn-lg px-4">Explore Services</a>
            <a href="{{ route('contact') }}" class="btn btn-outline-light-custom btn-lg px-4">Make Reservation</a>
        </div>
    </div>
</section>

<section id="about" class="section-padding" style="background-color: var(--light);">
    <div class="container">
        <h2 class="section-heading">About Entai Kenya</h2>
        <div class="heading-underline"></div>
        <p class="text-center mb-5" style="max-width:850px;margin:0 auto 3rem;color:var(--text-muted);line-height:1.8;">
            {{ setting('about_text', 'Entai Kenya is a premier travel and logistics company based in Nairobi, Kenya. We specialize in creating unforgettable African experiences through our expertly curated safari packages, cultural tours, beach holidays, and corporate travel solutions. Our team of dedicated professionals brings years of local expertise to ensure every journey is seamless, safe, and extraordinary.') }}
        </p>

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="service-card">
                    <div class="icon-circle"><i class="fas fa-user-check"></i></div>
                    <h5 class="fw-bold mb-2">Personalized Service</h5>
                    <p class="text-muted small mb-0">Personalized itineraries designed for you</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <div class="icon-circle"><i class="fas fa-globe-africa"></i></div>
                    <h5 class="fw-bold mb-2">Local Expertise</h5>
                    <p class="text-muted small mb-0">Deep local knowledge and expertise in Africa</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <div class="icon-circle"><i class="fas fa-headset"></i></div>
                    <h5 class="fw-bold mb-2">24/7 Support</h5>
                    <p class="text-muted small mb-0">Reliable and dedicated 24/7 support</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100" style="background:var(--secondary);">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-3" style="font-family:'Playfair Display',serif;">
                            <i class="fas fa-eye me-2" style="color:var(--primary);"></i>Our Vision
                        </h4>
                        <p class="mb-0" style="color:var(--dark);line-height:1.8;">
                            {{ setting('vision_text', 'To be Africa\'s leading travel and logistics partner, connecting the world to the continent\'s most extraordinary experiences through innovation, sustainability, and authentic hospitality.') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100" style="background:var(--secondary);">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-3" style="font-family:'Playfair Display',serif;">
                            <i class="fas fa-bullseye me-2" style="color:var(--primary);"></i>Our Mission
                        </h4>
                        <p class="mb-0" style="color:var(--dark);line-height:1.8;">
                            {{ setting('mission_text', 'To deliver exceptional travel and logistics solutions that exceed expectations, foster cultural understanding, and create lasting memories for every client we serve.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="values" class="section-padding" style="background-color: var(--secondary);">
    <div class="container">
        <h2 class="section-heading">Our Core Values</h2>
        <div class="heading-underline"></div>
        <div class="row g-4">
            <div class="col-md-4 col-lg">
                <div class="text-center p-3">
                    <div class="icon-circle mx-auto mb-3" style="background:var(--primary);color:#fff;">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h6 class="fw-bold">Customer-Centricity</h6>
                    <p class="small text-muted">Your satisfaction is our priority in every interaction</p>
                </div>
            </div>
            <div class="col-md-4 col-lg">
                <div class="text-center p-3">
                    <div class="icon-circle mx-auto mb-3" style="background:var(--primary);color:#fff;">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <h6 class="fw-bold">Integrity</h6>
                    <p class="small text-muted">Honest, transparent, and ethical in all our dealings</p>
                </div>
            </div>
            <div class="col-md-4 col-lg">
                <div class="text-center p-3">
                    <div class="icon-circle mx-auto mb-3" style="background:var(--primary);color:#fff;">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h6 class="fw-bold">Innovation</h6>
                    <p class="small text-muted">Constantly evolving to serve you better</p>
                </div>
            </div>
            <div class="col-md-4 col-lg">
                <div class="text-center p-3">
                    <div class="icon-circle mx-auto mb-3" style="background:var(--primary);color:#fff;">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h6 class="fw-bold">Sustainability</h6>
                    <p class="small text-muted">Committed to responsible and eco-conscious travel</p>
                </div>
            </div>
            <div class="col-md-4 col-lg">
                <div class="text-center p-3">
                    <div class="icon-circle mx-auto mb-3" style="background:var(--primary);color:#fff;">
                        <i class="fas fa-star"></i>
                    </div>
                    <h6 class="fw-bold">Excellence</h6>
                    <p class="small text-muted">Delivering premium quality in every detail</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="services" class="section-padding" style="background-color: var(--light);">
    <div class="container">
        <h2 class="section-heading">Our Services</h2>
        <div class="heading-underline"></div>
        <div class="row g-4">
            @php
            $services = [
                ['icon' => 'fa-paw', 'title' => 'Safari Packages', 'desc' => 'Experience Kenya\'s world-famous wildlife safaris in Maasai Mara, Amboseli, and beyond.'],
                ['icon' => 'fa-mask', 'title' => 'Cultural Festival Packages', 'desc' => 'Immerse yourself in rich African traditions, music, dance, and cultural festivals.'],
                ['icon' => 'fa-umbrella-beach', 'title' => 'Beach Holidays', 'desc' => 'Relax on pristine white sandy beaches along the stunning Kenyan coastline.'],
                ['icon' => 'fa-plane', 'title' => 'Flight Bookings', 'desc' => 'Hassle-free domestic and international flight bookings at competitive rates.'],
                ['icon' => 'fa-hotel', 'title' => 'Hotel Reservations', 'desc' => 'Handpicked accommodations from luxury lodges to boutique hotels across Africa.'],
                ['icon' => 'fa-car', 'title' => 'Airport Transfers & Car Hire', 'desc' => 'Safe, reliable transportation with professional drivers and well-maintained vehicles.'],
                ['icon' => 'fa-briefcase', 'title' => 'Corporate Travel & Retreats', 'desc' => 'Tailored corporate travel solutions and team retreats for businesses.'],
                ['icon' => 'fa-graduation-cap', 'title' => 'Student & Educational Tours', 'desc' => 'Enriching educational trips designed for students and learning institutions.'],
                ['icon' => 'fa-passport', 'title' => 'Visa Assistance & Travel Insurance', 'desc' => 'Expert guidance on visa processing and comprehensive travel insurance coverage.'],
            ];
            @endphp
            @foreach($services as $service)
            <div class="col-md-6 col-lg-4">
                <div class="service-card">
                    <div class="icon-circle"><i class="fas {{ $service['icon'] }}"></i></div>
                    <h5 class="fw-bold mb-2">{{ $service['title'] }}</h5>
                    <p class="text-muted small mb-0">{{ $service['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="packages" class="section-padding" style="background-color: var(--secondary);">
    <div class="container">
        <h2 class="section-heading">Featured Packages</h2>
        <p class="section-subheading">Handpicked adventure packages to inspire your next journey</p>
        <div class="heading-underline"></div>

        <div class="row g-4">
            @forelse($packages as $pkg)
            <div class="col-md-6 col-lg-4">
                <div class="card package-card h-100">
                    <img src="{{ $pkg->image ? asset('storage/' . $pkg->image) : 'https://picsum.photos/seed/' . $pkg->slug . '/600/400' }}" class="card-img-top" alt="{{ $pkg->title }}">
                    <div class="card-body d-flex flex-column">
                        <span class="badge-category align-self-start mb-2">{{ $pkg->category }}</span>
                        <h5 class="card-title fw-bold">{{ $pkg->title }}</h5>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small text-muted"><i class="far fa-clock me-1"></i>{{ $pkg->duration }}</span>
                            <span class="price">KSH {{ number_format($pkg->price) }}</span>
                        </div>
                        <div class="rating mb-2">
                            @php $stars = $pkg->rating ?? 5; @endphp
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star{{ $stars >= $i ? '' : ' text-muted' }}" style="color:var(--accent);font-size:0.85rem;"></i>
                            @endfor
                        </div>
                        <p class="card-text small flex-grow-1 text-muted">{{ Str::limit($pkg->description ?? '', 100) }}</p>
                        <a href="{{ route('packages.show', $pkg->slug) }}" class="btn btn-accent btn-sm w-100 mt-2">Book Now</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5 text-muted">No featured packages available yet.</div>
            @endforelse
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('packages.index') }}" class="btn btn-accent btn-lg">View All Packages</a>
        </div>
    </div>
</section>

<section id="gallery" class="section-padding" style="background-color: var(--light);">
    <div class="container">
        <h2 class="section-heading">Our Gallery</h2>
        <div class="heading-underline"></div>

        <div class="d-flex justify-content-center flex-wrap mb-4">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="safari">Safari</button>
            <button class="filter-btn" data-filter="beaches">Beaches</button>
            <button class="filter-btn" data-filter="culture">Culture</button>
            <button class="filter-btn" data-filter="wildlife">Wildlife</button>
        </div>

        @php $galleryImages = $galleryImages ?? collect(); @endphp

        <div class="row g-3" id="galleryGrid">
            @forelse($galleryImages as $img)
            <div class="col-6 col-md-4 col-lg-3 gallery-item" data-category="{{ strtolower($img->category) }}">
                <div class="gallery-img" data-bs-toggle="modal" data-bs-target="#galleryModal" data-img="{{ $img->image ? asset('storage/' . $img->image) : 'https://picsum.photos/seed/' . ($img->id) . '/800/600' }}" data-title="{{ $img->title ?? 'Gallery Image' }}">
                    <img src="{{ $img->image ? asset('storage/' . $img->image) : 'https://picsum.photos/seed/' . ($img->id) . '/600/400' }}" alt="{{ $img->title ?? 'Gallery Image' }}">
                    <div class="overlay"><i class="fas fa-search-plus"></i></div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-4 text-muted">No gallery images available.</div>
            @endforelse
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('gallery') }}" class="btn btn-outline-accent" style="border:2px solid var(--accent);color:var(--accent);">View Full Gallery <i class="fas fa-arrow-right ms-1"></i></a>
        </div>
    </div>
</section>

<div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 text-center position-relative">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close" style="z-index:10;font-size:1.5rem;"></button>
                <img src="" id="galleryModalImg" class="img-fluid rounded" alt="">
                <p class="text-white mt-2" id="galleryModalTitle"></p>
            </div>
        </div>
    </div>
</div>

<section id="testimonials" class="section-padding" style="background-color: var(--light);">
    <div class="container">
        <h2 class="section-heading">What Our Clients Say</h2>
        <div class="heading-underline"></div>

        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($testimonials as $index => $t)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="testimonial-card">
                        <img src="{{ $t->image ? asset('storage/' . $t->image) : 'https://picsum.photos/seed/testimonial-' . $t->id . '/200/200' }}" alt="{{ $t->client_name }}">
                        <h5 class="fw-bold mb-1">{{ $t->client_name }}</h5>
                        <p class="small text-muted mb-2">{{ $t->location }}</p>
                        <div class="stars mb-3">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star" style="color:{{ $i <= $t->rating ? 'var(--accent)' : '#ddd' }};"></i>
                            @endfor
                        </div>
                        <p class="lead" style="font-style:italic;color:var(--dark);font-size:1.05rem;">"{{ $t->testimonial }}"</p>
                    </div>
                </div>
                @empty
                <div class="text-center py-4 text-muted">No testimonials available yet.</div>
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" style="background-color:var(--primary);border-radius:50%;padding:1.5rem;" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" style="background-color:var(--primary);border-radius:50%;padding:1.5rem;" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<section id="contact" class="section-padding" style="background-color: var(--light);">
    <div class="container">
        <h2 class="section-heading">Get In Touch</h2>
        <div class="heading-underline"></div>

        <div class="row g-4">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body p-4">
                        <h4 class="mb-4" style="font-family:'Playfair Display',serif;">Send Us a Message</h4>
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Full Name *</label>
                                    <input type="text" name="name" id="name" class="form-control" required placeholder="Your full name">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" name="email" id="email" class="form-control" required placeholder="Your email address">
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Your phone number">
                                </div>
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">Subject *</label>
                                    <input type="text" name="subject" id="subject" class="form-control" required placeholder="Subject">
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Message *</label>
                                    <textarea name="message" id="message" rows="5" class="form-control" required placeholder="Tell us about your request..."></textarea>
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
                </div>
                <div class="mb-2">
                    <h6 class="fw-bold mb-3">Follow Us</h6>
                    <div class="d-flex gap-2">
                        <a href="{{ setting('facebook_url', '#') }}" class="btn btn-outline-dark btn-sm rounded-circle" style="width:40px;height:40px;display:flex;align-items:center;justify-content:center;" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ setting('instagram_url', '#') }}" class="btn btn-outline-dark btn-sm rounded-circle" style="width:40px;height:40px;display:flex;align-items:center;justify-content:center;" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="{{ setting('twitter_url', '#') }}" class="btn btn-outline-dark btn-sm rounded-circle" style="width:40px;height:40px;display:flex;align-items:center;justify-content:center;" target="_blank"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="mt-4 rounded" style="background:#e0e0e0;height:250px;display:flex;align-items:center;justify-content:center;color:var(--text-muted);">
                    <span><i class="fas fa-map-marked-alt me-2"></i>Map - Nairobi, Kenya</span>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterBtns = document.querySelectorAll('#gallery .filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const filter = this.getAttribute('data-filter');

                galleryItems.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });

        const galleryModal = document.getElementById('galleryModal');
        if (galleryModal) {
            galleryModal.addEventListener('show.bs.modal', function(event) {
                const trigger = event.relatedTarget;
                const imgSrc = trigger.getAttribute('data-img');
                const title = trigger.getAttribute('data-title');
                document.getElementById('galleryModalImg').src = imgSrc;
                document.getElementById('galleryModalTitle').textContent = title;
            });
        }
    });
</script>
@endpush
