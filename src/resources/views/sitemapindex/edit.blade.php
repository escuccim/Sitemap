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
                        <form method="POST" action="/sitemapadmin/index/1" accept-charset="UTF-8" class="form-horizontal">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PATCH">
                            @include('escuccim::sitemapindex._form', ['submitButtonText' => 'Edit Index'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection