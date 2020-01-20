<div class="row mt-4 ml-2 mb-3 col-lg-3">
    <div class="form-group">
        <form action="{{route('admin.search')}}" method="post">
            @csrf
            <label for="category-label" class="mt-2"><b>Search Product</b></label>
            <input type="text" name="search" class="form-control">
            @if ($errors->has('search'))
                <span class="form-alert"><p>{{ $errors->first('search') }}</p></span>
            @endif
            <div class="mt-3">
                <input type="submit" name="submit_search_product" class="btn btn-primary" value="Search">
            </div>
        </form>
    </div>
</div>