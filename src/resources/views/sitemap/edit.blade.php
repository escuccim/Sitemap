@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Add Static Page</h3>
				</div>
				<div class="panel-body">
					@include('escuccim::errors.list')

					<form method="POST" action="/sitemapadmin/{{$page->id}}/edit" accept-charset="UTF-8" class="form-horizontal">
						{{csrf_field()}}
						<input name="_method" type="hidden" value="PATCH">
						@include('escuccim::sitemap.pageForm', ['submitButtonText' => 'Update Page'])
					</form>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Images</h3>
				</div>
				<div class="panel-body">
					@if(count($page->images))
						<div class="list-group">
							<div class="list-group-item">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-2"><strong>Title</strong></div>
									<div class="col-md-3"><strong>Caption</strong></div>
									<div class="col-md-2"><strong>URI</strong></div>
								</div>
							</div>
							@foreach($page->images as $image)
								<div class="list-group-item">
									<div class="row">
										<div class="col-md-1"><img src="{{ $image->uri }}" style="max-height: 40px"></div>
										<div class="col-md-2">{{ $image->title }}</div>
										<div class="col-md-3">{{ $image->caption }}</div>
										<div class="col-md-3">{{ $image->uri }}</div>
										<div class="col-md-1"><a href="/sitemapadmin/image/{{$image->id}}/edit" class="btn btn-sm btn-primary">Edit</a></div>
										<div class="col-md-1">
											<form method="POST" action="/sitemapadmin/image/{{$image->id}}" accept-charset="UTF-8">
												<input name="_method" type="hidden" value="DELETE">
												{{ csrf_field() }}
													<button class="btn btn-sm btn-default">Delete</button>
											</form>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					@endif
					<div align="center"><a href="/sitemapadmin/image/{{$page->id}}/create" class="btn btn-primary">Add Image</a></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection