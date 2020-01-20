<div class="image-container">
    <img src="{{ asset($product->url_image) }}" class="images-small">
    <div class="title-price"><p>Price:</p></div>
    <span class="price"><p class="text-center pt-2">{{ $product->prices[0]->amount }} zł</p></span>
</div>