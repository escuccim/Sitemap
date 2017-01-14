<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
	xmlns:xhtml="http://www.w3.org/1999/xhtml" >

@for($i = 1; $i <= $numPages; $i++)
    @foreach(\App\Subdomain::all() as $subdomain)
        <url>
            <loc>http://{{ $subdomain->subdomain ? $subdomain->subdomain . '.' : '' }}{{app_domain()}}/records?page={{$i}}</loc>
            <lastmod>{{ $lastMod }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.5</priority>
            @foreach(\App\Subdomain::all() as $subdomain)
                <xhtml:link rel="alternate"
                    hreflang="{{ $subdomain->language }}"
                    href="http://{{ $subdomain->subdomain ? $subdomain->subdomain . '.' : '' }}{{ app_domain() }}/records?page={{$i}}" />
            @endforeach
            <xhtml:link rel="alternate"
                hreflang="x-default"
                href="http://{{ \App\Subdomain::getDefault()->subdomain ? \App\Subdomain::getDefault()->subdomain . '.' : '' }}{{ app_domain() }}/records?page={{$i}}" />
        </url>
    @endforeach
@endfor

@foreach ($records as $record)
    @foreach(\App\Subdomain::all() as $subdomain)
        <url>
            <loc>http://{{ $subdomain->subdomain ? $subdomain->subdomain . '.' : '' }}{{ app_domain() }}/records/{{ $record->id }}</loc>
            <lastmod>{{ $record->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.7</priority>
            @foreach(\App\Subdomain::all() as $subdomain)
                <xhtml:link rel="alternate"
                    hreflang="{{ $subdomain->language }}"
                    href="http://{{ $subdomain->subdomain ? $subdomain->subdomain . '.' : '' }}{{ app_domain() }}/records/{{ $record->id }}" />
            @endforeach
            <xhtml:link rel="alternate"
                hreflang="x-default"
                href="http://{{ \App\Subdomain::getDefault()->subdomain ? \App\Subdomain::getDefault()->subdomain . '.' : '' }}{{ app_domain() }}/records/{{ $record->id }}" />
        </url>
    @endforeach
@endforeach
</urlset>