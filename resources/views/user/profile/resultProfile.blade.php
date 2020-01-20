<div class="container bg-light mt-2">
    @guest
    <h5 class="pt-0 ml-3">Show Details Product</h5>
    <div class="row justify-content-center pb-4">
        <div class="col-md-8 pt-4">
            @foreach($findProducts as $product)
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <h5><strong>Category:</strong></h5>
                        <p class="details-product pl-4">{{ $product->category }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <h5><strong>Name:</strong></h5>
                        <p class="details-product pl-4">{{ $product->name }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <h5><strong>Describe:</strong></h5>
                        <p class="details-product pl-4">{{ $product->describe }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('user.components.imageContainer')
            </div>
            @endforeach
        </div>
    </div>
    @endguest
</div>


