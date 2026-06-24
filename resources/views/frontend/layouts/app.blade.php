<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Entai Kenya') | Entai Kenya - Escapes, Events & Logistics</title>
    <meta name="description" content="@yield('meta_description', 'Entai Kenya - Premier travel and logistics company based in Nairobi, Kenya. Safari packages, cultural tours, beach holidays, and corporate travel solutions.')">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1B6B3A;
            --primary-hover: #145228;
            --secondary: #E8F5E9;
            --accent: #2E7D32;
            --accent-hover: #1B5E20;
            --dark: #1A3C1A;
            --light: #F1F8F2;
            --text-muted: #6c757d;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark);
            background-color: var(--light);
            overflow-x: hidden;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
        }
        .bg-primary { background-color: var(--primary) !important; }
        .bg-primary-dark { background-color: var(--dark) !important; }
        .bg-secondary { background-color: var(--secondary) !important; }
        .bg-accent { background-color: var(--accent) !important; }
        .bg-light-custom { background-color: var(--light) !important; }
        .text-primary { color: var(--primary) !important; }
        .text-accent { color: var(--accent) !important; }
        .text-dark-custom { color: var(--dark) !important; }
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            color: #fff;
            font-weight: 500;
            padding: 0.625rem 1.75rem;
            border-radius: 0.375rem;
            transition: all 0.3s ease;
        }
        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
            color: #fff;
        }
        .btn-accent {
            background-color: var(--accent);
            border-color: var(--accent);
            color: #fff;
            font-weight: 500;
            padding: 0.625rem 1.75rem;
            border-radius: 0.375rem;
            transition: all 0.3s ease;
        }
        .btn-accent:hover, .btn-accent:focus {
            background-color: var(--accent-hover);
            border-color: var(--accent-hover);
            color: #fff;
        }
        .btn-outline-light-custom {
            border: 2px solid #fff;
            color: #fff;
            font-weight: 500;
            padding: 0.625rem 1.75rem;
            border-radius: 0.375rem;
            background: transparent;
            transition: all 0.3s ease;
        }
        .btn-outline-light-custom:hover {
            background: #fff;
            color: var(--primary);
        }
        .section-padding {
            padding: 5rem 0;
        }
        .section-padding-sm {
            padding: 3rem 0;
        }
        .section-heading {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
            text-align: center;
        }
        .section-subheading {
            font-size: 1.1rem;
            color: var(--text-muted);
            text-align: center;
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        .heading-underline {
            width: 70px;
            height: 4px;
            background-color: var(--accent);
            margin: 0.75rem auto 2rem;
            border-radius: 2px;
        }
        .card {
            border: none;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }
        .card-img-top {
            height: 220px;
            object-fit: cover;
        }
        .navbar {
            transition: all 0.3s ease;
            padding: 0.75rem 0;
            background-color: rgba(26, 60, 26, 0.95);
            backdrop-filter: blur(10px);
        }
        .navbar.scrolled {
            padding: 0.4rem 0;
            background-color: rgba(26, 60, 26, 0.98);
        }
        .navbar-brand img {
            height: 40px;
            margin-right: 0.5rem;
        }
        .navbar-brand .brand-text {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.4rem;
            color: #fff;
        }
        .navbar-nav .nav-link {
            color: rgba(255,255,255,0.85) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            transition: color 0.3s ease;
        }
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--accent) !important;
        }
        .navbar-toggler {
            border-color: rgba(255,255,255,0.5);
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.8)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        .hero-section {
            min-height: 100vh;
            min-height: 100svh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .hero-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(135deg, rgba(44,24,16,0.85) 0%, rgba(139,69,19,0.7) 50%, rgba(44,24,16,0.85) 100%);
        }
