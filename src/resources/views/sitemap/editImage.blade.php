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
					<form method="POST" action="/sitemapadmin/image/1/edit" accept-charset="UTF-8" class="form-horizontal">
						{{csrf_field()}}
						<input name="_method" type="hidden" value="PATCH">
						@include('escuccim::sitemap._imageForm', ['submitButtonText' => 'Edit Image'])
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection