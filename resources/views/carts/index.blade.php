@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">My Cart</h2>
    @if (isset($data) && count($data))
    {{Form::open(['action' => ['OrdersController@store'], 'method' => 'POST', "class" => "form-inline"])}}
    {{Form::hidden("user_id", Auth::user()->id)}}
    <table class="table table-hover">
        @foreach ($data as $item)
        <tr>
            <td style="width:15%">
                <a href="/product/{{$item->product->image}}">
                    <img src="/storage/{{$item->product->image}}" alt="{{$item->product->image}} image" style="width:150px;" class="img-fluid">
                </a>
            </td>
            <td style="width:70%">
                <h3 class="text-primary">{{$item->product->name}}</h3>
                <p class="text-muted">{{$item->product->description}}</p>
                {{Form::open(['action' => ['CartsController@destroy', $item->id], 'method' => 'POST'])}}
                {{Form::hidden('_method', 'DELETE')}}
                {!!Form::button("", ['class' =>'btn btn-danger btn-sm', 'onclick'=>"return confirm('Are you sure?')", "type" => "submit"])!!}
                {{Form::close()}}
            </td>
            <td style="width:15%">
                    {{Form::hidden("product_id[]", $item->product->id)}}
                    {{Form::hidden("rate[]", $item->product->rate)}}

                    <label class="text-success">${{$item->product->rate}}x&nbsp;
                        {{Form::number("qty[]", $item->qty, ['class' => 'form-control form-control-sm col-md-5'])}}Pcs
                    </label>
            </td>
        </tr>
        @endforeach
    </table>

        {!!Form::button("Place Order", ['class' =>'btn btn-primary mt-3 btn-block', "type" => "submit"])!!}
        {{Form::close()}}
    @else
        <p class="text-center text-muted">No Product Found in your cart. Add products to cart and come back!</p>
    @endif
</div>
@endsection
