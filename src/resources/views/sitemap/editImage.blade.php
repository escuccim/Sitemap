@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Add Image</h3>
			</div>
			<div class="panel-body">
				@include('escuccim::errors.list')
				
				{!! Form::model($image, ['action' => ['\Escuccim\Sitemap\Http\Controllers\MapController@editImage', $image->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}
					@include('escuccim::sitemap._imageForm', ['submitButtonText' => 'Edit Image'])
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection