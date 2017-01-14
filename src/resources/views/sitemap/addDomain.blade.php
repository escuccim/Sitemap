@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Add Subdomain</h3>
                </div>
                <div class="panel-body">
                    @include('escuccim::errors.list')

                    {!! Form::open(['url' => 'sitemapadmin/subdomain/create', 'class' => 'form-horizontal']) !!}
                        @include('escuccim::sitemap._subdomainForm', ['submitButtonText' => 'Add Subdomain'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
