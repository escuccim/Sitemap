<input type="hidden" name="page_id" id="page_id" value="{{$image->page_id}}">

<div class="form-group">
    <label for="caption" class="control-label col-md-2">Caption:</label>
    <div class="col-md-10">
        <input class="form-control" name="caption" type="text" value="{{$image->caption}}" id="caption">
    </div>
</div>

<div class="form-group">
    <label for="title" class="control-label col-md-2">Title:</label>
    <div class="col-md-10">
        <input class="form-control" name="title" type="text" value="{{$image->title}}" id="title">
    </div>
</div>

<div class="form-group">
    <label for="uri" class="control-label col-md-2">URI:</label>
    <div class="col-md-10">
        <input class="form-control" name="uri" type="text" value="{{$image->uri}}" id="uri">
    </div>
</div>

<div class="form-group text-center">
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
</div>