@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <h3 class="mt-5 text-center text-success">Customer List</h3>
        <div class="col-md-12 mt-3">
            <a href="/customer/create" class="btn btn-block btn-lg btn-primary">Add New</a>
        </div>
        <div class="col-md-12 mt-4">
            <div class="table-responsive">
                <table class="table table-striped" id="mytable"> 
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Balance</th>
                            <th>Discount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($data) && $data)
                            @foreach ($data as $row)
                                <tr>
                                    <td><a href="/customer/{{$row->id}}">{{$row->name}}</a></td>
                                    <td>{{$row->address}}</td>
                                    <td>{{$row->phone}}</td>
                                    <td>{{$row->balance}}</td>
                                    <td>{{$row->discount}}</td>
                                    <td>
                                        {{Form::open(['action' => ['CustomersController@destroy', $row->id], 'method' => 'POST'])}}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            <a href="/customer/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</a>
                                            {{Form::submit('Delete', ['class' =>'btn btn-sm btn-danger', 'onclick'=>"return confirm('Are you sure?')"])}}
                                        {{Form::close()}}
                                    </td>
                                </tr>
                            @endforeach                            
                        @endif
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>                
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
$(document).ready( function () {
    $('#mytable').DataTable();
    // alert(1);
});
</script> 
@endsection
