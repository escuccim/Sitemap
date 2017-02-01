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
                    <form method="POST" action="/sitemapadmin/subdomain/create" accept-charset="UTF-8" class="form-horizontal">
                        {{csrf_field()}}
                        @include('escuccim::sitemap._subdomainForm', ['submitButtonText' => 'Add Subdomain'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
