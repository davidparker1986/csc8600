@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="./" class="btn btn-warning mt-3">Go Back</a>
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="text-primary text-center">Create Customer Profile</h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => 'CustomersController@store', 'method' => 'POST', 'class' => 'form']) !!}
                    <div class="row">
                        <div class="form-group col-md-6">
                                {{ Form::label('Name', null, ['class' => 'control-label']) }}
                                {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'name']) }}
                        </div>
                        <div class="form-group col-md-6">
                                {{ Form::label('Phone', null, ['class' => 'control-label']) }}
                                {{ Form::text('phone', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'phone']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                                {{ Form::label('Address', null, ['class' => 'control-label']) }}
                                {{ Form::text('address', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'address']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                                {{ Form::label('Balance', null, ['class' => 'control-label']) }}
                                {{ Form::number('balance', 0, ['class' => 'form-control', 'required' => 'required', 'id' => 'balance']) }}
                        </div>
                    </div>
                    {{ Form::submit('Save', ['class' => 'btn btn-primary btn-block']) }}
                    {!! Form::close() !!}        
                </div>    
            </div>    
        </div>    
    </div>
@endsection
