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
            <div class="row pt-5">
                <ul>
                    @foreach($findProducts as $product)
                       <li class="find-result"><h5>{{ $product->name }}</h5></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection