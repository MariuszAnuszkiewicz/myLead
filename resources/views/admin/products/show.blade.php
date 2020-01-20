@extends('layouts.app')
@section('title')
    Show Product
@endsection
@section('content')
    <div class="container bg-light mt-5 pb-5">
        @auth
        <h5 class="pt-3 ml-3">Show Product</h5>
        <div class="row justify-content-center">
            @foreach($product as $single)
            <div class="col-md-8 pt-4">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <h5><strong>Category:</strong></h5>
                            <p class="details-product pl-4">{{ $single->product->category }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <h5><strong>Name:</strong></h5>
                            <p class="details-product pl-4">{{ $single->product->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <h5><strong>Describe:</strong></h5>
                            <p class="details-product pl-4">{{ $single->product->describe }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @include('admin.components.imageContainer')
                </div>
            </div>
            @endforeach
        </div>
        @endauth
    </div>
@endsection