<div class="row mt-4 ml-2 mb-3 col-lg-3">
    <div class="form-group">
       <form action="{{route('admin.create_product')}}" method="post">
           @csrf
          <label for="category-label" class="mt-2"><b>Category</b></label>
          <input type="text" name="category" class="form-control">
           @if ($errors->has('category'))
               <span class="form-alert"><p>{{ $errors->first('category') }}</p></span>
           @endif
          <label for="name-label" class="mt-2"><b>Name</b></label>
          <input type="text" name="name" class="form-control">
           @if ($errors->has('name'))
               <span class="form-alert"><p>{{ $errors->first('name') }}</p></span>
           @endif
          <label for="describe-label" class="mt-2"><b>Describe</b></label>
          <input type="text" name="describe" class="form-control">
           @if ($errors->has('describe'))
               <span class="form-alert"><p>{{ $errors->first('describe') }}</p></span>
           @endif
           <label for="amount-label" class="mt-2"><b>Amount</b></label>
           <input type="number" name="amount" min="1" max="500" class="form-control">

           <label for="url-image-label" class="mt-2"><b>Url Image</b></label>
           <input type="text" name="url_image" class="form-control" value="">
           <div class="mt-3">
              <input type="submit" name="submit_add_product" class="btn btn-primary" value="Submit">
           </div>
       </form>
    </div>
</div>