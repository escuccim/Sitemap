@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Add Sitemap Index</h3>
                    </div>
                    <div class="panel-body">
                        @include('escuccim::errors.list')

                        {!! Form::model($sitemap, ['url' => 'sitemapadmin/index', 'class' => 'form-horizontal']) !!}
                        @include('escuccim::sitemapindex._form', ['submitButtonText' => 'Add Index'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection