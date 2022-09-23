<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ env('APP_URL') }}</loc>
        <lastmod>{{ date('c',strtotime(date('Y-m-d H:i:s')))}}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    @foreach ($constant_routes as $route)
        <url>
            <loc>{{ $route }}</loc>
            <lastmod>{{date('c',strtotime(date('Y-m-d H:i:s')))}}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

     @foreach ($blogs as $blog)
        <url>
            <loc>{{env('APP_URL')}}blog/{{ $blog->slug }}</loc>
            <lastmod>{{date('c',strtotime($blog->created_at))}}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>