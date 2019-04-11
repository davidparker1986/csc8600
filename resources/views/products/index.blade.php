@extends('layouts.app')

@section('content')
<div class="container">
    @if (isset($data) && $data)
        <?php $x = 3; ?>
        @foreach ($data as $item)
            @if ($x%3 == 0)
            <div class="row ">
            @endif
            <div class="card m-3" style="width:30%">
                <a href="/product/{{$item->id}}">
                    <img class="card-img-top" src="/storage/{{$item->image}}" height="200px" alt="Card image">
                </a>
                <div class="card-body">
                    <a href="/product/{{$item->id}}">
                        <h4 class="card-title">{{$item->name}}</h4>
                    </a>
                    <p class="card-text">{{$item->description}}</p>
                </div>
                <div class="card-footer">
                        {{Form::open(['action' => ['ProductsController@destroy', $item->id], 'method' => 'POST'])}}
                        {{Form::hidden('_method', 'DELETE')}}
                        <a href="#" class="btn btn-success m-1">${{$item->rate}}</a>
                        @can('admin')
                        <a href="/product/{{$item->id}}/edit" class="btn btn-primary m-1"><i class="far fa-edit"></i></a>
                        {!!Form::button("<i class='far fa-trash-alt'></i>", ['class' =>'btn btn-danger', 'onclick'=>"return confirm('Are you sure?')", "type" => "submit"])!!}
                        @endcan
                        {{Form::close()}}
                </div>
            </div>
            @if ($x%3 == 1)
            </div>
            @endif
            <?php $x--; ?>
        @endforeach
    @endif
</div>
@endsection
