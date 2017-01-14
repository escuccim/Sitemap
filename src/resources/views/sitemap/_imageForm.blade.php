{!! Form::hidden('page_id') !!}

<div class="form-group">
    {!! Form::label('caption', 'Caption:', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('caption', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('uri', 'URI:', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('uri', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group text-center">
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
</div>