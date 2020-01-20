<div class="row mt-4 ml-2 mb-3 col-lg-3">
    <div class="form-group">
        @foreach($product as $single)
        <form action="{{ route('admin.update_price', $single->id) }}" method="post">
            @csrf
            @method('PUT')
            <label for="amount-label" class="mt-2"><b>Price</b></label>
            <input type="number" name="amount" value="{{ $single->amount }}" class="form-control">
            @if ($errors->has('amount'))
                <span class="form-alert"><p>{{ $errors->first('amount') }}</p></span>
            @endif
            <label for="productId-label" class="mt-2"><b>Product Id</b></label>
            <input type="text" name="product_id" value="{{ $single->product_id }}" class="form-control">
            <div class="mt-3">
                <input type="submit" name="submit_update_price" class="btn btn-primary" value="Submit">
            </div>
        </form>
        @endforeach
    </div>
</div>