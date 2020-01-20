@extends('layouts.app')
@section('title')
    List of Prices
@endsection
@section('content')
    <div class="container bg-light mt-5 col-md-3">
        <h5 class="pt-3 ml-3">List of Prices</h5>
        <div class="row justify-content-center">
            <table class="table table-dark">
                <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Product Id</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($prices as $price)
                    <tr>
                        <td class="pt-3 text-center">{{ $price->id }}</td>
                        <td class="pt-3 text-center">{{ $price->amount }}</td>
                        <td class="pt-3 text-center">{{ $price->product_id }}</td>
                        <td class="form-inline text-center">
                            <div class="ml-2">
                                <form action="{{ route('admin.edit_price', $price->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="mt-0">
                                        <input type="submit" name="submit_edit_price" class="btn btn-info" value="Edit">
                                    </div>
                                </form>
                            </div>
                            <div class="ml-2">
                                <form action="{{ route('admin.destroy_price', $price->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="mt-0">
                                        <input type="submit" name="submit_delete_price" class="btn btn-danger" value="Delete">
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection