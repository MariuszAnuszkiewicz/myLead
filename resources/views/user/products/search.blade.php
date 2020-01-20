@extends('layouts.app')
@section('title')
    Search Products
@endsection
@section('content')
    @guest
    @if ($message = Session::get('error'))
        <div class="alert alert-warning">
            @foreach($message as $alert)
            <strong>{{ $alert }}</strong>
            @endforeach
        </div>
    @endif
    <div class="container bg-light mt-5">
        <h5 class="pt-3 ml-3">Search Products</h5>
        <div class="row justify-content-center">
            @include('user.forms.products.searchProductForm')
        </div>
    </div>
    @endguest
@endsection