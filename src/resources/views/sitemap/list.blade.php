@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			{{-- Section for Pages --}}
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<h3>Static Page Admin</h3>
						</div>
						<div class="col-md-2">
							<a href="/sitemapadmin/create" class="btn btn-primary">Add Page</a>
						</div>
					</div>
				</div>

				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>URI</th>
								<th>Priority</th>
								<th>Change Freq</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						@foreach($pages as $page)
							<tr>
								<td>{{ $page->name }}</td>
								<td>{{ $page->uri }}</td>
								<td>{{ $page->priority }}</td>
								<td>{{ $page->changefreq }}</td>
								<td width="100px;"><a class="btn btn-primary btn-sm" href="/sitemapadmin/{{ $page->id }}/edit">Edit</a></td>
								<td width="100px;"><a class="btn btn-default btn-sm delete-page" data-val="{{$page->id}}">Delete</a></td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>

			{{-- Section for sitemaps --}}
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<h3>Sitemap Admin</h3>
						</div>
						<div class="col-md-2">
							<a href="{{ action('\Escuccim\Sitemap\Http\Controllers\MapController@createSitemap') }}" class="btn btn-primary">Add Sitemap</a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>URI</th>
							</tr>
						</thead>
						<tbody>
							@foreach($sitemaps as $sitemap)
								<tr>
									<td>{{ $sitemap->uri }}</td>
									<td width="100px;"><a class="btn btn-primary btn-sm" href="/sitemapadmin/index/{{ $sitemap->id }}">Edit</a></td>
									<td width="100px;"><a class="btn btn-default btn-sm delete-index" data-val="{{$sitemap->id}}">Delete</a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

			{{-- Section for subdomains --}}
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<h3>Subdomain Admin</h3>
						</div>
						<div class="col-md-2">
							<a href="{{ action('\Escuccim\Sitemap\Http\Controllers\MapController@createSubdomain') }}" class="btn btn-primary">Add Subdomain</a>
						</div>
					</div>
				</div>

				<div class="panel-body">
					{!! Form::open(['action' => '\Escuccim\Sitemap\Http\Controllers\MapController@setDefault']) !!}
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Subdomain</th>
								<th>Language</th>
								<th>Default</th>
							</tr>
						</thead>
						<tbody>
							@foreach($subdomains as $subdomain)
								<tr>
									<td>{{ $subdomain->subdomain }}</td>
									<td>{{ $subdomain->language }}</td>
									<td><input type="radio" name="default" value="{{ $subdomain->id }}" {{ $subdomain->default ? 'checked="CHECKED"' : '' }} onChange="this.form.submit()"></td>
									<td width="100px;"><a class="btn btn-primary btn-sm" href="{{ action('\Escuccim\Sitemap\Http\Controllers\MapController@editSubdomain', $subdomain->id) }}">Edit</a></td>
									<td width="100px;"><a class="btn btn-default btn-sm delete-subdomain" data-val="{{$subdomain->id}}">Delete</a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@if(isUserAdmin())
	<script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$(".delete-page").click(function(e){
			e.preventDefault();
			var page = $(this).data('val');
			var x = confirm("Are you sure you want to delete this?");
			if(x){
				$.ajax({
					url: '/sitemapadmin/' + page,
					type: 'delete',
					success: function(result){
					},
					error: function(result){
					},
					complete: function(result){
						location.reload();
					},
				});
			}
		});
		$(".delete-subdomain").click(function(e){
			e.preventDefault();
			var id = $(this).data('val');
			var x = confirm("Are you sure you want to delete this?");
			if(x){
				$.ajax({
					url: '/sitemapadmin/subdomain/' + id,
					type: 'delete',
					success: function(result){
					},
					error: function(result){
					},
					complete: function(result){
						location.reload();
					},
				});
			}
		});
        $(".delete-index").click(function(e){
            e.preventDefault();
            var id = $(this).data('val');
            var x = confirm("Are you sure you want to delete this?");
            if(x){
                $.ajax({
                    url: '/sitemapadmin/index/' + id,
                    type: 'delete',
                    success: function(result){
                    },
                    error: function(result){
                    },
                    complete: function(result){
                        location.reload();
                    },
                });
            }
        });
	</script>
@endif
@endsection