@media (max-width: 768px) {
    .hero-heading { font-size: 2.2rem !important; }
    .hero-subheading { font-size: 1rem !important; }
    .section-heading { font-size: 1.8rem !important; }
    .navbar .brand-text { font-size: 1rem !important; }
}
        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: #fff;
        }
        .hero-heading {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .hero-subheading {
            font-size: 1.25rem;
            font-weight: 300;
            margin-bottom: 2rem;
            opacity: 0.95;
        }
        .footer {
            background-color: var(--dark);
            color: rgba(255,255,255,0.8);
            padding: 4rem 0 0;
        }
        .footer h5 {
            color: #fff;
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            margin-bottom: 1.25rem;
        }
        .footer a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer a:hover {
            color: var(--accent);
        }
        .footer .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            color: #fff;
            margin-right: 0.5rem;
            transition: all 0.3s ease;
        }
        .footer .social-icons a:hover {
            background: var(--accent);
            color: #fff;
            transform: translateY(-3px);
        }
        .footer .newsletter-input {
            border-radius: 0.375rem 0 0 0.375rem;
            border: 1px solid rgba(255,255,255,0.2);
            background: rgba(255,255,255,0.1);
            color: #fff;
            padding: 0.625rem 1rem;
        }
        .footer .newsletter-input::placeholder {
            color: rgba(255,255,255,0.5);
        }
        .footer .newsletter-input:focus {
            outline: none;
            border-color: var(--accent);
            background: rgba(255,255,255,0.15);
        }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding: 1.25rem 0;
            margin-top: 3rem;
            text-align: center;
            font-size: 0.9rem;
            color: rgba(255,255,255,0.5);
        }
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background-color: #25D366;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: 0 4px 15px rgba(37,211,102,0.4);
            z-index: 999;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .whatsapp-float:hover {
            transform: scale(1.1);
            color: #fff;
            box-shadow: 0 6px 20px rgba(37,211,102,0.6);
        }
        .back-to-top {
            position: fixed;
            bottom: 100px;
            right: 32px;
            width: 45px;
            height: 45px;
            background-color: var(--primary);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            z-index: 998;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }
        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }
        .back-to-top:hover {
            background-color: var(--primary-hover);
            color: #fff;
            transform: translateY(-3px);
        }
        .breadcrumb-section {
            background: linear-gradient(135deg, var(--dark) 0%, var(--primary) 100%);
            padding: 6rem 0 3rem;
            color: #fff;
            text-align: center;
        }
        .breadcrumb-section .breadcrumb {
            justify-content: center;
            margin-bottom: 0;
        }
        .breadcrumb-section .breadcrumb-item a {
            color: var(--accent);
            text-decoration: none;
        }
        .breadcrumb-section .breadcrumb-item.active {
            color: rgba(255,255,255,0.7);
        }
        .breadcrumb-section .breadcrumb-item+.breadcrumb-item::before {
            color: rgba(255,255,255,0.5);
        }
        .package-card .price {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary);
        }
        .package-card .rating i {
            color: var(--accent);
            font-size: 0.85rem;
        }
        .service-card {
            text-align: center;
            padding: 2rem 1.5rem;
            border-radius: 0.75rem;
            background: #fff;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
            transition: all 0.3s ease;
            height: 100%;
        }
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }
        .service-card .icon-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: var(--secondary);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            margin: 0 auto 1.25rem;
            transition: all 0.3s ease;
        }
        .service-card:hover .icon-circle {
            background: var(--primary);
            color: #fff;
        }
        .gallery-img {
            border-radius: 0.75rem;
            overflow: hidden;
            cursor: pointer;
            position: relative;
        }
        .gallery-img img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        .gallery-img:hover img {
            transform: scale(1.05);
        }
        .gallery-img .overlay {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .gallery-img:hover .overlay {
            opacity: 1;
        }
        .gallery-img .overlay i {
            color: #fff;
            font-size: 2rem;
        }
        .testimonial-card {
            text-align: center;
            padding: 2rem;
            max-width: 700px;
            margin: 0 auto;
        }
        .testimonial-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--accent);
            margin-bottom: 1rem;
        }
        .testimonial-card .stars i {
            color: var(--accent);
            margin: 0 2px;
        }
        .contact-info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }
        .contact-info-item .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--secondary);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            margin-right: 1rem;
            flex-shrink: 0;
        }
        .filter-btn {
            border: 2px solid var(--accent);
            color: var(--accent);
            background: transparent;
            padding: 0.4rem 1.25rem;
            border-radius: 2rem;
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 0 0.25rem 0.5rem;
        }
        .filter-btn:hover, .filter-btn.active {
            background: var(--accent);
            color: #fff;
        }
        .badge-category {
            background: var(--accent);
            color: #fff;
            font-weight: 500;
            padding: 0.3rem 0.75rem;
            border-radius: 2rem;
            font-size: 0.8rem;
        }
        @media (max-width: 768px) {
            .hero-heading { font-size: 2.5rem; }
            .section-heading { font-size: 2rem; }
            .section-padding { padding: 3rem 0; }
        }
        @stack('styles')
    </style>
    @stack('styles')
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                @if(setting('logo'))
                    <img src="{{ asset('storage/' . setting('logo')) }}" alt="Entai Kenya" style="height:40px;">
                @else
                    <span class="brand-text">EK</span>
                @endif
                <span class="ms-2 brand-text" style="font-size:1.1rem;">{{ setting('company_name', 'Entai Kenya') }}</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('packages.index') }}">Packages</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <a href="{{ route('contact') }}" class="btn btn-accent">Book Now</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @if(session('success'))
    <div style="position:fixed; top:80px; right:20px; z-index:9999; min-width:300px;" class="alert alert-success alert-dismissible fade show shadow" role="alert">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('error'))
    <div style="position:fixed; top:80px; right:20px; z-index:9999; min-width:300px;" class="alert alert-danger alert-dismissible fade show shadow" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <h5>About Entai Kenya</h5>
                    <p class="mb-3">Entai Kenya is a premier travel and logistics company based in Nairobi, Kenya. We specialize in creating unforgettable African experiences through expertly curated journeys.</p>
                    <div class="social-icons">
                        <a href="{{ setting('facebook_url', '#') }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ setting('instagram_url', '#') }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="{{ setting('twitter_url', '#') }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="{{ setting('youtube_url', '#') }}" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('home') }}"><i class="fas fa-chevron-right me-2 small"></i>Home</a></li>
                        <li class="mb-2"><a href="{{ route('home') }}#about"><i class="fas fa-chevron-right me-2 small"></i>About Us</a></li>
                        <li class="mb-2"><a href="{{ route('packages.index') }}"><i class="fas fa-chevron-right me-2 small"></i>Packages</a></li>
                        <li class="mb-2"><a href="{{ route('gallery') }}"><i class="fas fa-chevron-right me-2 small"></i>Gallery</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}"><i class="fas fa-chevron-right me-2 small"></i>Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Contact Info</h5>
                    <div class="mb-2"><i class="fas fa-phone-alt me-2 text-accent"></i>{{ setting('phone', '+254 700 000 000') }}</div>
                    <div class="mb-2"><i class="fas fa-envelope me-2 text-accent"></i>{{ setting('email', 'info@entaikenya.com') }}</div>
                    <div class="mb-2"><i class="fas fa-map-marker-alt me-2 text-accent"></i>Nairobi, Kenya</div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Newsletter</h5>
                    <p class="small">Subscribe for exclusive offers and travel inspiration.</p>
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="d-flex">
                        @csrf
                        <input type="email" name="email" class="form-control newsletter-input" placeholder="Your email" required>
                        <button type="submit" class="btn btn-accent" style="border-radius: 0 0.375rem 0.375rem 0;"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                &copy; {{ date('Y') }} Entai Kenya. All rights reserved. Designed with <i class="fas fa-heart text-accent"></i> in Kenya.
            </div>
        </div>
    </footer>

    <a href="https://wa.me/{{ setting('whatsapp_number', '254700000000') }}" class="whatsapp-float" target="_blank" title="Chat with us on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <button class="back-to-top" id="backToTop" title="Back to top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const backToTopBtn = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
            link.addEventListener('click', () => {
                const bsCollapse = document.querySelector('.navbar-collapse');
                if (bsCollapse && bsCollapse.classList.contains('show')) {
                    const toggle = document.querySelector('.navbar-toggler');
                    if (toggle) toggle.click();
                }
            });
        });
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                setTimeout(() => { if (alert) bsAlert.close(); }, 5000);
            });
        }, 100);
    </script>
    @stack('scripts')
</body>
</html>
