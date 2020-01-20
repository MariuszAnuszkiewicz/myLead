<div class="container-fluid pt-4 col-md-5 offset-4">
    <div class="row mt-4 ml-2 mb-3 col-md-9 bg-light">
        <div class="form-group offset-3">
            <form action="{{route('user.search_product')}}" method="post">
                @csrf
                <label for="category-label" class="mt-2 ml-5"><p class="text-center"><b>Search Product</b></p></label>
                <input type="text" name="search" class="form-control">
                @if ($errors->has('search'))
                    <span class="form-alert"><p>{{ $errors->first('search') }}</p></span>
                @endif
                <div class="mt-3 offset-4">
                    <input type="submit" name="submit_search_product" class="btn btn-primary" value="Search">
                </div>
            </form>
        </div>
    </div>
</div>