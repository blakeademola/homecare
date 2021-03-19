@extends('layouts.admin')

@section('title')
    Admin Dashboard
@endsection

{{--HIDE THE MAIN CONTENT BODY--}}
@section('content-card-attr', 'd-none')

@section('pre-content')
    <h2>

        Welcome, Admin {{ \Auth::user()->first_name }}
    </h2>

    <hr/>

    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Item Bought</th>
            <th scope="col">Quantity</th>
            <th scope="col">Date</th>
            <th scope="col">Cost</th>
        </tr>
        </thead>
        <tbody>
        @forelse($transactions as $key=>$transaction)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$transaction->user->first_name .' '. $transaction->user->last_name}}</td>
                <td>{{$transaction->product->name}}</td>
                <td>{{$transaction->quantity}}</td>
                <td>{{\Carbon\Carbon::parse($transaction->created_at)->diffForHumans()}}</td>
                <td>${{$transaction->quantity * $transaction->product->price }}</td>
            </tr>
        @empty
            <tr> No existing transaction</tr>
        @endforelse
        </tbody>
    </table>
@endsection


