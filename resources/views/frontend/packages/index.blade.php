@extends('frontend.layouts.app')

@section('title', 'Our Packages')

@section('content')

<section class="breadcrumb-section">
    <div class="container">
        <h1 class="fw-bold mb-2" style="font-family:'Playfair Display',serif;">Our Packages</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Packages</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section-padding" style="background-color: var(--light);">
    <div class="container">

        <div class="row mb-4 g-3">
            <div class="col-md-6">
                <form action="{{ route('packages.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control" placeholder="Search packages..." value="{{ request('search') }}" style="border-radius:2rem 0 0 2rem;">
                    <button type="submit" class="btn btn-primary" style="border-radius:0 2rem 2rem 0;"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap justify-content-md-end gap-1">
                    <a href="{{ route('packages.index') }}" class="filter-btn {{ !request('category') ? 'active' : '' }}">All</a>
                    <a href="{{ route('packages.index', ['category' => 'safari']) }}" class="filter-btn {{ request('category') == 'safari' ? 'active' : '' }}">Safari</a>
                    <a href="{{ route('packages.index', ['category' => 'beach']) }}" class="filter-btn {{ request('category') == 'beach' ? 'active' : '' }}">Beach</a>
                    <a href="{{ route('packages.index', ['category' => 'culture']) }}" class="filter-btn {{ request('category') == 'culture' ? 'active' : '' }}">Culture</a>
                    <a href="{{ route('packages.index', ['category' => 'city']) }}" class="filter-btn {{ request('category') == 'city' ? 'active' : '' }}">City</a>
                </div>
            </div>
        </div>

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
            <div class="col-12 text-center py-5">
                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                <h4>No packages found</h4>
                <p class="text-muted">Check back soon for new travel packages.</p>
            </div>
            @endforelse
        </div>

        @if(isset($packages) && $packages instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
        <div class="d-flex justify-content-center mt-5">
            {{ $packages->links() }}
        </div>
        @endif

    </div>
</section>

@endsection
