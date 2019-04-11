@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="../" class="btn btn-warning mt-3">Go Back</a>
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="text-primary text-center">Edit Customer Profile</h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => ['CustomersController@update', $data['id']], 'method' => 'POST', 'class' => 'form']) !!}
                    {{ Form::hidden('_method', 'PUT') }}
                    <div class="row">
                        <div class="form-group col-md-6">
                                {{ Form::label('Name', null, ['class' => 'control-label']) }}
                                {{ Form::text('name', $data['name'], ['class' => 'form-control', 'required' => 'required', 'id' => 'name']) }}
                        </div>
                        <div class="form-group col-md-6">
                                {{ Form::label('Phone', null, ['class' => 'control-label']) }}
                                {{ Form::text('phone', $data['phone'], ['class' => 'form-control', 'required' => 'required', 'id' => 'phone']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                                {{ Form::label('Address', null, ['class' => 'control-label']) }}
                                {{ Form::text('address', $data['address'], ['class' => 'form-control', 'required' => 'required', 'id' => 'address']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                                {{ Form::label('Balance', null, ['class' => 'control-label']) }}
                                {{ Form::number('balance', $data['balance'], ['class' => 'form-control', 'required' => 'required', 'id' => 'balance']) }}
                        </div>
                    </div>
                    {{ Form::submit('Save', ['class' => 'btn btn-primary btn-block']) }}
                    {!! Form::close() !!}        
                </div>    
            </div>    
        </div>    
    </div>
@endsection
