@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Add Subdomain</h3>
                </div>
                <div class="panel-body">
                    @include('escuccim::errors.list')
                    <form method="POST" action="/sitemapadmin/subdomain/{{$subdomain->id}}" accept-charset="UTF-8" class="form-horizontal">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PATCH">
                        @include('escuccim::sitemap._subdomainForm', ['submitButtonText' => 'Edit Subdomain'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
