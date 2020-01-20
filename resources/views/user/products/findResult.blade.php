@extends('layouts.app')
@section('title')
    Result Search Products
@endsection
@section('content')
    @if ($message = Session::get('error'))
        <div class="alert alert-warning">
           <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="container bg-light mt-5">
        <h5 class="pt-3 ml-3">Result Search Products</h5>
        <div class="row justify-content-center">
            <div class="row col-md-10 pt-5">
               @include('user.profile.resultProfile')
            </div>
        </div>
    </div>
@endsection