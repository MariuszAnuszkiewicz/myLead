<div class="row mt-4 ml-2 mb-3 col-lg-3">
    <div class="form-group">
        <form action="{{route('admin.create_price')}}" method="post">
            @csrf
            <label for="amount-label" class="mt-2"><b>Price</b></label>
            <input type="number" name="amount" min="1" max="500" class="form-control">
            @if ($errors->has('amount'))
                <span class="form-alert"><p>{{ $errors->first('amount') }}</p></span>
            @endif
            <label for="productId-label" class="mt-2"><b>Product Id</b></label>
            <select name="product_id" class="form-control">
                @foreach($products as $product)
                   <option value="{{$product->id}}">{{$product->id}}</option>
                @endforeach
            </select>
            @if ($errors->has('product_id'))
                <span class="form-alert"><p>{{ $errors->first('product_id') }}</p></span>
            @endif
            <div class="mt-3">
                <input type="submit" name="submit_add_price" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
</div>