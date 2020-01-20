<div class="image-container">
    @foreach($product as $single)
        <img src="{{ asset($single->product->url_image) }}" class="images-small">
        <div class="title-price"><p>Price:</p></div>
        <span class="price"><p class="text-center pt-2">{{ $single->amount }} zł</p></span>
    @endforeach
</div>
