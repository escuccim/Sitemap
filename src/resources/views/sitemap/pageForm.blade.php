<div class="form-group">
	<label for="name" class="control-label col-md-2">Name:</label>
	<div class="col-md-10">
		<input class="form-control" v-model="name" name="name" type="text" value="{{ $page->name }}" id="name">
	</div>
</div>

<div class="form-group">
	<label for="uri" class="control-label col-md-2">URI:</label>
	<div class="col-md-10">
		<input class="form-control" v-model="uri" name="uri" type="text" value="{{ $page->uri }}" id="uri">
	</div>
</div>

<div class="form-group">
	<label for="priority" class="control-label col-md-2">Priority:</label>
	<div class="col-md-1">
		<input class="form-control" v-model="priority" name="priority" type="text" value="{{ $page->priority }}" id="priority">
	</div>
</div>

<div class="form-group">
	<label for="changefreq" class="control-label col-md-2">Change Frequency:</label>
	<div class="col-md-5">
		<select class="form-control" id="changefreq" name="changefreq">
			@foreach($changefreq as $key => $value)
				<option value="{{$key}}" {{ $page->changefreq == $key ? 'SELECTED="selected"' : '' }}>{{$value}}</option>
			@endforeach
		</select>
	</div>
</div>

<div class="form-group text-center">
	<button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
</div>