@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Add Image</h3>
				</div>
				<div class="panel-body">
					@include('escuccim::errors.list')

					{!! Form::model($image, ['url' => 'sitemapadmin/image/' . $image->page_id, 'class' => 'form-horizontal']) !!}
						@include('escuccim::sitemap._imageForm', ['submitButtonText' => 'Add Image'])
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection