<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($sitemaps as $sitemap)
        <sitemap>
            <loc>{{ app_url() }}{{$sitemap['uri']}}</loc>
            <lastmod>{{ date("c", strtotime($sitemap['date'])) }}</lastmod>
        </sitemap>
    @endforeach
</sitemapindex>