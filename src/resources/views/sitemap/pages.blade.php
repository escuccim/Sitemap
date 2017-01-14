<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset 
	xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
	xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
	xmlns:xhtml="http://www.w3.org/1999/xhtml"
	 >
	 
	 @foreach($pages as $page)
		 @foreach(\Escuccim\Sitemap\Models\Subdomain::all() as $subdomain)
			<url>
				<loc>http://{{ $subdomain->subdomain ? $subdomain->subdomain . '.' : '' }}{{ app_domain()}}{{ $page->uri }}</loc>
				<lastmod>{{ date("c", strtotime($page->updated_at)) }}</lastmod>
				<changefreq>{{ $page->changefreq }}</changefreq>
				<priority>{{ $page->priority / 10 }}</priority>
				@if(config('sitemap.hreflang_per_subdomain'))
					@foreach(\Escuccim\Sitemap\Models\Subdomain::all() as $subdomain)
						<xhtml:link rel="alternate"
							hreflang="{{ $subdomain->language }}"
							href="http://{{ $subdomain->subdomain ? $subdomain->subdomain . '.' : '' }}{{ app_domain() }}{{ $page->uri }}" />
					@endforeach

					@if(count(\Escuccim\Sitemap\Models\Subdomain::getDefault()))
						<xhtml:link rel="alternate"
							hreflang="x-default"
							href="http://{{ \Escuccim\Sitemap\Models\Subdomain::getDefault()->subdomain ? \Escuccim\Sitemap\Models\Subdomain::getDefault()->subdomain . '.' : '' }}{{ app_domain() }}{{ $page->uri }}" />
					@endif
				@endif

				@foreach($page->images as $image)
					<image:image>
						<image:loc>http://{{ app_domain() }}{{$image->uri}}</image:loc>
						<image:caption>{{ $image->caption }}</image:caption>
						<image:title>{{ $image->title }}</image:title>
					</image:image>
				@endforeach
			</url>
		@endforeach
	@endforeach
</urlset>