<div class="form-group">
	{!! Form::label('name', 'Name:', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-10">
		{!! Form::text('name', null, ['class' => 'form-control', 'v-model' => 'name']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('uri', 'URI:', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-10">
		{!! Form::text('uri', null, ['class' => 'form-control', 'v-model' => 'uri']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('priority', 'Priority:', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-1">
		{!! Form::text('priority', null, ['class' => 'form-control', 'v-model' => 'priority']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('changefreq', 'Change Frequency:', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-5">
		{{ Form::select('changefreq', $changefreq, null, ['class' => 'form-control']) }}
	</div>
</div>

<div class="form-group text-center">
	<button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
</div>