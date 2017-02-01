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
					<form action="/sitemapadmin" class="form-horizontal" method="post">
						{{ csrf_field() }}
						@include('escuccim::sitemap.pageForm', ['submitButtonText' => 'Add Page'])
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection