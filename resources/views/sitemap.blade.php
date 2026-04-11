<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->startOfDay()->toRfc3339String() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ url('/schedule') }}</loc>
        <lastmod>{{ now()->startOfDay()->toRfc3339String() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ url('/standings') }}</loc>
        <lastmod>{{ now()->startOfDay()->toRfc3339String() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/teams') }}</loc>
        <lastmod>{{ now()->startOfMonth()->toRfc3339String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/stadiums') }}</loc>
        <lastmod>{{ now()->startOfMonth()->toRfc3339String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ url('/friendlies') }}</loc>
        <lastmod>{{ now()->startOfDay()->toRfc3339String() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ url('/privacy-policy') }}</loc>
        <lastmod>{{ now()->startOfMonth()->toRfc3339String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.3</priority>
    </url>
    <url>
        <loc>{{ url('/terms-conditions') }}</loc>
        <lastmod>{{ now()->startOfMonth()->toRfc3339String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.3</priority>
    </url>
    <url>
        <loc>{{ url('/contact') }}</loc>
        <lastmod>{{ now()->startOfMonth()->toRfc3339String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.4</priority>
    </url>
    <url>
        <loc>{{ url('/about') }}</loc>
        <lastmod>{{ now()->startOfMonth()->toRfc3339String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>

    @foreach ($matches as $match)
    <url>
        <loc>{{ route('match-details', ['slug_id' => ($match->slug ?? 'match') . '-' . $match->id]) }}</loc>
        <lastmod>{{ $match->updated_at ? $match->updated_at->toRfc3339String() : now()->toRfc3339String() }}</lastmod>
        <changefreq>hourly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    @foreach ($teams as $team)
    <url>
        <loc>{{ route('team-details', ['id' => $team->id]) }}</loc>
        <lastmod>{{ $team->updated_at ? $team->updated_at->toRfc3339String() : now()->toRfc3339String() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
</urlset>
