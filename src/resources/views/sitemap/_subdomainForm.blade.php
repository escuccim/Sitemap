<div class="form-group">
    <label for="subdomain" class="control-label col-md-2">Subdomain:</label>
    <div class="col-md-2">
        <input class="form-control" name="subdomain" type="text" id="subdomain" value="{{$subdomain->subdomain}}">
    </div>
</div>

<div class="form-group">
    <label for="language" class="control-label col-md-2">Language:</label>
    <div class="col-md-2">
        <input class="form-control" name="language" type="text" id="language" value="{{$subdomain->language}}">
    </div>
</div>

<div class="form-group text-center">
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
</div>