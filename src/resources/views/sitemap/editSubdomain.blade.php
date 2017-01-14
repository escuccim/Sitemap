@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Add Subdomain</h3>
                </div>
                <div class="panel-body">
                    @include('errors.list')

                    {!! Form::model($subdomain, ['url' => 'sitemapadmin/subdomain/' . $subdomain->id, 'method' => 'patch', 'class' => 'form-horizontal']) !!}
                        @include('sitemap._subdomainForm', ['submitButtonText' => 'Edit Subdomain'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
