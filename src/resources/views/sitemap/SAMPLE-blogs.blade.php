<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
	xmlns:xhtml="http://www.w3.org/1999/xhtml" >

 @foreach ($blogs as $blog)
	 @foreach(\Escuccim\Sitemap\Models\Subdomain::all() as $subdomain)
			<url>
				<loc>http://{{ $subdomain->subdomain ? $subdomain->subdomain . '.' : '' }}{{ app_domain() }}/blog/{{ $blog->slug }}</loc>
				<lastmod>{{ $blog->published_at->tz('UTC')->toAtomString() }}</lastmod>
				<changefreq>weekly</changefreq>
				<priority>0.7</priority>
				@foreach(\Escuccim\Sitemap\Models\Subdomain::all() as $subdomain)
					<xhtml:link rel="alternate"
								hreflang="{{ $subdomain->language }}"
								href="http://{{ $subdomain->subdomain ? $subdomain->subdomain . '.' : '' }}{{ app_domain() }}/blog/{{ $blog->slug }}" />
				@endforeach
				<xhtml:link rel="alternate"
					hreflang="x-default"
					href="http://{{ \Escuccim\Sitemap\Models\Subdomain::getDefault()->subdomain ? \Escuccim\Sitemap\Models\Subdomain::getDefault()->subdomain . '.' : '' }}{{ app_domain() }}/blog/{{ $blog->slug }}" />
			</url>
	@endforeach
@endforeach
</urlset>