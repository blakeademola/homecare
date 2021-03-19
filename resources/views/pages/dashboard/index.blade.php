@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

{{--HIDE THE MAIN CONTENT BODY--}}
@section('content-card-attr', 'd-none')

@section('pre-content')
    <h2>

        Welcome, {{ \Auth::user()->first_name }}
    </h2>

    <hr/>

    @include('layouts.product_purchase');
@endsection


