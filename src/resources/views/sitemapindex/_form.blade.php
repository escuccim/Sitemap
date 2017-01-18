<div class="form-group">
    {!! Form::label('uri', 'URI:', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('uri', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('model', 'Table:', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('model', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group text-center">
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
</div>