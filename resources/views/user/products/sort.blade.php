@extends('layouts.app')
@section('title')
    User Zone
@endsection
@section('content')
    @guest
    <div class="container bg-success mt-5 mb-5 pb-4 col-md-9">
        @include('user.forms.products.searchProductForm')
    </div>

    <div class="container bg-danger mt-5 mb-5 pb-4 col-md-9">
        @include('user.forms.products.sortProductForm')
    </div>
    <div class="container bg-light mt-5 col-md-9">
        @if ($message = Session::get('error'))
            <div class="alert alert-warning">
                @if (isset($message))
                    @foreach($message as $alert)
                        <strong>{{ $alert }}</strong>
                    @endforeach
                @endif
            </div>
        @endif
        <h5 class="pt-3 ml-3">List of Products</h5>
        <div class="row justify-content-center">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Detail Product</th>
                    <th class="text-center">Describe</th>
                    <th class="text-center">Picture</th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($products))
                    @foreach($products as $product)
                        <tr>
                            <td class="text-center pt-3">{{ $product->id }}</td>
                            <td class="text-center pt-3">{{ $product->category }}</td>
                            <td class="text-center pt-3">{{ Str::limit($product->name, 50, ' ... ') }}</td>
                            <td class="text-center pt-3">
                                <div class="pt-0">
                                    <form action="{{ route('user.show_product', $product->id) }}" method="post">
                                        @csrf
                                        <div class="mt-0">
                                            <input type="submit" name="submit_show_product" class="btn btn-success" value="Show">
                                        </div>
                                    </form>
                                </div>
                            </td>
                            <td class="text-center pt-3">{{ Str::limit($product->describe, 75, ' ... ') }}</td>
                            <td class="cell-user-images pt-3">
                                <img src="{{ asset($product->url_image) }}" class="images">
                                <span class="cell-user-price"><p class="text-center pt-2">{{ $product->prices[0]->amount }} zł</p></span>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            @if (!empty($products))
                <div id="paginate">
                    {!! $products->links() !!}
                </div>
            @endif
        </div>
    </div>
    @endguest
@endsection