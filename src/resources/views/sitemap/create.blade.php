@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Add Static Page</h3>
			</div>
			<div class="panel-body">
				@include('errors.list')
				
				{!! Form::model($page, ['url' => 'sitemapadmin', 'class' => 'form-horizontal']) !!}
					@include('sitemap.pageForm', ['submitButtonText' => 'Add Page'])
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection