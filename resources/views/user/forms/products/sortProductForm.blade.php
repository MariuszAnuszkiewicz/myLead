<div class="container-fluid mt-4 ml-2 mb-3 col-md-12">
    <form action="{{route('user.sort_product')}}" method="post">
        @csrf
        <div class="row offset-5">
            <div class="col-md-3">
                <label for="category-label" class="mt-3 ml-5"><p class="text-center"><b class="text-light">Sort Products</b></p></label>
                <select name="product_sort" class="form-control">
                    <option value="DESC">decrease</option>
                    <option value="ASC">increase</option>
                    <option value="BOOKS">books</option>
                    <option value="MOVIES">movies</option>
                    <option value="MUSIC">music</option>
                </select>
                <div class="col-md-3 mt-3 offset-3">
                    <input type="submit" name="submit_sort_products" class="btn btn-primary" value="Sort">
                </div>
            </div>
        </div>
    </form>
</div>