@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Add Static Page</h3>
			</div>
			<div class="panel-body">
				@include('escuccim::errors.list')
				
				{!! Form::model($page, ['method' => 'patch', 'class' => 'form-horizontal', 'action' => ['\Escuccim\Sitemap\Http\Controllers\MapController@update', $page->id]]) !!}
					@include('escuccim::sitemap.pageForm', ['submitButtonText' => 'Update Page'])
				{!! Form::close() !!}
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
										{!! Form::open(['method' => 'delete', 'action' => ['\Escuccim\Sitemap\Http\Controllers\MapController@destroyImage', $image->id]]) !!}
												<button class="btn btn-sm btn-default">Delete</button>
										{!! Form::close() !!}
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
@endsection