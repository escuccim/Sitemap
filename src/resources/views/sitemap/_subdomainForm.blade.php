<div class="form-group">
    {!! Form::label('subdomain', 'Subdomain:', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-2">
        {!! Form::text('subdomain', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('language', 'Language:', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-2">
        {!! Form::text('language', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group text-center">
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
</div>