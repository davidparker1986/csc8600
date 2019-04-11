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
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset("img/userimg.png") }}" class="rounded-circle responsive" alt="User Image">
                    <br>
                    <h4>{{$data['name']}}</h4>
                    <h5 class="text-<?=($data['balance'] > 0) ? 'success' : 'danger';?>" >{{$data['balance'] . env("APP_CURRENCY_AFTER")}}</h5>
                    <p>{{$data['phone']}}</p>
                    <p>{{$data['address']}}</p>
                </div>            
            </div>            
        </div>
        <div class="col-md-8">
            <h5 class="text-center text-success">History</h5>
            <div class="table-responsive scrolly-table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Ref</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Shawon</td>
                            <td>1200</td>
                            <td>Inv#123</td>
                        </tr>
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
@endsection
