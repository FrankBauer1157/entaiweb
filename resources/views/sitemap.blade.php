<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <priority>1.0</priority>
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>{{ url('/packages') }}</loc>
        <priority>0.8</priority>
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>{{ url('/gallery') }}</loc>
        <priority>0.7</priority>
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>{{ url('/contact') }}</loc>
        <priority>0.7</priority>
        <changefreq>monthly</changefreq>
    </url>
    @if(isset($packages))
    @foreach($packages as $package)
    <url>
        <loc>{{ url('/packages/'.$package->slug) }}</loc>
        <priority>0.6</priority>
        <changefreq>weekly</changefreq>
        <lastmod>{{ $package->updated_at ? $package->updated_at->toAtomString() : '' }}</lastmod>
    </url>
    @endforeach
    @endif
</urlset>
