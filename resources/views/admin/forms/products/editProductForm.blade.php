<div class="row mt-4 ml-2 mb-3 col-lg-3">
    <div class="form-group">
        @foreach($product as $single)
            <form action="{{ route('admin.update_product', $single->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="category-label" class="mt-2"><b>Category</b></label>
                <input type="text" name="category" class="form-control" value="{{$single->product->category}}">
                @if ($errors->has('category'))
                    <span class="form-alert"><p>{{ $errors->first('category') }}</p></span>
                @endif
                <label for="name-label" class="mt-2"><b>Name</b></label>
                <input type="text" name="name" class="form-control" value="{{$single->product->name}}">
                @if ($errors->has('name'))
                    <span class="form-alert"><p>{{ $errors->first('name') }}</p></span>
                @endif
                <label for="describe-label" class="mt-2"><b>Describe</b></label>
                <input type="text" name="describe" class="form-control" value="{{$single->product->describe}}">
                @if ($errors->has('describe'))
                    <span class="form-alert"><p>{{ $errors->first('describe') }}</p></span>
                @endif
                <label for="amount-label" class="mt-2"><b>Amount</b></label>
                <input type="number" name="amount" class="form-control" value="{{ $single->amount }}">

                <label for="url-image-label" class="mt-2"><b>Url Image</b></label>
                <input type="text" name="url_image" class="form-control" value="{{ $single->product->url_image }}">
                <div class="mt-3">
                    <input type="submit" name="submit_update_product" class="btn btn-primary" value="Submit">
                </div>
            </form>
        @endforeach
    </div>
</div>