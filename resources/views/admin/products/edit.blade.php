@extends('layouts.app')
@section('title')
    Edit Products
@endsection
@section('content')
    <div class="container bg-light mt-5">
        <h5 class="pt-3 ml-3">Edit Products</h5>
        <div class="row justify-content-center">
            @include('admin.forms.products.editProductForm')
        </div>
    </div>
@endsection