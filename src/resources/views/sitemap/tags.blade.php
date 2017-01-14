<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">

 @foreach ($tags as $tag)
	@foreach(\App\Subdomain::all() as $subdomain)
			<url>
				<loc>http://{{ $subdomain->subdomain ? $subdomain->subdomain . '.' : '' }}{{ app_domain() }}/blog/labels/{{ $tag->name }}</loc>
				<lastmod>{{ date("c", strtotime(date("Y-m-01 00:00:00"))) }}</lastmod>
				<changefreq>weekly</changefreq>
				<priority>0.6</priority>
				@foreach(\App\Subdomain::all() as $subdomain)
					<xhtml:link rel="alternate"
						hreflang="{{ $subdomain->language }}"
						href="http://{{ $subdomain->subdomain ? $subdomain->subdomain . '.' : '' }}{{ app_domain() }}/blog/labels/{{ $tag->name }}" />
				@endforeach
				<xhtml:link rel="alternate"
					hreflang="x-default"
					href="http://{{ \App\Subdomain::getDefault()->subdomain ? \App\Subdomain::getDefault()->subdomain . '.' : '' }}{{ app_domain() }}/blog/labels/{{ $tag->name }}" />
			</url>
	@endforeach
@endforeach
</urlset>