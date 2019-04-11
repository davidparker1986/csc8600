@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="./" class="btn btn-warning mt-3">Go Back</a>
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="text-primary text-center">Add New Product</h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => 'ProductsController@store', 'method' => 'POST', 'class' => 'form',  'enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        <div class="form-group col-md-12">
                                {{ Form::label('Name', null, ['class' => 'control-label']) }}
                                {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'name', 'autofocus' => 'autofocus']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                                {{ Form::label('Rate', null, ['class' => 'control-label']) }}
                                {{ Form::number('rate', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'rate']) }}
                        </div>
                        <div class="form-group col-md-6">
                                {{ Form::label('Image', null, ['class' => 'control-label']) }}
                                {{ Form::file('image', ['class' => 'form-control', 'id' => 'image']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                                {{ Form::label('Description', null, ['class' => 'control-label']) }}
                                {{ Form::textArea('description', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'description']) }}
                        </div>
                    </div>
                    {{ Form::submit('Save', ['class' => 'btn btn-primary btn-block']) }}
                    {!! Form::close() !!}        
                </div>    
            </div>    
        </div>    
    </div>
@endsection
