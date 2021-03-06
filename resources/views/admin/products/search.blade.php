@extends('layouts.app')
@section('title')
    Search Products
@endsection
@section('content')
    @if ($message = Session::get('error'))
        <div class="alert alert-warning">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="container bg-light mt-5">
        <h5 class="pt-3 ml-3">Search Products</h5>
        <div class="row justify-content-center">
            @include('admin.forms.products.searchProductForm')
        </div>
    </div>
@endsection