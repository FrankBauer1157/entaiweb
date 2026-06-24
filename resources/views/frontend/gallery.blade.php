@extends('frontend.layouts.app')

@section('title', 'Our Gallery')

@section('content')

<section class="breadcrumb-section">
    <div class="container">
        <h1 class="fw-bold mb-2" style="font-family:'Playfair Display',serif;">Our Gallery</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section-padding" style="background-color: var(--light);">
    <div class="container">
        <h2 class="section-heading">Our Gallery</h2>
        <div class="heading-underline"></div>
        <p class="section-subheading">Browse through our collection of memorable moments and breathtaking destinations</p>

        <div class="d-flex justify-content-center flex-wrap mb-4">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="safari">Safari</button>
            <button class="filter-btn" data-filter="beaches">Beaches</button>
            <button class="filter-btn" data-filter="culture">Culture</button>
            <button class="filter-btn" data-filter="wildlife">Wildlife</button>
        </div>

        <div class="row g-3" id="galleryGrid">
            @forelse($galleries as $img)
            <div class="col-6 col-md-4 col-lg-3 gallery-item" data-category="{{ strtolower($img->category ?? 'all') }}">
                <div class="gallery-img" data-bs-toggle="modal" data-bs-target="#galleryModal" data-img="{{ $img->image ? asset('storage/' . $img->image) : 'https://picsum.photos/seed/gallery-' . $img->id . '/800/600' }}" data-title="{{ $img->title ?? 'Gallery' }}">
                    <img src="{{ $img->image ? asset('storage/' . $img->image) : 'https://picsum.photos/seed/gallery-' . $img->id . '/600/400' }}" alt="{{ $img->title ?? 'Gallery' }}">
                    <div class="overlay"><i class="fas fa-search-plus"></i></div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-images fa-3x text-muted mb-3"></i>
                <h4>No gallery images found</h4>
                <p class="text-muted">Check back soon for our gallery updates.</p>
            </div>
            @endforelse
        </div>

        @if(isset($galleries) && $galleries instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
        <div class="d-flex justify-content-center mt-5">
            {{ $galleries->links() }}
        </div>
        @endif
    </div>
</section>

<div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 text-center position-relative">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close" style="z-index:10;font-size:1.5rem;"></button>
                <img src="" id="galleryModalImg" class="img-fluid rounded" alt="">
                <p class="text-white mt-2" id="galleryModalTitle"></p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterBtns = document.querySelectorAll('.filter-btn');
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

@endsection
