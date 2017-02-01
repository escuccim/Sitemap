<div class="form-group">
    <label for="uri" class="control-label col-md-2">URI:</label>
    <div class="col-md-10">
        <input class="form-control" name="uri" type="text" id="uri" value="{{$sitemap->uri}}">
    </div>
</div>

<div class="form-group">
    <label for="model" class="control-label col-md-2">Table:</label>
    <div class="col-md-10">
        <input class="form-control" name="model" type="text" id="model" value="{{$sitemap->model}}">
    </div>
</div>

<div class="form-group text-center">
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
</div>