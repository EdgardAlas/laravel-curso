<div class="card">
    <img src="{{ asset($product->images[0]->path) }}" class="card-img-top" alt="" height="500" />
    <div class="card-body">
        <h4 class="text-end">${{ $product->price }}</h4>
        <h5 class="card-title">
            <p>{{ $product->title }}</p>
        </h5>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text">{{ $product->stock }} left</p>
        @if (isset($cart))
            <form
                action="{{ route('products.carts.destroy', [
                    'cart' => $cart->id,
                    'product' => $product->id,
                ]) }}"
                class="d-inline" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger">Remove to cart</button>
            </form>
        @else
            <form
                action="{{ route('products.carts.store', [
                    'product' => $product->id,
                ]) }}"
                class="d-inline" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Add to cart</button>
            </form>
        @endif
    </div>
</div>
