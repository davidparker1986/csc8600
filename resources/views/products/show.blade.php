@extends('layouts.app')
@section('style')
<style>
    .responsive {
        width: 35%;
        height: auto;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="card col-lg-4">
            <img src="/storage/{{$data->image}}" alt="{{$data->name}} Image" class="card-img-top">
        </div>
        <div class="card col-lg-8 p-5">
            {{Form::open(['action' => ['CartsController@store'], 'method' => 'POST'])}}
            <h2 class="card-title text-primary">{{$data->name}}</h2>
            <p class="card-text">{{$data->description}}</p>
            <h4 class="text-success">${{$data->rate}}</h4>
            {{Form::hidden("user_id", Auth::user()->id)}}
            {{Form::hidden("product_id", $data->id)}}
            <div class="row col-lg-4">
                <div class="input-group">
                    {{Form::number("qty", 1,['class' =>'form-control'])}}
                    <div class="input-group-append">
                        {!!Form::button("Add to Cart", ['class' =>'btn btn-primary', "type" => "submit"])!!}
                    </div>
                </div>
            </div>
            {{Form::close()}}

        </div>
    </div>
    <div class="row mt-4">
        <div class="card col-lg-12">
            <div class="card-header">
                <h2 class="card-title">Feedbacks</h2>
            </div>
            <div class="card-body">
                @if (isset($data->feedbacks) && count($data->feedbacks))
                    @foreach ($data->feedbacks as $item)
                        <div class="card cl-lg-12 my-3">
                            <div class="card-header"><b>{{$item->user->name}}</b> said:</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        {{$item->text}}        
                                    </div>
                                    <div class="col-md-2">
                                        @if(Auth::check() && (Auth::user()->id == $item->user->id || Auth::user()->role == 'admin'))
                                        {{Form::open(['action' => ['FeedbacksController@destroy', $item->id], 'method' => 'POST'])}}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {!!Form::button("<i class='far fa-trash-alt'></i>", ['class' =>'btn btn-danger', 'onclick'=>"return confirm('Are you sure?')", "type" => "submit"])!!}
                                        {{Form::close()}}
                                        @endcan
                                    </div>
                                </div>        
                            </div>
                            <div class="card-footer">{{$item->created_at}}</div>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted">None of the users gave any feedback yet.</p>
                @endif
                {{Form::open(['action' => ['FeedbacksController@store'], 'method' => 'POST'])}}
                {{Form::hidden("user_id", Auth::user()->id)}}
                {{Form::hidden("product_id", $data->id)}}
                <div class="row col-lg-12">
                    <div class="form-group">
                        {{Form::textArea("feedback", null,['class' =>'form-control'])}}
                        {!!Form::button("Send Feedback", ['class' =>'btn btn-primary mt-3', "type" => "submit"])!!}
                    </div>
                </div>
                {{Form::close()}}
    
            </div>
        </div>
    </div>
</div>
@endsection
