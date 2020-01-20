@extends('layouts.app')
@section('title')
    List of Products
@endsection
@section('content')
    <div class="container bg-light mt-5 col-md-9">
        <h5 class="pt-3 pb-2 ml-3">List of Products</h5>
        <div class="row justify-content-center">
            @if (!empty($product))
            <table class="table table-dark">
                <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Describe</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($product as $single)
                        <tr>
                            <td class="text-center pt-3">{{ $single->product->id }}</td>
                            <td class="text-center pt-3">{{ $single->product->category }}</td>
                            <td class="text-center pt-3">{{ Str::limit($single->product->name, 50, ' ... ') }}</td>
                            <td class="text-center pt-3">{{ Str::limit($single->product->describe, 75, ' ... ') }}</td>
                            <td class="text-center pt-3">{{ $single->amount }}</td>
                            <td class="form-inline text-center">
                                <div class="ml-2">
                                    <form action="{{ route('admin.show_product', $single->id) }}" method="post">
                                        @csrf
                                        <div class="mt-0">
                                            <input type="submit" name="submit_show_product" class="btn btn-success" value="Show">
                                        </div>
                                    </form>
                                </div>
                                <div class="ml-2">
                                    <form action="{{ route('admin.edit_product', $single->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                        <div class="mt-0">
                                            <input type="submit" name="submit_edit_product" class="btn btn-info" value="Edit">
                                        </div>
                                    </form>
                                </div>
                                <div class="ml-2">
                                    <form action="{{ route('admin.destroy_product', $single->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                        <div class="mt-0">
                                            <input type="submit" name="submit_delete_product" class="btn btn-danger" value="Delete">
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            @else
                <h5>{{ "Products is Empty" }}</h5>
            @endif
        </div>
    </div>
@endsection